<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/266119dd78.js" crossorigin="anonymous"></script>
    <title>Welcome</title>

    <style>
        .masthead {
        min-height: 30rem;
        position: relative;
        display: table;
        width: 100%;
        height: auto;
        padding-top: 8rem;
        padding-bottom: 8rem;
        background: linear-gradient(90deg, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0.1) 100%), url("/img/book.jpg");
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
        }

        .masthead h1 {
        font-size: 4rem;
        margin: 0;
        padding: 0;
        }

        @media (min-width: 992px) {
        .masthead {
            height: 100vh;
        }
        .masthead h1 {
            font-size: 5.5rem;
        }
        }

        footer.footer {
        padding-top: 5rem;
        padding-bottom: 5rem;
        }

        footer.footer .social-link {
        display: block;
        height: 4rem;
        width: 4rem;
        line-height: 4.3rem;
        font-size: 1.5rem;
        background-color: #1D809F;
        transition: background-color 0.15s ease-in-out;
        box-shadow: 0 3px 3px 0 rgba(0, 0, 0, 0.1);
        }

        footer.footer .social-link:hover {
        background-color: #155d74;
        text-decoration: none;
        }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark bg-gradient">
        <a class="navbar-brand" href="{{ url('/home') }}">Written</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            @if (Route::has('login'))
                <ul class="navbar-nav">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/home') }}">Home</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a  class="nav-link" href="{{ route('register') }}">Register</a>
                            </li>
                        @endif
                    @endauth
                </ul>
            @endif
        </div>
      </nav>

      <!--COVER-->
      <header class="masthead d-flex">
        <div class="container text-center my-auto">
          <h1 class="mb-1" >My Project</h1>
          <h3 class="mb-5" style="color: white">
            <em>Project developed for the subject Interactive Web Applications</em>
            <br>
            <em>By Edgar Said Sánchez Alonso</em>
          </h3>
          <a class="btn btn-primary btn-xl js-scroll-trigger" href="{{ route('login') }}">Start</a>
        </div>
        <div class="overlay"></div>
      </header>

      <!-- Footer -->
    <footer class="footer text-center">
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

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
