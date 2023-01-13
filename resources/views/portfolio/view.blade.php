@extends('layouts.frontend')

@section('title') {{$portfolio->title}} @endsection

@section('content')
<div class="container">
        <article>
            <h2>
                <a href="{{ route('portfolio.view' , ['slug' => $portfolio->slug]) }}">{{$portfolio->title}}</a>
            </h2>
            <p class="text-muted">{{ $portfolio->categoryp ? $portfolio->categoryp->name : 'Uncategorized' }}</p>
            <p>{!! $portfolio->content !!}</p>
            
           @if($portfolio->image != null)
            <img height="100" width=100 src="{{ asset('uploads/portfolio/' . $portfolio->image) }}">
           @else
            <img height="100" width=100 src="{{ asset('uploads/post_placeholder.jpeg') }}">
            @endif
            
        </article>
</div>
@endsection
