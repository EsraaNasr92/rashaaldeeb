@extends('layouts.app')

@section('content')

<div class="container">
<a class="btn btn-primary" href="{{ route('services.create') }}" >Create service</a>
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session('status'))
                <div class="alert alert-info" >
                    {{ session('status') }}
                </div>
            @endif
            <table class="container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>slug</th>
                            <th>content</th>
                        </tr>
                    </thead>

                    @foreach($model as $service)
                    <tr>
                        <td> {{ $service -> title}}</td>
                        <td> {{ $service -> slug}}</td>
                        <td> {{ $service -> content}}</td>
                        <td> 
                            <a href="{{ route('services.edit', ['service' => $service->id] ) }}">Edit</a> | 
                            <form action="{{ route('services.destroy',$service->id) }}" method="POST" >
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger" onclick="return confirm('Sure Want Delete?')">Delete</button>
                            </form>
                    </tr>
                       
                    @endforeach

                </table>
            </table>

            
        </div>

    </div>
</div>
@endsection
