<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    use HasFactory;
       protected $fillable = [
        'tournament',
        'sport_type',
        'start_time',
             'member1_id',   'member2_id',
    ];
       public function member1()
    {
        return $this->belongsTo('App\Models\Member','member1_id');
    }
       public function member2()
    {
        return $this->belongsTo('App\Models\Member','member2_id');
    }
    
      public function partbets()
    {
        return $this->hasMany('App\Models\PartBet');
    }
    
}
