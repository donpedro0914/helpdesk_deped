@extends('layouts.app')

@section('content')
<section class="bg-account-pages">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="wrapper-page">
                    <div class="account-pages">
                        <div class="account-box">
                            <div class="account-logo-box">
                                <h2 class="text-center">
                                    <div class="h2 font-w600 push-30-t push-5 center">
                                    {{ HTML::image('img/logo.jpg', 'Logo', array('style' => 'width:50%;display:block;margin:0 auto;')) }}
                                    </div>
                                </h2>
                            </div>
                            <div class="account-content">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label for="emailaddress" class="font-weight-medium">Username</label>
                                        <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" type="text" id="emailaddress" required="" placeholder="Enter your username">
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="password" class="font-weight-medium">Password</label>
                                        <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" type="password" required="" id="password" placeholder="Enter your password">
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group row text-center">
                                        <div class="col-12">
                                            <button class="btn btn-block btn-primary waves-effect waves-light" type="submit">Sign In</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
