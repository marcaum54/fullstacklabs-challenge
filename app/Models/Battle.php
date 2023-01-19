<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Battle extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int>
     */
    protected $fillable = [
        'monsterA_id',
        'monsterB_id',
        'winner_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function monsterA()
    {
        return $this->hasOne(Monster::class, 'id', 'monsterA_id');
    }

    public function monsterB()
    {
        return $this->hasOne(Monster::class, 'id', 'monsterB_id');
    }

    public function winner()
    {
        return $this->hasOne(Monster::class, 'id', 'winner_id');
    }
}
