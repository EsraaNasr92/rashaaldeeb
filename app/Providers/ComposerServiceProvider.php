<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


use App\Models\Menu;
use App\Models\MenuItem;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        View::composer('blog.*', function($view){
            $view->with('pages', \App\Models\Page::get());
            
        });


        view::composer('*', function ($view) {
            $topNav = Menu::where('location','header')->first();
            $topNavItems = json_decode($topNav->content??null);
            if(!empty($topNavItems)){
                $topNavItems = $topNavItems[0]; 
                foreach($topNavItems as $menu){
                    $menu->title = MenuItem::where('id',$menu->id)->value('title');
                    $menu->name = MenuItem::where('id',$menu->id)->value('name');
                    $menu->slug = MenuItem::where('id',$menu->id)->value('slug');
                    $menu->target = MenuItem::where('id',$menu->id)->value('target');
                    $menu->type = MenuItem::where('id',$menu->id)->value('type');
                        if(!empty($menu->children[0])){
                            foreach ($menu->children[0] as $child) {
                            $child->title = MenuItem::where('id',$child->id)->value('title');
                            $child->name = MenuItem::where('id',$child->id)->value('name');
                            $child->slug = MenuItem::where('id',$child->id)->value('slug');
                            $child->target = MenuItem::where('id',$child->id)->value('target');
                            $child->type = MenuItem::where('id',$child->id)->value('type');
                            }  
                    }
                }
            }
        
                View::share(['topNavItems' => $topNavItems,]);
            }
        );


        
    }
}
