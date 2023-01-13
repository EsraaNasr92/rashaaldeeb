<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable =[
        'title',
        'slug',
        'excerpt',
        'body',
        'image',
        'category_id',
        'published_at'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function category() {
        return $this->belongsTo('App\Models\Category');
    }


    public function getNextAttribute(){

        return static::where('id', '>', $this->id)->orderBy('id','asc')->first();

    }

    public  function getPreviousAttribute(){

        return static::where('id', '<', $this->id)->orderBy('id','desc')->first();

    }
}
