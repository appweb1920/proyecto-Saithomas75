@extends('layouts.app')

@section('content')
<div class="container">
    <!--Carousel Wrapper-->
    <div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">
        <!--Indicators-->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-2" data-slide-to="1"></li>
            <li data-target="#carousel-example-2" data-slide-to="2"></li>
        </ol>
        <!--/.Indicators-->
        <!--Slides-->
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active" style="background-color: #a6e3e9">
                <div class="view">
                <img class="img-fluid mx-auto d-block" src="{{$post[0]->image}}"
                    alt="{{$post[0]->title}}">
                <div class="mask rgba-black-light"></div>
                </div>
                <div class="carousel-caption">
                <h3 class="h3-responsive">{{$post[0]->title}}</h3>
                <p>By, {{$post[0]->getUser()}}</p>
                </div>
            </div>
            <div class="carousel-item" style="background-color: #a6e3e9">
                <!--Mask color-->
                <div class="view">
                <img class="img-fluid mx-auto d-block" src="{{$post[1]->image}}"
                    alt="{{$post[1]->title}}">
                <div class="mask rgba-black-strong"></div>
                </div>
                <div class="carousel-caption">
                <h3 class="h3-responsive">{{$post[1]->title}}</h3>
                <p>By, {{$post[1]->getUser()}}</p>
                </div>
            </div>
            <div class="carousel-item" style="background-color: #a6e3e9">
                <!--Mask color-->
                <div class="view">
                <img class="img-fluid mx-auto d-block" src="{{$post[3]->image}}"
                    alt="{{$post[3]->title}}">
                <div class="mask rgba-black-slight"></div>
                </div>
                <div class="carousel-caption">
                <h3 class="h3-responsive">{{$post[3]->title}}</h3>
                <p>By, {{$post[3]->getUser()}}</p>
            </div>
        </div>
        </div>
        <!--/.Slides-->
        <!--Controls-->
        <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
        </a>
        <!--/.Controls-->
    </div>
    <!--/.Carousel Wrapper-->
</div>

<div class="container">
    <div class="container mt-5">
        <!--Section: Content-->
        <section class="dark-grey-text text-center">

          <!-- Section heading -->
          <h2 class="font-weight-bold mb-4 pb-2">More recommendations</h2>
          <!-- Section description -->
          <p class="text-center mx-auto w-responsive mb-5">Explore more interesting stories.</p>

            <!-- Grid row -->
          <div class="row">

            <!-- Grid column -->
            <div class="col-lg-4 col-md-12 mb-4">

              <!-- Featured image -->
              <div class="view overlay rounded z-depth-2 mb-4">
                <img class="img-fluid" src="{{$post[2]->image}}" alt="{{$post[2]->title}}">
                <a>
                  <div class="mask rgba-white-slight"></div>
                </a>
              </div>

              <!-- Category -->
              <a class="pink-text">
                <h6 class="font-weight-bold mb-3"><i class="fas fa-book"></i> {{$post[2]->getGender()}}</h6>
              </a>
              <!-- Post title -->
              <h4 class="font-weight-bold mb-3"><strong>{{$post[2]->title}}</strong></h4>
              <!-- Post data -->
              <p>by <a class="font-weight-bold">{{$post[2]->getUser()}}</a>, {{$post[2]->created_at}}</p>
              <!-- Read more button -->
              <a class="btn btn-primary btn-md mx-0 btn-rounded" href="{{route('post.show', $post[2]->id)}}">Read more</a>

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-lg-4 col-md-6 mb-4">

              <!-- Featured image -->
              <div class="view overlay rounded z-depth-2 mb-4">
                <img class="img-fluid" src="{{$post[1]->image}}" alt="{{$post[1]->title}}">
                <a>
                  <div class="mask rgba-white-slight"></div>
                </a>
              </div>

              <!-- Category -->
              <a class="deep-orange-text">
                <h6 class="font-weight-bold mb-3"><i class="fas fa-book"></i> {{$post[1]->getGender()}}</h6>
              </a>
              <!-- Post title -->
              <h4 class="font-weight-bold mb-3"><strong>{{$post[1]->title}}</strong></h4>
              <!-- Post data -->
              <p>by <a class="font-weight-bold">{{$post[1]->getUser()}}</a>, {{$post[1]->created_at}}</p>
              <!-- Read more button -->
              <a class="btn btn-primary btn-md mx-0 btn-rounded" href="{{route('post.show', $post[1]->id)}}">Read more</a>

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-lg-4 col-md-6 mb-4">

              <!-- Featured image -->
              <div class="view overlay rounded z-depth-2 mb-4">
                <img class="img-fluid" src="{{$post[0]->image}}" alt="{{$post[0]->title}}">
                <a>
                  <div class="mask rgba-white-slight"></div>
                </a>
              </div>

              <!-- Category -->
              <a class="blue-text">
                <h6 class="font-weight-bold mb-3"><i class="fas fa-book"></i> {{$post[0]->getGender()}}</h6>
              </a>
              <!-- Post title -->
              <h4 class="font-weight-bold mb-3"><strong>{{$post[0]->title}}</strong></h4>
              <!-- Post data -->
              <p>by <a class="font-weight-bold">{{$post[0]->getUser()}}</a>, {{$post[0]->created_at}}</p>
              <!-- Read more button -->
              <a class="btn btn-primary btn-md mx-0 btn-rounded" href="{{route('post.show', $post[0]->id)}}">Read more</a>

            </div>
            <!-- Grid column -->

          </div>
          <!-- Grid row -->

        </section>
        <!--Section: Content-->
      </div>
</div>

<footer class="footer text-center bg-dark text-white">
    <div class="container">
    <ul class="list-inline mb-5">
        <li class="list-inline-item">
        <a class="social-link rounded-circle text-white mr-3" href="#">
            <i class="fab fa-facebook-f"></i>
        </a>
        </li>
        <li class="list-inline-item">
        <a class="social-link rounded-circle text-white mr-3" href="#">
            <i class="fab fa-twitter"></i>
        </a>
        </li>
        <li class="list-inline-item">
        <a class="social-link rounded-circle text-white" href="https://github.com/appweb1920/proyecto-Saithomas75">
            <i class="fab fa-github"></i>
        </a>
        </li>
    </ul>
        <p class="text-muted small mb-0">Edgar Said Sánchez Alonso 279627</p>
    </div>
</footer>

@endsection
