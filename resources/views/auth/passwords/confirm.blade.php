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
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <div class="row mb-4">
                            <label for="Password" class="col-12 col-form-label">{{ __('Password') }}</label>

                            <div class="col-sm-12">
                                <input id="password" placeholder="Inserisci password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}"  autocomplete="name" autofocus>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0 py-3">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary btn-login">
                                    {{ __(' Conferma password') }}
                                </button>

                                @if (Route::has('password.request'))
                                <a class="btn btn-link nav-link" href="{{ route('password.request') }}">
                                    {{ __('Password dimenticata?') }}
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
