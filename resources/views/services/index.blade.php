@extends('layouts.frontend')

@section('title') {{ 'service' }} @endsection

@section('content')
<div class="container">
    @foreach($service as $service)

        <article>
            <h2>
                <a href="{{ route('services.view' , ['slug' => $service->slug])}}">{{$service->title}}</a>
            </h2>

            @if($service->image != null)
                <img height="100" width=100 src="{{ asset('uploads/services/' . $service->image) }}">
            @else
                <img height="100" width=100 src="{{ asset('uploads/post_placeholder.jpeg') }}">
            @endif

            <p>{{$service->content}}</p>


        </article>

    @endforeach
</div>
@endsection
