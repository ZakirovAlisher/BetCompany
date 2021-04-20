<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{ 
    protected $fillable = [
        'url','title', 'content','user_id', 'large_content'
      ];

   public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
    use HasFactory;
}
