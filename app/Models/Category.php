<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//This module for post categories
class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_id', 
        'name'
    ];

    public function children(){
        return $this->hasMany('App\Models\Category', 'parent_id');
    }

    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }
}
