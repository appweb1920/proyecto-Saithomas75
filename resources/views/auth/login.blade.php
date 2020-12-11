@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- Default form login -->
                <form class="text-center border border-light p-5" method="POST" action="{{ route('login') }}">
                    @csrf
                    <p class="h4 mb-4">Sign in</p>

                    <hr>

                    <!-- Email -->
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror mb-4" name="email" value="{{ old('email') }}" placeholder="E-mail" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    <!-- Password -->
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror mb-4" name="password" placeholder="Password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <hr>

                    <div class="d-flex justify-content-around">
                        <div class="form-group row">
                            <!-- Remember me -->
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                        <div>
                            <!-- Forgot password -->
                            <a href="#">Forgot password?</a>
                        </div>
                    </div>

                    <!-- Sign in button -->
                    <button class="btn btn-dark btn-block my-4" type="submit">Sign in</button>

                    <!-- Register -->
                    <p>Not a member?
                        <a href="{{ route('register') }}">Register</a>
                    </p>
                </form>
                <!-- Default form login -->
            </div>
        </div>
    </div>
</div>
@endsection
