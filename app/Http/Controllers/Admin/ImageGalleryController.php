<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ImageGallery;
use Illuminate\Http\Request;

class ImageGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = ImageGallery::get();
        return view('admin.gallery.index', compact('images'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ImageGallery  $imageGallery
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ImageGallery $imageGallery)
    {
        $this->validate($request, [
    		'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        $input['image'] = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('uploads/gallery'), $input['image']);
        $input['title'] = $request->title;

        ImageGallery::create($input);
    	return back()
    		->with('status','Image Uploaded successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ImageGallery  $imageGallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(ImageGallery $imageGallery, $id)
    {
        ImageGallery::find($id)->delete();
    	return back()
    		->with('status','Image removed successfully.');	
    }
}
