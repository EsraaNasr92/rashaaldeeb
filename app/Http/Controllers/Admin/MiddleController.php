<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Middle;
use Illuminate\Http\Request;

class MiddleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $middle = Middle::all();
        return view('admin.middle.index', ['model' => $middle]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.middle.create')->with('model', new Middle());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $middle = new Middle  
        ($request->only(['title', 'subtitle', 'btn_title_1', 'btn_url_1', 'btn_title_2', 'btn_url_2']));

        $path = $request->file('image');
        $image = $path->getClientOriginalName();
        $path->move(public_path('uploads'), $image);
        $middle->image = $image;   
        $middle->save();

        return redirect()->route('middle.index')     
        ->with('status', 'The middle has been created');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Middle  $middle
     * @return \Illuminate\Http\Response
     */
    public function edit(Middle $middle)
    {
        return view('admin.middle.edit')->with('model', $middle);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Middle  $middle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Middle $middle)
    {
        $middle->fill($request->only(['title', 'subtitle',
        'btn_title_1', 'btn_url_1' ,'btn_title_2', 'btn_url_2']))->save();

        if ($request->hasFile('image'))
        {
            $path = 'uploads/'.$middle->image;
            if (File::exists($path))
            {
                File::delete($path);
            }
    
            $path = $request->file('image');
            $image = $path->getClientOriginalName();
            $path->move(public_path('uploads/'), $image);
            $middle->image = $image;  
            $middle->save();
        }

        return redirect()->route('middle.index')
        ->with('status', 'The middle was updated.');
    }
}
