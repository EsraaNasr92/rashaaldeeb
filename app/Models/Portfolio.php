<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable =[
        'title',
        'slug',
        'content',
        'image',
        'categoryp_id'
        
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    
    public function categoryp() {
        return $this->belongsTo('App\Models\Categoryp');
    }
}
