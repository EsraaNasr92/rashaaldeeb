<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Menu;
use App\Models\Page;
use App\Models\Post;
use App\Models\MenuItem;

use Illuminate\Http\Request;

use Auth;

class MenuController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $selectedMenu = '';
        $menuitems = '';
        if(isset($request->id)){
          $id = $request->id;
          if($id == 'new'){
            $selectedMenu = '';
          }
          else{
            $selectedMenu = Menu::where('id', $request->id)->first();
            if($selectedMenu->content == ''){
              $menuitems = MenuItem::where('menu_id', $selectedMenu->id)->get();
            }else{
              $menuitems = json_decode($selectedMenu->content);
              $menuitems = $menuitems[0];
              foreach ($menuitems as $menuitem) {
                $menuitem->title = MenuItem::where('id', $menuitem->id)->value('title');
                $menuitem->name = MenuItem::where('id', $menuitem->id)->value('name');
                $menuitem->slug = MenuItem::where('id', $menuitem->id)->value('slug');
                $menuitem->type = MenuItem::where('id', $menuitem->id)->value('type');
                $menuitem->target = MenuItem::where('id', $menuitem->id)->value('target');
                if(!empty($menuitem->children[0])){
                  foreach($menuitem->children[0] as $child){
                    $child->title = MenuItem::where('id', $child->id)->value('title');
                    $child->name = MenuItem::where('id', $menuitem->id)->value('name');
                    $child->slug = MenuItem::where('id', $menuitem->id)->value('slug');
                    $child->type = MenuItem::where('id', $menuitem->id)->value('type');
                    $child->target = MenuItem::where('id', $menuitem->id)->value('target');

                  }
                }
              }
            }
          }
        }
        return view ('admin.menu.index',['pages'=>Page::all(),
        'model'=>Post::all(),
        'menus'=>Menu::all(),
        'selectedMenu'=>$selectedMenu,
        'menuitems' => $menuitems
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->all(); 
        if(menu::create($data)){ 
          $newdata = menu::orderby('id','DESC')->first();          
                       
            return redirect("manage-menus?id=$newdata->id")
            ->with('status', 'The menu has been created');
        }else{
          return redirect()->back()->with('status','Failed to save menu !');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        /*$data = $request->all(); 
        if($request->has('newContent')){
          $data['content'] = $request->newContent;
        }    
        $menu=Menu::findOrFail($request->menuid);    
        $menu->update($data);*/


        $newContent = $request->all(); 
        $menu=Menu::findOrFail($request->menuid);            
        $content = $request->data; 
        $newContent = [];  
        $newContent['location'] = $request->location;       
        $newContent['content'] = json_encode($content);
        $menu->update($newContent); 
        return redirect()->back()
        ->with('status', 'Menu saved successfuly');
    }


    public function addCategory(Request $request){

        $data = $request->all();
        $menuid = $request->menuid;
        $ids = $request->ids;
        $menu = Menu::findOrFail($menuid);
        if($menu->content == ''){
            foreach($ids as $id){
              $data['title'] = Page::where('id',$id)->value('title');
              $data['slug'] = Page::where('id',$id)->value('slug');
              $data['type'] = 'page';
              $data['menu_id'] = $menuid;
              MenuItem::create($data);
            }
          }else{      
            foreach($ids as $id){
              $menudata = json_decode($menu->content,true); 
              $data['title'] = Page::where('id',$id)->value('title');
              $data['slug'] = Page::where('id',$id)->value('slug');
              $data['type'] = 'page';
              $data['menu_id'] = $menuid;
              MenuItem::create($data);
              $lastdata = MenuItem::orderby('id', 'DESC')->first();
              $newdata = [];      
              $newdata['id'] = $lastdata->id;            
              $newdata['children'] = [[]];
              array_push($menudata[0],$newdata);     
              $menudata = json_encode($menudata);      
              $menu->update(['content'=>$menudata]);
            }
          }
      }



      public function addPostToMenu(Request $request){
        $data = $request->all();
        $menuid = $request->menuid;
        $ids = $request->ids;
        $menu = Menu::findOrFail($menuid);
        if($menu->content == ''){
            foreach($ids as $id){
              $data['title'] = Post::where('id',$id)->value('title');
              $data['slug'] = Post::where('id',$id)->value('slug');
              $data['type'] = 'post';
              $data['menu_id'] = $menuid;        
              MenuItem::create($data);
            }
          }else{      
            foreach($ids as $id){
              $menudata = json_decode($menu->content,true); 
              $data['title'] = Post::where('id',$id)->value('title');
              $data['slug'] = Post::where('id',$id)->value('slug');
              $data['type'] = 'post';
              $data['menu_id'] = $menuid;
              MenuItem::create($data);
              $lastdata = MenuItem::orderby('id', 'DESC')->first();
              $newdata = [];      
              $newdata['id'] = $lastdata->id;            
              $newdata['children'] = [[]];
              array_push($menudata[0],$newdata);     
              $menudata = json_encode($menudata);      
              $menu->update(['content'=>$menudata]);
            }
          }
      }


      public function addCustomLink(Request $request){
        $data = $request->all();
        $menuid = $request->menuid;
        $menu = menu::findOrFail($menuid);
        if($menu->content == ''){
            $data['title'] = $request->link;
            $data['slug'] = $request->url;
            $data['type'] = 'custom';
            $data['menu_id'] = $menuid;
            menuitem::create($data);
          }else{
            $menudata = json_decode($menu->content,true);       
            $data['title'] = $request->link;
            $data['slug'] = $request->url;
            $data['type'] = 'custom';
            $data['menu_id'] = $menuid;
            MenuItem::create($data);
            $lastdata = MenuItem::orderby('id', 'DESC')->first();
            $array = [];      
            $array['id'] = $lastdata->id;            
            $array['children'] = [[]];
            array_push($menudata[0],$array);      
            $menudata = json_encode($menudata);      
            $menu->update(['content'=>$menudata]);
          }
      }

      public function updateMenuItem(Request $request){
        $item = MenuItem::findOrFail($request->id);
        $data = $request->all();        
        $item->update($data);
        return redirect()->back();
      }

      public function deleteMenuItem($id, $key, $in=''){
        $menuitem = MenuItem::findOrFail($id);
        $menu = Menu::where('id',$menuitem->menu_id)->first();
        if($menu->content != ''){
          $data = json_decode($menu->content,true);            
          $maindata = $data[0];            
          if($in == ''){
            unset($data[0][$key]);
            $newdata = json_encode($data); 
            $menu->update(['content'=>$newdata]);                         
          }else{
            unset($data[0][$key]['children'][0][$in]);
            $newdata = json_encode($data);
            $menu->update(['content'=>$newdata]); 
          }
        }
        $menuitem->delete();
        return redirect()->back();
      }


          /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
      public function destroy($id)
      {
        MenuItem::where('menu_id',$id)->delete();	
        Menu::findOrFail($id)->delete();
        return redirect('manage-menus')->with('success','Menu deleted successfully');
      }

      
}
