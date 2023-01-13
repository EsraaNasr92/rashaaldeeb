<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

use Auth;
use App\Http\Requests\WorkWithPage;


class PagesController extends Controller
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
        if(Auth::user()->isAdminOrEditor()){
            $pages = Page::paginate(5);
        }else{
            $pages = Auth::user()->pages()->paginate(5);
        }
        
        return view('admin.pages.index', ['pages' => $pages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.create')->with(['model' => new Page()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WorkWithPage $request)
    {
        /*Auth::user()->pages()->save(new Page 
            ($request->only(['title', 'slug', 'content'])
        ));*/
        
        $page = new Page();
        $page->title  = $request->title;
        $page->content  = $request->content;
        $page->slug = \Str::slug($request->title);
        $page->user_id = Auth::user()->id;
        $page->save();

        return redirect()->route('pages.index')
        ->with('status', 'The page has been created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        if(Auth::user()->cannot('update', $page)){
            return redirect()->route('pages.index');
        }
        return view('admin.pages.edit', ['model' => $page]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(WorkWithPage $request, Page $page)
    {
        if(Auth::user()->cannot('update', $page)){
            return redirect()->route('page.index');
        }

        $page->fill($request->only(['title', 'slug', 'content']));

        $page->save();

        return redirect()->route('pages.index')
        ->with('status', 'The page was updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        if(Auth::user()->cannot('delete', $page)){
            return redirect()->route('page.index')
            ->with('status', 'you do not have permission to delete that post.');  
        }

        $page->delete();
         
         return redirect()->route('pages.index')
         ->with('status', 'The page was deleted.'); 

    }
}
