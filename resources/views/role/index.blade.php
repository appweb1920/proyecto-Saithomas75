@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">List of Roles</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Description</th>
                            <th scope="col">full-access</th>
                            <th colspan="3"></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            @foreach ($roles as $r)
                                <th scope="row">{{$r ->id}}</th>
                                <td>{{$r->name}}</td>
                                <td>{{$r->slug}}</td>
                                <td>{{$r->description}}</td>
                                <td>{{$r['full-acces']}}</td>
                                <td><a class="btn btn-info" href="{{route('role.show', $r->id)}}">Show</a></td>
                                <td><a class="btn btn-info" href="{{route('role.edit', $r->id)}}">Edit</a></td>
                                <td><a class="btn btn-danger" href="{{route('role.destroy', $r->id)}}">Delete</a></td>
                            @endforeach
                          </tr>
                        </tbody>
                    </table>
                    {{$roles->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
