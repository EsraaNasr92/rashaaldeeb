<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Middle extends Model
{
    use HasFactory;

    protected $fillable =[
        'title',
        'subtitle',
        'btn_title_1',
        'btn_url_1',
        'btn_title_2',
        'btn_url_2',
        'image'
    ];
}
