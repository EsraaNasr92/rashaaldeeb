@extends('layouts.app')

@section('content')

<div class="container">


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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Option</th>
                        </tr>
                    </thead>

                    @foreach($model as $user)
                    <tr>
                        <td> {{ $user -> name}}</td>
                        <td> {{ $user -> email}}</td>
                        <td>{{ implode(', ', $user->roles()->get()->pluck('name')->toArray()) }}</td>
                        <td> 
                            <a href="{{ route('users.edit', ['user' => $user->id] ) }}">Edit</a> | 
                            Delete
                        </td>
                    </tr>
                       
                    @endforeach

                </table>
            </table>
            
            {{ $model->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>
@endsection
