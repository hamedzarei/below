@extends('layouts.base')

@section('title', 'Register Page')

@section('style')
    <link rel="stylesheet" href="{{ asset("css/login.css") }}">
@endsection

@section('sidebar')
    @parent
@stop

@section('content')

    <div class="my-login-page">
    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-md-center h-100">
                <div class="card-wrapper">
                    <div class="brand">
                        <img src="{{ asset("image/logo3.png") }}" alt="bootstrap 4 login page">
                    </div>
                    <div class="card fat">
                        <div class="card-body">
                            <h4 class="card-title">Register</h4>
                            <div class="my-login-validation register-form" novalidate="">
                                <div class="form-group">
                                    <label for="name">First Name</label>
                                    <input id="firstname" type="text" class="form-control" name="firstname" required autofocus>
                                    <div class="invalid-feedback">
                                        What's your firstname?
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name">Last Name</label>
                                    <input id="lastname" type="text" class="form-control" name="lastname" required autofocus>
                                    <div class="invalid-feedback">
                                        What's your lastname?
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password">Postalcode</label>
                                    <input id="postalcode" type="text" class="form-control" name="psotalcode">

                                </div>

                                <div class="form-group">
                                    <label for="password">Mobile</label>
                                    <input id="mobile" type="text" class="form-control" name="mobile">

                                </div>

                                <div class="form-group">
                                    <label for="email">E-Mail Address</label>
                                    <input id="email" type="email" class="form-control" name="email" required>
                                    <div class="invalid-feedback">
                                        Your email is invalid
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input id="password" type="password" class="form-control" name="password" required data-eye>
                                    <div class="invalid-feedback">
                                        Password is required
                                    </div>
                                </div>

                                <div class="form-group m-0">
                                    <button type="submit" class="btn btn-primary btn-block" data-code="{{ $code }}">
                                        Register
                                    </button>
                                </div>
                                <div class="mt-4 text-center">
                                    Already have an account? <a href="/login">Login</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
@stop

@section('script')
 <script src="{{ asset("js/register.js") }}"></script>
@endsection