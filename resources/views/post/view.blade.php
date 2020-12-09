@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Edit Role</h2></div>

                <div class="card-body">

                    @include('custom.message')

                    <a class="btn btn-success" href="{{route('post.edit', $post->id)}}">Edit</a>
                    <a class="btn btn-primary" href="{{route('post.index')}}">Back</a>
                    <hr>
                    @if (!is_null($post->image))
                        <img src="{{$post->image}}">
                    @endif
                    <p>{{$post->title}}</p>
                    <p>{{$post->getGender()}}</p>
                    <p>{{$post->getUser()}}</p>
                    {{$post->written}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
