@extends('layouts.inner')

@section('title') {{ 'Gallery' }} @endsection

@section('content')
<div class="container">
<!-- BEGIN: Portfolio section Gallery insted of portfolio-->

    <section class="portfolio section-padding" id="portfolio">
        <div class="container">
            <!-- Photo Grid -->
            <div class="row-img"> 
                @foreach($portfolio as $i => $portfolio)
                    <div class="column-img">
                        @if($portfolio->image != null)
                        <a href="{{ asset('uploads/portfolio/' . $portfolio->image) }}" class="image-popup">
                            <img src="{{ asset('uploads/portfolio/' . $portfolio->image) }}" class="img-fluid portfolio-image" alt="">
                        </a>
                        @else
                            <img class="img-fluid portfolio-image" src="{{ asset('uploads/post_placeholder.jpeg') }}">
                        @endif
                    </div>
                @endforeach

             </div>
        </div>
    </section><!-- END: Portfolio section -->


</div>
@endsection
