@extends('layouts.app')

@section('content')
<div class="container container-login">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <h1 class="text-center py-5">
                <img src="http://localhost:8000/images/trycat-logo.svg" alt="">
            </h1>
            <div class="card card-login">
                <div class="card-body ">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-4">
                            <label for="name" class="col-12 col-form-label">{{ __('Nome') }}</label>

                            <div class="col-sm-12">
                                <input id="name" placeholder="Nome" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="username" class="col-12 col-form-label">{{ __('Username') }}</label>

                            <div class="col-sm-12">
                                <input id="username" placeholder="Username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}"  autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="email" class="col-12 col-form-label">{{ __('Email') }}</label>

                            <div class="col-sm-12">
                                <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="password" class="col-12 col-form-label">{{ __('Password') }}</label>

                            <div class="col-sm-12">
                                <input id="password" placeholder="Password"  type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="password-confirm" placeholder="Conferma password" class="col-12 col-form-label">{{ __('Conferma Password') }}</label>

                            <div class="col-sm-12">
                                <input id="password-confirm" placeholder="Conferma password" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0 py-3">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary btn-login">
                                    {{ __('Registrati') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
