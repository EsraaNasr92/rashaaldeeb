@extends('layouts.frontend')

@section('title') {{$service->title}} @endsection

@section('content')
<div class="container">
        <article>
            <h2>
                <a href="{{ route('services.view' , ['slug' => $service->slug]) }}">{{$service->title}}</a>
            </h2>
            
            <p>{!! $service->content !!}</p>
            
           @if($service->image != null)
            <img height="100" width=100 src="{{ asset('uploads/services/' . $service->image) }}">
           @else
            <img height="100" width=100 src="{{ asset('uploads/post_placeholder.jpeg') }}">
            @endif
            
        </article>
</div>
@endsection
