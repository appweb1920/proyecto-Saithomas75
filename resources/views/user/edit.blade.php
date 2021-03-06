@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Edit User</h2></div>

                <div class="card-body">
                    @include('custom.message')

                    <form action="{{route('user.update', $user->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="container">
                            <div class="form-group">
                                <input type="text" class="form-control" id="name" name="name" placeholder="name" value="{{old('name', $user->name)}}">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="email" name="email" placeholder="email" value="{{old('email', $user->email)}}">
                            </div>

                            @if ($roleId[0]->role_id == 1)
                                <div class="form-group">
                                    <select class="form-control" name="roles" id="roles">
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
                            @else
                                <div class="form-group">
                                    <select hidden class="form-control" name="roles" id="roles">
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

                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
