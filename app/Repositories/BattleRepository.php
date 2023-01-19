<?php

namespace App\Repositories;

use App\Interfaces\BattleRepositoryInterface;
use App\Models\Battle;
use Illuminate\Support\Collection;

class BattleRepository implements BattleRepositoryInterface
{
    public function getAllBattles(): Collection
    {
        return Battle::with('winner')->with('monsterA')->with('monsterB')->get();
    }

    public function createBattle(int $monsterA_id, int $monsterB_id, int $winner_id): Battle
    {
        return Battle::create(compact('monsterA_id', 'monsterB_id', 'winner_id'));
    }

    public function removeBattle(int $battleId): bool
    {
        return Battle::findOrFail($battleId)->delete();
    }
}
