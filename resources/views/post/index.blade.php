@extends('layouts.app')

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-auto">
            <div class="card">
                <div class="card-header">My Writings</div>
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
                            <th colspan="3">Actions</th>
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
</div>-->


<div class="container mt-5" style="background-color: white">

    <div class="card">
        <h2 class="card-header text-center font-weight-bold">My Writings</h2>
    </div>

    @include('custom.message')

    @foreach ($post as $p)
    <!--Section: Content-->
    <section class="dark-grey-text mt-4">

      <!-- Grid row -->
      <div class="row align-items-center">

        <!-- Grid column -->
        <div class="col-lg-5 col-xl-4">

          <!-- Featured image -->
          <div class="view overlay rounded z-depth-1-half mb-lg-0 mb-4">
            @if (!is_null($p->image))
                <img class="img-fluid" src="{{$p->image}}" alt="Sample image">
                <a>
                <div class="mask rgba-white-slight"></div>
                </a>
            @else
                <img class="img-fluid" src="https://i.redd.it/79j24t7z96i11.jpg" alt="Sample image">
                <a>
                <div class="mask rgba-white-slight"></div>
                </a>
            @endif
          </div>

        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-lg-7 col-xl-8">

          <!-- Post title -->
          <h4 class="font-weight-bold mb-3"><strong>{{$p->title}}</strong></h4>
          <!-- Excerpt -->
          <p class="dark-grey-text"><?php echo $p->review; ?></p>
          <p><i class="fas fa-book"></i> {{$p->getGender()}} | <i class="far fa-eye"></i> {{$p->visibility}}</p>
          <!-- Post data -->
          <p>by <a class="font-weight-bold">{{$p->getUser()}}</a>, {{$p->created_at}}</p>
          <!-- Read more button -->
          <a class="btn btn-primary btn-md mx-0 btn-rounded" href="{{route('post.show', $p->id)}}">Read more</a>

        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row -->

      <hr class="my-5">

    </section>
    <!--Section: Content-->
    @endforeach
    {{$post->links()}}
  </div>
@endsection
