@extends('layouts.frontend')

@section('title') {{$post->title}} @endsection

@section('content')

<section class="hero" id="hero">
    <div class="heroText">
        <h1 class="news-detail-title text-white mt-lg-5 mb-lg-4" data-aos="zoom-in" data-aos-delay="300">
            {{$post->title}}
        </h1>
    </div>

    <div class="imgWrapper">
        <img src="{{ asset('uploads/posts/' . $post->image) }}" class="img-fluid news-detail-image" alt="{{$post->title}}">
    </div>

    <div class="overlay"></div>
</section>

<!-- BEGIN: Header section -->
<nav class="navbar navbar-expand-lg bg-light shadow-lg">
    <div class="container">
        <a class="navbar-brand" href="/">
            <strong>Rasha aldeeb</strong>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            @include('partials.menu') 
        </div>
    </div>
</nav>
<!-- END: Header section -->

<section class="news-detail section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-10 mx-auto arabic-text">

                <div class="clearfix my-4 mt-lg-0 mt-5">
                        <p data-aos="fade-up">
                        {!! $post->body !!}
                        </p>

                </div>

                <div class="social-share d-flex mt-5">

            
                </div>
            </div>

        </div>
    </div>
</section>

<section class="related-news section-padding">
    <div class="container">
        <div class="row">

            <div class="col-lg-8 col-10 mx-auto text-center">

            @if (isset($post->previous))
                <a href="{{ route('blog.view', ['slug' => $post->previous->slug]) }}">
                    <div class="d-block" data-aos="zoom-in"> Previous Article</div>
                    <h3>{{ $post->previous->title }}</h3>
                </a>
            @endif


            @if (isset($post->next))
                <a href="{{ route('blog.view', ['slug' => $post->next->slug]) }}">
                    <div class="d-block" data-aos="zoom-in">Next Article</div>
                    <h3 class="news-title" data-aos="fade-up">{{ $post->next->title }} </h3>
                </a>
            @endif


            </div>

        </div>
    </div>
</section>

@endsection
