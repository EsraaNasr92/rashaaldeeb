<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ImageGallery;

class GalleryController extends Controller
{
    public function index(){   
        $gallery = ImageGallery::all();             
        return view('home.gallery')->with('gallery', $gallery);
    }
}
