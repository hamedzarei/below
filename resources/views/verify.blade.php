@extends('layouts.base')

@section('title', 'Verify Page')

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
                                <h4 class="card-title">Enter you verification code</h4>
                                <div class="my-login-validation verify-form" novalidate="">

                                    <div class="form-group">
                                        <label for="verification">Verification Code</label>
                                        <input id="verification" type="text" class="form-control" name="verification" required autofocus>
                                        <div class="invalid-feedback">
                                            What's your verification code?
                                        </div>
                                    </div>

                                    <div class="form-group m-0">
                                        <button type="submit" class="btn btn-primary btn-block"
                                                data-email="{{ $email }}" data-code="{{ $code }}">
                                            Verify
                                        </button>
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
    <script src="{{ asset("js/verify.js") }}"></script>
@endsection