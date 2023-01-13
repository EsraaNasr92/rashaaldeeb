<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\Page;

class AboutController extends Controller
{
    public function index(){ 
        $page = Page::where('slug', '=', 'about')->get('content');
        return view('home.about', ['page' => $page]);
    }
}
