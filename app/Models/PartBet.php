<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartBet extends Model
{
    protected $fillable = [
        'match_id',
         'coef_on_1',
         'coef_on_2',
        'text','finished'
      ];

   public function match()
    {
        return $this->belongsTo('App\Models\Match','match_id');
    }
    public function bets()
    {
        return $this->hasMany('App\Models\Bet');
    }
    
    use HasFactory;
}
