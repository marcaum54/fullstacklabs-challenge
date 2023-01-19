<?php

namespace App\UseCases;

use App\Models\Monster;

class BattleWinnerUseCase
{
    const MONSTER_A = 'monsterA';
    const MONSTER_B = 'monsterB';

    protected $monsterA;
    protected $monsterB;

    protected $attacker;

    public function __construct(Monster $monsterA, Monster $monsterB)
    {
        $this->monsterA = (object)$monsterA;
        $this->monsterB = (object)$monsterB;

        $this->attacker = $this->getFirstAttacker();
    }

    private function getFirstAttacker(): string
    {
        if ($this->monsterA->speed > $this->monsterB->speed) {
            return self::MONSTER_A;
        } else if ($this->monsterB->speed > $this->monsterA->speed) {
            return self::MONSTER_B;
        } else {
            if ($this->monsterA->attack > $this->monsterB->attack)
                return self::MONSTER_A;
            return self::MONSTER_B;
        }
    }

    private function getAttackTarget(): string
    {
        return $this->attacker === self::MONSTER_A ? self::MONSTER_B : self::MONSTER_A;
    }

    private function switchAttackerTurn(): void
    {
        $this->attacker = $this->attacker == self::MONSTER_A ? self::MONSTER_B : self::MONSTER_A;
    }

    private function getDamageCaused(): int
    {
        $attacker = $this->attacker;
        $target = $this->getAttackTarget();

        if ($this->$attacker->attack <= $this->$target->defense)
            return 1;

        return $this->$attacker->attack - $this->$target->defense;
    }

    private function executeAttack(): void
    {
        $target = $this->getAttackTarget();
        $this->$target->hp -= $this->getDamageCaused();
    }

    public function execute(): Monster
    {
        while ($this->monsterA->hp > 0 && $this->monsterB->hp > 0) {
            $this->executeAttack();
            $this->switchAttackerTurn();
        }

        return $this->monsterA->hp > $this->monsterB->hp ? $this->monsterA : $this->monsterB;
    }
}
