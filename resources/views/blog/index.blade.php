@extends('layouts.inner')

@section('title') {{ 'blog' }} @endsection

@section('content')
<!-- BEGIN: News section -->
<section class="news section-padding" id="news">
    <div class="container">
        <div class="row">
            @foreach($posts as $post)
                <div class="col-lg-6 col-12 mb-5 mb-lg-0">
                    <div class="news-thumb" data-aos="fade-up">
                        @if($post->image != null)
                            <a href="{{ route('blog.view' , ['slug' => $post->slug])}}" class="image-popup">
                                <img src="{{ asset('uploads/posts/' . $post->image) }}" class="img-fluid portfolio-image" alt="">
                            </a>
                        @else
                            <img class="img-fluid portfolio-image" src="{{ asset('uploads/post_placeholder.jpeg') }}">
                        @endif

                        <div class="news-category bg-warning text-white">{{ $post->category ? $post->category->name : 'Uncategorized' }}</div>
                                    
                        <div class="news-text-info">
                            <h5 class="news-title arabic-text">
                                <a href="{{ route('blog.view' , ['slug' => $post->slug])}}">{{$post->title}}</a>
                            </h5>
                        </div>
                    </div> 
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- END: News section -->
@endsection
