@extends('layouts.app')

@section('content')
<div class="container mt-5" style="background-color: white">

    <div class="card">
        <h2 class="card-header text-center font-weight-bold">{{$post->title}}</h2>
    </div>

    @include('custom.message')

    @if ($post->user_id == Auth::user()->id)
        <a class="btn btn-success mt-2" href="{{route('post.edit', $post->id)}}">Edit</a>
    @endif

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

<div class="container mt-2" style="background-color: white">
    <div class="card">
        <h2 class="card-header text-center font-weight-bold">Add a comment</h2>
    </div>

    <div class="container">
        <form method="POST" action="{{route('comment.store')}}">
            @csrf
            <input type="hidden" name="post_id" id="post_id" value="{{$post->id}}">
            <div class="form-group">
                <label for="comment">Comment:</label>
                <textarea class="form-control" rows="5" id="comment" name="comment" placeholder="Comment"></textarea>
            </div>
            <button class="btn btn-success" type="submit"><i class="fas fa-share"></i> Send</button>
        </form>
    </div>

    <hr>

    @if (!is_null($comment))
        @foreach ($comment as $c)
            <div class="container">
                <div class="d-flex justify-content-center row">
                    <div class="col">
                        <div class="d-flex flex-column comment-section">
                            <div class="bg-white p-2">
                                <div class="d-flex flex-row user-info"><img class="rounded-circle" src="https://cdn4.iconfinder.com/data/icons/small-n-flat/24/user-alt-512.png" width="40" height="auto">
                                    <div class="d-flex flex-column justify-content-start ml-2"><span class="d-block font-weight-bold name">{{$c->getUser()}}</span><span class="date text-black-50">Shared publicly - {{$c->created_at}}</span></div>
                                </div>
                                <div class="mt-2">
                                    <p class="comment-text">{{$c->comment}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>
@endsection
