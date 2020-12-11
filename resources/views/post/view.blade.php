@extends('layouts.app')

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>{{$post->title}}</h2></div>

                <div class="card-body">

                    @include('custom.message')

                    @if ($post->user_id == Auth::user()->id)
                        <a class="btn btn-success" href="{{route('post.edit', $post->id)}}">Edit</a>
                    @endif

                    <a class="btn btn-primary" href="{{route('post.index')}}">Back</a>
                    <hr>
                    @if (!is_null($post->image))
                        <img src="{{$post->image}}">
                    @endif
                    <p>{{$post->title}}</p>
                    <p>{{$post->getGender()}}</p>
                    <p>{{$post->getUser()}}</p>
                    <?php echo $post->written; ?>

                </div>
            </div>
        </div>
    </div>
</div> -->

<div class="container mt-5" style="background-color: white">

    <div class="card">
        <h2 class="card-header text-center font-weight-bold">{{$post->title}}</h2>
    </div>

    @include('custom.message')

    @if ($post->user_id == Auth::user()->id)
        <a class="btn btn-success mt-2" href="{{route('post.edit', $post->id)}}">Edit</a>
    @endif

    <a class="btn btn-primary mt-2" href="{{route('post.index')}}">Back</a>
    <hr>


    <!--Section: Content-->
    <section class="dark-grey-text mt-4">
        @if (!is_null($post->image))
            <img class="img-fluid mx-auto d-block" src="{{$post->image}}" alt="Sample image">
            <a>
            <div class="mask rgba-white-slight"></div>
            </a>
        @else
            <img class="img-fluid mx-auto d-block" src="https://i.redd.it/79j24t7z96i11.jpg" alt="Sample image">
            <a>
            <div class="mask rgba-white-slight"></div>
            </a>
        @endif
        <hr>
        <p class="mt-5">by <a class="font-weight-bold">{{$post->getUser()}}</a>, {{$post->created_at}}</p>
        <p><i class="fas fa-book"></i> {{$post->getGender()}} | <i class="far fa-eye"></i> {{$post->visibility}}</p>
        <?php echo $post->written; ?>

    </section>
    <!--Section: Content-->
</div>
@endsection
