@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Profile of {{Auth::user()->name}}</h2></div>

                <div class="card-body">
                    @include('custom.message')

                    <form action="{{route('user.update', $user->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="container">
                            <div class="form-group">
                                <input type="text" class="form-control" id="name" name="name" placeholder="name" value="{{old('name', $user->name)}}" disabled>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="email" name="email" placeholder="email" value="{{old('email', $user->email)}}" disabled>
                            </div>

                            @if ($roleId[0]->role_id == 1)
                                <div class="form-group">
                                    <select disabled class="form-control" name="roles" id="roles">
                                        @foreach ($roles as $role)
                                            <option value="{{$role->id}}"
                                                @isset($user->roles[0]->name)
                                                    @if ($role->name == $user->roles[0]->name)
                                                        selected
                                                    @endif
                                                @endisset
                                                >{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif

                            <a href="#">Change password</a>
                            <hr>
                            <a class="btn btn-success" href="{{route('user.edit', $user->id)}}">Edit</a>

                            @if (Auth::user()->id == '1')
                                <a class="btn btn-primary" href="{{route('user.index')}}">Back</a>
                            @else
                                <a class="btn btn-primary" href="{{route('home')}}">Back</a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
