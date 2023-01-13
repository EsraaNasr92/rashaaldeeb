@extends('layouts.frontend')

@section('title') {{$partner->title}} @endsection

@section('content')
<div class="container">
        <article>
            <h2>
                <a href="{{ route('partner.view' , ['slug' => $partner->slug]) }}">{{$partner->title}}</a>
            </h2>
            
            <p>{!! $partner->content !!}</p>
            
           @if($partner->image != null)
            <img height="100" width=100 src="{{ asset('uploads/partners/' . $partner->image) }}">
           @else
            <img height="100" width=100 src="{{ asset('uploads/post_placeholder.jpeg') }}">
            @endif
            
        </article>
</div>
@endsection
