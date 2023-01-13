@extends('layouts.frontend')

@section('title') {{ 'partner' }} @endsection

@section('content')
<div class="container">
    @foreach($partner as $partner)

        <article>
            <h2>
                <a href="{{ route('partner.view' , ['slug' => $partner->slug])}}">{{$partner->title}}</a>
            </h2>

            <p>{{$partner->content}}</p>


        </article>

    @endforeach
</div>
@endsection
