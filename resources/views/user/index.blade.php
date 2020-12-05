@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">List of Users</div>

                <div class="card-body">
                    @include('custom.message')

                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Roles</th>
                            <th colspan="3"></th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $r)
                            <tr>
                                <th scope="row">{{$r ->id}}</th>
                                <td>{{$r->name}}</td>
                                <td>{{$r->email}}</td>
                                @isset($r->roles[0]->name)
                                    <td>{{$r->roles[0]->name}}</td>
                                @endisset

                                @can('view', [$r, ['user.show', 'userown.show']])
                                    <td><a class="btn btn-info" href="{{route('user.show', $r->id)}}">Show</a></td>
                                @endcan
                                @can('update', [$r, ['user.edit', 'userown.edit']])
                                    <td><a class="btn btn-info" href="{{route('user.edit', $r->id)}}">Edit</a></td>
                                @endcan
                                <td>
                                    @can('haveaccess', 'user.destroy')
                                        <form action="{{route('user.destroy', $r->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger">Delete</button>
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$users->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
