<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

use App\Models\Category;

class CategoryController extends Controller
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
        $categories = Category::with('children')->whereNull('parent_id')->get();
        return view('admin.category.index')->with(['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $this->validate($request, [
            'name' => 'required|min:3|max:255|string',
            'parent_id' => 'sometimes|nullable|numeric'
        ]);
        Category::create($validatedData);
        return redirect()->route('category.index')     
        ->with('status', 'You have successfully created a Category!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    { 
        $validatedData = $this->validate($request, [
            'name'  => 'required|min:3|max:255|string'
        ]);

        $category->update($validatedData);
        
        return redirect()->route('category.index')     
        ->with('status', 'You have successfully updated a Category!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if ($category->children) {
            foreach ($category->children()->with('posts')->get() as $child) {
                foreach ($child->posts as $post) {
                    $post->update(['category_id' => NULL]);
                }
            }
            
            $category->children()->delete();
        }

        foreach ($category->posts as $post) {
            $post->update(['category_id' => NULL]);
        }

        $category->delete();

        return redirect()->route('category.index')
        ->with('status', 'You have successfully deleted a Category!'); 
    }
}
