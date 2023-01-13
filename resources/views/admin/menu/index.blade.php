@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-12">
            @if(session('status'))
                <div class="alert alert-info" >
                    {{ session('status') }}
                </div>
            @endif
            

        <h2><span>Menus</span></h2>

        <div class="info-box">		
            @if(count($menus) > 0)		
                Select a menu to edit: 		
                <form action="{{url('manage-menus')}}" class="form-inline">
                <select name="id">
                    @foreach($menus as $menu)
                        @if($selectedMenu != '')
                        <option value="{{$menu->id}}" @if($menu->id == $selectedMenu->id) selected @endif>{{$menu->title}}</option>
                    @else
                        <option value="{{$menu->id}}">{{$menu->title}}</option>
                    @endif
                    @endforeach
                </select>
                <button class="btn btn-sm btn-default btn-menu-select">Select</button>
                </form> 
                or <a href="{{url('manage-menus?id=new')}}">Create a new menu</a>.	
            @endif 
        </div>

        <div class="grid grid-cols-12 gap-6" id="main-row">				
            <div class="col-span-12 2xl:col-span-3 cat-form @if(count($menus) == 0) disabled @endif">
            <h2 class="text-lg font-medium mr-auto">Add Menu Items</h2>			


            <div class="tabs">
              <div class="tab">
                <input type="radio" id="rd1" name="rd" class="hidden-input">
                <label class="tab-label" for="rd1">Pages</label>
                <div class="tab-content">
                    <div class="item-list-body">
                        @foreach($pages as $page)
                        <p><input type="checkbox" name="select-category[]" value="{{$page->id}}"> {{$page->title}}</p>
                        @endforeach
                    </div>	
                    <div class="item-list-footer">
                        <label class="btn btn-sm btn-default"><input type="checkbox" id="select-all-categories"> Select All</label>
                        <button type="button" class="pull-right btn btn-default btn-sm" id="add-categories">Add to Menu</button>
                    </div>
                </div>
              </div>
              <div class="tab">
                <input type="radio" id="rd2" name="rd" class="hidden-input">
                <label class="tab-label" for="rd2">Posts</label>
                <div class="tab-content">
                <div class="item-list-body">
                    @foreach($model as $post)
                      <p><input type="checkbox" name="select-post[]" value="{{$post->id}}"> {{$post->title}}</p>
                    @endforeach
                    </div>	
                    <div class="item-list-footer">
                      <label class="btn btn-sm btn-default"><input type="checkbox" id="select-all-posts"> Select All</label>
                      <button type="button" id="add-posts" class="pull-right btn btn-default btn-sm">Add to Menu</button>
                    </div>
                </div>
              </div>

              <div class="tab">
                <input type="radio" id="rd3" name="rd" class="hidden-input">
                <label class="tab-label" for="rd3">Custom link</label>
                <div class="tab-content">
                  <div class="item-list-body">
                      <div class="form-group">
                        <label>URL</label>
                        <input type="url" id="url" class="form-control" placeholder="https://">
                      </div>
                      <div class="form-group">
                        <label>Link Text</label>
                        <input type="text" id="linktext" class="form-control" placeholder="">
                      </div>
                      </div>	
                      <div class="item-list-footer">
                        <button type="button" class="pull-right btn btn-default btn-sm" id="add-custom-link">Add to Menu</button>
                      </div>
                  </div>
              </div>


              <div class="tab">
                <input type="radio" id="rd4" name="rd" class="hidden-input">
                <label for="rd4" class="tab-close">Close others &times;</label>
              </div>
            
            
        </div>
     </div>


        <div class="col-span-12 2xl:col-span-9 cat-view">
          <h2 class="text-lg font-medium mr-auto">Menu Structure</h2>
            @if($selectedMenu == '')
                <h4>Create New Menu</h4>
                <form method="post" action="{{url('create-menu')}}">
                  {{csrf_field()}}
                  <div class="row">
                  <div class="col-sm-12">
                    <label>Name</label>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">							
                    <input type="text" name="title" class="form-control">
                    </div>
                  </div>
                  <div class="col-sm-6 text-right">
                    <button class="btn btn-sm btn-primary">Create Menu</button>
                  </div>
                  </div>
                </form>
            @else
                <div id="menu-content">
                  <div id="result"></div>
                  <div style="min-height: 240px;">
                    <p>Select categories, pages or add custom links to menus.</p>
                    @if($selectedMenu != '')
                    <ul class="menu ui-sortable" id="menuitems">
                        @if(!empty($menuitems))
                          
                            @foreach($menuitems as $key=>$menuitem)
                            <li data-id="{{$menuitem->id}}">

                              <div class="tab mt-4">
                                <input type="radio" id="{{$menuitem->id}}" name="rd" class="hidden-input">
                                <label class="tab-label" for="{{$menuitem->id}}"> @if(!empty($menuitem->name)) {{$menuitem->name}} @else {{$menuitem->title}} @endif </label>
                                  <div class="tab-content">
                                      <div class="item-list-body" id="{{$menuitem->id}}">
                                          <form method="post" action="{{url('update-menuitem')}}/{{$menuitem->id}}">
                                              {{csrf_field()}}
                                              <div class="form-group">
                                              <label>Link Name</label>
                                              <input type="text" name="title" value="@if(!empty($menuitem->name)) {{$menuitem->name}} @else {{$menuitem->title}} @endif" class="form-control">
                                              </div>
                                              @if($menuitem->type == 'custom')
                                              <div class="form-group">
                                                <label>URL</label>
                                                <input type="text" name="slug" value="{{$menuitem->slug}}" class="form-control">
                                              </div>					
                                              <div class="form-group">
                                                <input type="checkbox" name="target" value="_blank" @if($menuitem->target == '_blank') checked @endif> Open in a new tab
                                              </div>
                                              @endif
                                              <div class="form-group mt-4">
                                              <button class="btn btn-sm btn-primary">Save</button>
                                              <a href="{{url('delete-menuitem')}}/{{$menuitem->id}}/{{$key}}" class="btn btn-sm btn-danger">Delete</a>
                                              </div>
                                          </form>
                                      </div>
                                  </div>
                              </div>

                            <ul>  
                                  
                                  @if(isset($menuitem->children))
                                    
                                  @foreach($menuitem->children as $child)

                                  @foreach($child as $in=>$child)


                                  <li data-id="{{$child->id}}"> 


                                  <div class="tab mt-4 childMenu">
                                    <input type="radio" id="{{$child->id}}" name="rd" class="hidden-input">
                                    <label class="tab-label" for="{{$child->id}}">@if(!empty($child->name)) {{$child->name}} @else {{$child->title}} @endif </label>
                                      <div class="tab-content">
                                          <div class="item-list-body" id="{{$menuitem->id}}">
                                            <form method="post" action="{{url('update-menuitem')}}/{{$child->id}}">
                                                  {{csrf_field()}}
                                                  <div class="form-group">
                                                  <label>Link Name</label>
                                                  <input type="text" name="title" value="@if(!empty($child->name)) {{$child->name}} @else {{$child->title}} @endif" class="form-control">
                                                  </div>
                                                  @if($child->type == 'custom')
                                                  <div class="form-group">
                                                    <label>URL</label>
                                                    {{--<input type="text" name="slug" value="{{$child->url}}" class="form-control">--}}
                                                  </div>					
                                                  <div class="form-group">
                                                    <input type="checkbox" name="target" value="_blank" @if($child->target == '_blank') checked @endif> Open in a new tab
                                                  </div>
                                                  @endif
                                                  <div class="form-group mt-4">
                                                  <button class="btn btn-sm btn-primary">Save</button>
                                                  <a href="{{url('delete-menuitem')}}/{{$child->id}}/{{$key}}/{{$in}}" class="btn btn-sm btn-danger">Delete</a>
                                                  </div>
                                              </form>
                                          </div>
                                      </div>
                                  </div>



                                      @endforeach
                                    
                                      @endforeach
                                  @endif
                                  </ul>
                              </li>
                            @endforeach
                          </ul>

                          <div class="form-group menulocation">
                              <label><b>Menu Location</b></label>
                              <p><label><input type="radio" name="location" value="header" @if($selectedMenu->location == 'header') checked @endif> Header</label></p>
                              <p><label><input type="radio" name="location" value="2" @if($selectedMenu->location == 2) checked @endif> Main Navigation</label></p>
                          </div>
                          <div class="form-group">
                            <a href="{{url('delete-menu')}}/{{$selectedMenu->id}}" class="delete">Delete Menu</a>
                          </div>
                          <div class="text-right">
                              
                              <button class="btn btn-sm btn-primary" id="saveMenu">Save Menu</button>
                          </div>

                          @endif
                        @endif
                  </div>	



            @endif	
            
          </div>	
            </div>
          </div>
          <div id="serialize_output">@if($selectedMenu){{$selectedMenu->content}}@endif</div>	
                   
        </div><!-- #End menu structure-->


    </div><!-- #End row-->
