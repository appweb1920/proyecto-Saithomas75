@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Foro</div>
                <div class="card-body">
                    Welcome  {{ Auth::user()->name }}
                    <a class="btn btn-primary" href="{{route('post.create')}}">Postear</a>
                    <a class="btn btn-primary" href="{{route('post.index')}}">Listado</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
