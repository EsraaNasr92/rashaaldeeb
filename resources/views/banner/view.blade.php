

@section('content')
<div class="container">
        
            
            <p>{!! $banner -> title} !!}</p>
            <p>{!!  $banner -> subtitle !!}</p>
            
           @if($banner->image != null)
            <img height="100" width=100 src="{{ asset('uploads/' . $banner->image) }}">
           @else
            <img height="100" width=100 src="{{ asset('uploads/post_placeholder.jpeg') }}">
            @endif

</div>
@endsection
