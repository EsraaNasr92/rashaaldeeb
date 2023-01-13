<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoryp extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_id', 
        'name'
    ];


    public function children()
    {
      return $this->hasMany('App\Models\Categoryp', 'parent_id');
    }

    public function portfolios()
    {
        return $this->hasMany('App\Models\Portfolio');
    }
}
