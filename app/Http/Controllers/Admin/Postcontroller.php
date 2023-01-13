<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use Auth;

use App\Models\Category;

class Postcontroller extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->isAdminOrEditor()){
            $posts = Post::paginate(5);
        }else{
            $posts = Auth::user()->posts()->paginate(5);
        }
        
        return view('admin.blog.index', ['model' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::with('children')->whereNull('parent_id')->get();
        return view('admin.blog.create')->with(['model' => new Post()])->withCategories($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {           
        /* How to add post image
        $post = new Post;
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->body = $request->body;
        $post->excerpt = $request->excerpt;
        $post->published_at = $request->published_at;
        $post->user_id = Auth::user()->id;
        
        $path = $request->file('image');
        $image = $path->getClientOriginalName();
        $path->move(public_path('uploads'), $image);

        $post->image = $image;
        $post->save();*/

       
        $post = Auth::user()->posts()->save(new Post  
        ($request->only(['title', 'slug', 'excerpt', 'body' ,'published_at', 'category_id'])
        ));

        $path = $request->file('image');

        if($path != null){
            $image = $path->getClientOriginalName();
            $path->move(public_path('uploads/posts'), $image);
    
            $post->image = $image;   
    
            $post->save();
    
            return redirect()->route('blog.index')     
            ->with('status', 'The post has been created');
        }else{
            return redirect()->route('blog.index')     
            ->with('status', 'The post has been created');
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $blog)
    {
        $categories = Category::with('children')->whereNull('parent_id')->get();
        return view('admin.blog.edit')->with('model', $blog)->withCategories($categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogRequest $request, Post $blog)
    {
        if(auth::user()->cannot('update', $blog)){
            return redirect()->route('blog.index')
            ->with('status', 'you do not have permission to edit that post.');       
        }

        $blog->fill($request->only(['title', 'slug', 'published_at', 'excerpt', 'body', 'category_id']));

        if ($request->hasFile('image'))
        {
            $path = 'uploads/posts/'.$blog->image;
            if (File::exists($path))
            {
                File::delete($path);
            }
    
            $path = $request->file('image');
            $image = $path->getClientOriginalName();
            $path->move(public_path('uploads/posts'), $image);
            $blog->image = $image;  
            
        }

        $blog->save();

        return redirect()->route('blog.index')
         ->with('status', 'The post was updated.');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $blog)
    {
        if(auth::user()->cannot('delete', $blog)){
            return redirect()->route('blog.index')
            ->with('status', 'you do not have permission to delete that post.');       
         }

         $blog->delete();

         return redirect()->route('blog.index')
         ->with('status', 'The post was deleted.'); 

    }
}
