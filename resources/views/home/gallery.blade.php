@extends('layouts.inner')

@section('title') {{ 'Portfolio' }} @endsection

@section('content')
    <!-- portfolio insted of gallery -->
    <section class="portfolio section-padding" id="portfolio">
        <div class="container">

            <!-- Photo Grid -->
            <div class="row-img"> 
                @foreach($gallery as $i => $gallery)
                    <div class="column-img">
                        <img src="{{ asset('uploads/gallery/' . $gallery->image) }}" class="img-fluid portfolio-image" alt="">
                    </div>
                @endforeach
            </div>
  
        </div>
    </section><!-- /End contact Me section-->

@endsection