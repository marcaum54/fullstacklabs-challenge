<?php

namespace Database\Factories;

use App\Models\Monster;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Battle>
 */
class BattleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'monsterA_id' => Monster::first()->id,
            'monsterB_id' => Monster::first()->id,
            'winner_id' => Monster::first()->id
        ];
    }
}
