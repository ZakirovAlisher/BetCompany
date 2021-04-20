<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bet extends Model
{  protected $fillable = [
        'part_bet_id',
        'amount',
        'outcome',
             'user_id'
    ];
    use HasFactory;
    public function part_bet()
    {
        return $this->belongsTo('App\Models\PartBet','part_bet_id');
    }
}
