<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $fillable =[
        'title',
        'text_left',
        'text_right',
        'btn_title',
        'btn_url'
    ];
}
