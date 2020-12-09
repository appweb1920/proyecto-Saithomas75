@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">List of Posts</div>
                <div class="card-body">
                    @include('custom.message')

                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Title</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Author</th>
                            <th scope="col">Visibility</th>
                            <th colspan="3"></th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($post as $p)
                            <tr>
                                @if (!is_null($p->image))
                                    <th scope="row"><img src="{{$p->image}}"></th>
                                @else
                                    <th><p>No Images at the moment</p></th>
                                @endif
                                <td>{{$p->title}}</td>
                                <td>{{$p->getGender()}}</td>
                                <td>{{$p->getUser()}}</td>
                                <td>{{$p->visibility}}</td>
                                <td><a class="btn btn-info" href="{{route('post.show', $p->id)}}">Show</a></td>
                                <td><a class="btn btn-info" href="{{route('post.edit', $p->id)}}">Edit</a></td>
                                <td>
                                    <form action="{{route('post.destroy', $p->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$post->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
