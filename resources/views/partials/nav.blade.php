	<ul class="nav navbar-nav navbar-right">
	<li class="nav-item"><a class="nav-link" href="{{url('/')}}">Home</a></li>
	@if(!empty($topNavItems))
		@foreach($topNavItems as $nav)
		@if(!empty($nav->children[0]))
			<li class="nav-item"><a class="nav-link" href="#" class="dropdown" data-toggle="dropdown">@if($nav->name == NULL) {{$nav->title}} @else {{$nav->name}} @endif <i class="fa-solid fa-caret-down"></i>
			<ul class="dropdown-menu">
				@foreach($nav->children[0] as $childNav)
				@if($childNav->type == 'custom')
					<li class="nav-item"><a class="nav-link" href="{{$childNav->slug}}" target="_blank">@if($childNav->name == NULL) {{$childNav->title}} @else {{$childNav->name}} @endif</a></li>
				@elseif($childNav->type == 'post')
					<li class="nav-item"><a class="nav-link" href="{{url('blog')}}/{{$childNav->slug}}">@if($childNav->name == NULL) {{$childNav->title}} @else {{$childNav->name}} @endif</a></li>
				@else
					<li class="nav-item"><a class="nav-link" href="{{$childNav->slug}}">@if($childNav->name == NULL) {{$childNav->title}} @else {{$childNav->name}} @endif</a></li>	
				@endif
				@endforeach
			</ul>
			</a></li>
		@else
			@if($nav->type == 'custom')
			<li class="nav-item"><a class="nav-link" href="{{$nav->slug}}" target="_blank">@if($nav->name == NULL) {{$nav->title}} @else {{$nav->name}} @endif</a></li>
			@elseif($nav->type == 'post')
			<li class="nav-item"><a class="nav-link" href="{{url('blog')}}/{{$nav->slug}}">@if($nav->name == NULL) {{$nav->title}} @else {{$nav->name}} @endif</a></li>
			@else
			<li class="nav-item"><a class="nav-link" href="{{$nav->slug}}">@if($nav->name == NULL) {{$nav->title}} @else {{$nav->name}} @endif</a></li>	
			@endif
		@endif	
		@endforeach
	@endif		
	</ul>	