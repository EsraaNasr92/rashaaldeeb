@extends('layouts.inner')

@section('title') {{ 'about' }} @endsection

@section('content')
<div class="container">
@foreach($page as $page)
    {!! $page->content !!}
@endforeach
 

</div>
@endsection
