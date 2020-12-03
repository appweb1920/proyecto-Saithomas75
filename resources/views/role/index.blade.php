@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">List of Roles</div>

                <a href="{{route('role.create')}}" class="btn btn-primary float-right">Create</a>

                <div class="card-body">
                    @include('custom.message')

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
                            @foreach ($roles as $r)
                            <tr>
                                <th scope="row">{{$r ->id}}</th>
                                <td>{{$r->name}}</td>
                                <td>{{$r->slug}}</td>
                                <td>{{$r->description}}</td>
                                <td>{{$r['full-access']}}</td>
                                <td><a class="btn btn-info" href="{{route('role.show', $r->id)}}">Show</a></td>
                                <td><a class="btn btn-info" href="{{route('role.edit', $r->id)}}">Edit</a></td>
                                <td>
                                    <form action="{{route('role.destroy', $r->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$roles->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
