<?php

namespace App\Services;

use App\Models\Monster;
use App\Repositories\BattleRepository;
use App\Models\Battle;
use App\Repositories\MonsterRepository;
use App\UseCases\BattleWinnerUseCase;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;

class BattleService
{
    /**
     * @var $battleRepository
     */
    protected $battleRepository;

    /**
     * @var $monsterRepository
     */
    protected $monsterRepository;

    /**
     * BattleService constructor.
     *
     * @param BattleRepository $battleRepository
     *
     */
    public function __construct(BattleRepository $battleRepository, MonsterRepository $monsterRepository)
    {
        $this->battleRepository = $battleRepository;
        $this->monsterRepository = $monsterRepository;
    }

    /**
     * Get all battles.
     *
     * @return Collection
     *
     */
    public function getAllBattles(): Collection
    {
        return $this->battleRepository->getAllBattles();
    }

    public function createBattle(int $monsterAId, int $monsterBId): Battle
    {
        $monsterA = $this->monsterRepository->getMonsterById($monsterAId);
        $monsterB = $this->monsterRepository->getMonsterById($monsterBId);

        $battleWinnerUseCase = new BattleWinnerUseCase($monsterA, $monsterB);
        $winner = $battleWinnerUseCase->execute();

        return $this->battleRepository->createBattle($monsterA->id, $monsterB->id, $winner->id);
    }

    public function removeBattle(int $battleId): bool
    {
        return $this->battleRepository->removeBattle($battleId);
    }
}
