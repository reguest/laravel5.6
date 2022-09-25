@extends('layouts.app')

@section('content')


<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
                <li><a href="index.html">Anasayfa</a></li>
                <li class="active">Kayıt ol</li>
            </ol>
        </div>
    </div>
</div>

<div class="register">
    <div class="container">
        <div class="register-top heading">
            <h2>REGISTER</h2>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="register-main">
                <div class="col-md-6 account-left">
                    <input name="name" class="@error('name') is-invalid @enderror" value="{{ old('name') }}" required placeholder="Adınız" type="text" tabindex="1" required>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <input class="@error('name') is-invalid @enderror" placeholder="Email address" name="email" value="{{ old('email') }}" type="text" tabindex="3" required>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    
                </div>
                <div class="col-md-6 account-left">
                    <input id="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" type="password" tabindex="4" required>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <input id="password-confirm" type="password" placeholder="Retry Password" name="password_confirmation" required autocomplete="new-password">
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="address submit">
                <input type="submit" value="Submit">
            </div>
        </form>


    </div>
</div>










