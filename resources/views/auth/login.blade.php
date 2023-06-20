@extends('layouts.loggings')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">


            <div class="card flat-shadow rounded-4 ">
               
                <div class="card-body py-5 px-lg-5 px-3">

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                    <h2 class="mb-5 text-center">Login</h2>

                    {{-- Email --}}
                    <div class="form-floating mb-3">
                        <input id="email" type="email" placeholder="example@mail.com" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            <label for="email">Email address</label>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                      </div>
                      {{-- End Email --}}

                      {{-- Password --}}
                      <div class="form-floating">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" id="password" placeholder="Password">
                            <label for="password">Password</label>

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                      </div>
                      {{-- End Password --}}


                      <div class="row py-3 align-items-center">
                        {{-- Remember --}}
                        <div class="col-12 col-lg-6">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" role="switch"  {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">Ricordami</label>
                            </div>
                        </div>
                        {{-- Forgot Password --}}
                        <div class="col-12 col-lg-6 text-lg-end text-start">
                            @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                            @endif
                        </div>
                      </div>

                      {{-- Login Submit --}}
                      <div class="row mt-lg-4 mt-2 ">
                        <div class="col text-center">
                            <button type="submit" class="btn  ms-btn ms-btn-primary ms-btn-md">
                                <i class="fa-solid fa-right-to-bracket me-2"></i>
                                {{ __('Login') }}
                            </button>
                           
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col text-center">
                            <div class="small">Non sei registrato?</div>
                            <a href="{{ route('register') }}">
                                Registrati
                            </a>
                        </div>
                    </div>
                    {{-- Login Submit --}}

                    </form>

                </div>
            </div>
            
            
            
{{--             
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        {{-- <div class="mb-4 row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div> --}}

                        {{-- <div class="mb-4 row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div> --}}

                     

                        {{-- <div class="mb-4 row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4 row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                <a class="btn btn-link" href="{{ route('register') }}">
                                    Registrati
                                </a>

                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div> --}}

        </div>
    </div>
</div>
@endsection