</div><!-- #End Container-->




<style>
   .hidden-input {
	 position: absolute;
	 opacity: 0;
	 z-index: -1;
  }
    /* Accordion styles */
    .tabs {
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 4px 4px -2px rgba(0, 0, 0, 0.5);
    }
    .tab {
      width: 100%;
      color: white;
      overflow: hidden;
    }
    .tab-label {
      display: flex;
      justify-content: space-between;
      padding: 1em;
      background: #1e40af ;
      font-weight: bold;
      cursor: pointer;
      /* Icon */
    }
    .tab-label:hover {
      background: #1a252f;
    }
    .tab-label::after {
      content: "❯";
      width: 1em;
      height: 1em;
      text-align: center;
      transition: all 0.35s;
    }
    .tab-content {
      max-height: 0;
      padding: 0 1em;
      color: #2c3e50;
      background: white;
      transition: all 0.35s;
    }
    .tab-close {
      display: flex;
      justify-content: flex-end;
      padding: 1em;
      font-size: 0.75em;
      background: #1e40af;
      cursor: pointer;
    }
    .tab-close:hover {
      background: #1a252f;
    }
    input:checked + .tab-label {
      background: #1a252f;
    }
    input:checked + .tab-label::after {
      transform: rotate(90deg);
    }
    input:checked ~ .tab-content {
      max-height: 100vh;
      padding: 1em;
    }
    .tab.mt-4.childMenu {
      width: 96%;
      margin-left: 43px;
    }
  .item-list,.info-box{background: #fff;padding: 10px;}
  .item-list-body{max-height: 300px;overflow-y: scroll;}
  .panel-body p{margin-bottom: 5px;}
  .info-box{margin-bottom: 15px;}
  .item-list-footer{padding-top: 10px;}
  .panel-heading a{display: block;}
  .form-inline{display: inline;}
  .form-inline select{padding: 4px 10px;}
  .btn-menu-select{padding: 4px 10px}
  .disabled{pointer-events: none; opacity: 0.7;}
  .menu-item-bar{background: #eee;padding: 5px 10px;border:1px solid #d7d7d7;margin-bottom: 5px; width: 75%; cursor: move;display: block;}
  
  .menulocation label{font-weight: normal;display: block;}
  body.dragging, body.dragging * {cursor: move !important;}
  .dragged {position: absolute;z-index: 1;}
  ol.example li.placeholder {position: relative;}
  ol.example li.placeholder:before {position: absolute;}
  #menuitem{list-style: none;}
  #menuitem ul{list-style: none;}
  .input-box{width:75%;background:#fff;padding: 10px;box-sizing: border-box;margin-bottom: 5px;}
  .input-box .form-control{width: 50%}
  .menulocation label{font-weight: normal;display: block;}
  #serialize_output{display:none}
</style>


@endsection

@if($selectedMenu)
  @section('scripts')
      @include('admin.menu.partials.scripts')
  @endsection
@endif

