@extends('layouts.app')

@section('content')
<div class="container container-login">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <h1 class="text-center py-3">
                <img src="http://localhost:8000/images/trycat-logo.svg" alt="">
            </h1>
            <div class="card card-login">

                <div class="card-body pt-5">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            

                            <div class="col-sm-12">
                                <input id="email" placeholder="Email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">

                            <div class="col-sm-12">
                                <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 py-2 row-ricordami">
                            <div class="col-4 float-left">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Ricordami') }}
                                    </label>
                                </div>
                            </div>
                            <div class="col-8 text-right float-right py-1 px-0">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link text-right" href="{{ route('password.request') }}" style="width:100%; text-align:right; font-size:14px;">
                                        {{ __('Password dimenticata?') }}
                                    </a>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary btn-login">
                                    {{ __('Login') }}
                                </button>
                            </div>
                            <div class="col-sm-12 text-center py-1">
                                @if (Route::has('register'))
                                    <a class="btn btn-link" href="{{ route('register') }}" style="font-size:15px;">
                                        {{ __('Non hai un account? Registrati') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
