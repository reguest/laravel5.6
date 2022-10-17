@extends('layouts.app')

@section('content')

<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
                <li><a href="index.html">Anasayfa</a></li>
                <li class="active">Giriş Yap</li>
            </ol>
        </div>
    </div>
</div>



<div class="account">
    <div class="container">
        <div class="account-top heading">
            <h2>ACCOUNT</h2>
        </div>
        <div class="account-main">
            <div class="col-md-6 account-left">
                <h3>Existing User</h3>
                <div class="account-bottom">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="email" value="{{ old('email') }}" required tabindex="3" required>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="Password" type="password" tabindex="4" required>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                        <div class="address">
                            @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                            @endif
                            <input type="submit" value="Login">

                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6 account-right account-left">
                <h3>New User? Create an Account</h3>
                <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
                <a href="register.html">Create an Account</a>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>






@endsection