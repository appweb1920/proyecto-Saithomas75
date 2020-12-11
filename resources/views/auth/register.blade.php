@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- Default form register -->
                <form class="text-center border border-light p-5" method="POST" action="{{ route('register') }}">
                    @csrf

                    <p class="h4 mb-4">Sign up</p>

                    <hr>

                    <!-- Name -->
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror mb-4" name="name" value="{{ old('name') }}" placeholder="Name" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror


                    <!-- E-mail -->
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror mb-4" name="email" value="{{ old('email') }}" placeholder="E-mail" required autocomplete="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <!-- Password -->
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">
                    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                        At least 8 characters and 1 digit
                    </small>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                        At least 8 characters and 1 digit
                    </small>

                    <hr>

                    <p>Already a member?
                        <a href="{{ route('login') }}">Login</a>
                    </p>

                    <!-- Sign up button -->
                    <button class="btn btn-dark btn-block my-4" type="submit">Sign in</button>

                    <hr>

                    <!-- Terms of service -->
                    <p>By clicking
                        <em>Sign up</em> you agree to our
                        <a href="#" target="_blank">terms of service</a>

                </form>
                <!-- Default form register -->
            </div>
        </div>
    </div>
</div>
@endsection
