@extends('layouts.frontend')

@section('title') {{ 'Home' }} @endsection

@section('content')

<!-- BEGIN: Banner section -->
@if($banner == null)
    

@else

<section class="hero" id="hero" style="background-image: url('{{ asset('/uploads/' . $banner->image) }}')">
    <div class="heroText">
        <h1 class="text-white mt-5 mb-lg-4" data-aos="zoom-in" data-aos-delay="800">
            {{$banner->title}}
        </h1>

        <p class="text-secondary-white-color" data-aos="fade-up" data-aos-delay="1000">
            {{$banner->subtitle}} {{-- <strong class="custom-underline">market research & analysis</strong> --}}
        </p>
    </div>

    <div class="imgWrapper">
        <img src="{{ asset('uploads/' .$banner->image) }}" alt="{{$banner->title}}" class="img-fluid">
    </div>

    <div class="overlay"></div>
</section>

@endif
<!-- END: Banner section -->

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
            @include('partials.nav') 
        </div>
    </div>
</nav>
<!-- END: Header section -->

<!-- BEGIN: Text of block & slider section -->
<section class="section-padding pb-0" id="about">
    @foreach($about as $about)
    <div class="container mb-5 pb-lg-5">
        <div class="row">
            <div class="col-12">
                <h2 class="mb-3" data-aos="fade-up">{{$about->title}}</h2>
            </div>

            <div class="col-lg-6 col-12 mt-3 mb-lg-5">
                <p class="me-4" data-aos="fade-up" data-aos-delay="300">
                    {!! $about->text_left !!}
                </p>
            </div>

            <div class="col-lg-6 col-12 mt-lg-3 mb-lg-5">
                <p data-aos="fade-up" data-aos-delay="500">
                    {!! $about->text_right !!}
                </p>
                 <a data-aos="fade-up" data-aos-delay="700" href="{{ $about->btn_url }}"><p class="text-warning">{{ $about->btn_title }}</p></a>
            </div>

        </div>
    </div> 
    @endforeach
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-12 p-0">      
                <img src="{{ asset('uploads/' .$middle->image) }}" class="img-fluid about-image" alt="">
            </div>

            <div class="col-lg-3 col-12 bg-dark">  
                <div class="d-flex flex-column flex-wrap justify-content-center h-100 py-5 px-4 pt-lg-4 pb-lg-0">
                    <h3 class="text-white mb-3" data-aos="fade-up">{{$middle->title}}</h3>

                    <p class="text-secondary-white-color" data-aos="fade-up">{{$middle->subtitle}}</p>

                    <div class="mt-3 custom-links">
                                        
                        <a href="{{ $middle->btn_url_1 }}" class="text-white custom-link" data-aos="zoom-in" data-aos-delay="100">{{ $middle->btn_title_1 }}</a>

                        <a href="{{ $middle->btn_url_2 }}" class="text-white custom-link" data-aos="zoom-in" data-aos-delay="300">{{ $middle->btn_title_2 }}</a>
                    </div>

                </div>
            </div>

            <div class="col-lg-6 col-12 p-0">  
                <section id="myCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($slider as $key => $slider)
                        <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                            <img src="{{ asset('uploads/' .$slider->image) }}" class="img-fluid team-image"  alt="..."> 
                        </div>
                        @endforeach
                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>

                            <span class="visually-hidden">Previous</span>
                    </button>

                    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>

                            <span class="visually-hidden">Next</span>
                    </button>
                </section>

            </div>
        </div>
    </div>
</section>

<!-- END: Text of block & slider section -->

<!-- BEGIN: Portfolio section -->
<section class="section-padding" id="portfolio">
    <div class="container">
        <div class="row">

            <div class="col-12">
                <h2 class="mb-5 text-center" data-aos="fade-up">Portfolio</h2>
            </div>
            @foreach($portfolio as $i => $portfolio)
                <div class="col-lg-6 col-12">
                    <div class="portfolio-thumb mb-5" data-aos="fade-up">
                        @if($portfolio->image != null)
                            <a href="{{ asset('uploads/portfolio/' . $portfolio->image) }}" class="image-popup">
                                <img src="{{ asset('uploads/portfolio/' . $portfolio->image) }}" class="img-fluid portfolio-image" alt="">
                            </a>
                        @else
                            <img class="img-fluid portfolio-image" src="{{ asset('uploads/post_placeholder.jpeg') }}">
                        @endif

                        <div class="portfolio-info">                     
                            <h4 class="portfolio-title mb-0">{{$portfolio->title}}</h4>   
                            
                            @if ($i == 0)
                                <p class="text-danger">{{ $portfolio->categoryp ? $portfolio->categoryp->name : 'Uncategorized' }}</p>
                            @elseif ($i == 1)
                                <p class="text-warning">{{ $portfolio->categoryp ? $portfolio->categoryp->name : 'Uncategorized' }}</p>
                            @elseif ($i == 2)
                                <p class="text-info">{{ $portfolio->categoryp ? $portfolio->categoryp->name : 'Uncategorized' }}</p>
                            @elseif ($i == 3)
                                <p class="text-success">{{ $portfolio->categoryp ? $portfolio->categoryp->name : 'Uncategorized' }}</p>
                            @else
                                <p class="text-danger">{{ $portfolio->categoryp ? $portfolio->categoryp->name : 'Uncategorized' }}</p>
                            @endif 
                           
                        </div>
                    </div> 
                </div>
            @endforeach

         </div>
    </div>
</section>
<!-- END: Portfolio section -->


<!-- BEGIN: News section -->
<section class="news section-padding" id="news">
    <div class="container">
        <div class="row">

            <div class="col-12">
                <h2 class="mb-5 text-center" data-aos="fade-up">Podcast lab & resources</h2>
                <p>The Podcast Lab has been founded by Rasha Aldeeb since 2020, it is a methodology to help organisations and individuals to put a strategy, plan, record,test, upload, launch, share,  and market their Podcast. Rasha Aldeeb the founder of the podcast lab, focuses on audio content creation, the podcast Lab has helped more than 6 international organizations to establish their Podcast, one Podcast application, and local podcast. Moreover, The podcast lab offers free podcast resources; educational articles, and guided workbook sheets for 
                    beginner podcasters to download</p>
            </div>
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
