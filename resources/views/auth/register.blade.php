@extends('layouts.loggings')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">



            <div class="card flat-shadow rounded-4 ">


                <div class="card-body  py-5 px-lg-5 px-3">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="auth-brand text-center mb-5 mt-3">
                            <img src="{{URL('images/logo.svg')}}" alt="" class="login-logo">
                        </div>

                          {{-- Name --}}
                            <div class="form-floating mb-3">
                                
                                    
                                    <input id="name" type="text" placeholder="Name" class="form-control @error('name') is-invalid @enderror" name="name" minlength="2" value="{{ old('name') }}" required autocomplete="name" autofocus  title="{{ __('articles.CreateTitleName') }}">
                                    <label for="name" required_field>{{ __('Name') }}</label>
                                    <p id="nameError" class="error-validation"></p>
                                <!--script per validazione live su file validationRegister.js-->

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                        {{-- End Name --}}

                         {{-- Lastname --}}
                            <div class="form-floating mb-3">      
                                    <input id="lastname" type="text" placeholder="lastname" class="form-control @error('lastname') is-invalid @enderror" name="lastname" minlength="2" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus  title="{{ __('articles.CreateTitleName') }}">
                                    <label for="lastname" required_field>{{ __('Lastname') }}</label>
                                    <p id="lastnameError" class="error-validation"></p>
                                <!--script per validazione live su file validationRegister.js-->

                                    @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                        {{-- End Lastname --}}

                        
                         {{-- Phone --}}
                         <div class="form-floating mb-3">      
                            <input id="phone" type="text" placeholder="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" minlength="10" value="{{ old('phone') }}" required autocomplete="phone" autofocus  title="{{ __('articles.CreateTitleName') }}">
                            <label for="phone" required_field>{{ __('Phone') }}</label>
                            <p id="phoneError" class="error-validation"></p>
                        <!--script per validazione live su file validationRegister.js-->

                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        {{-- End Lastname --}}

                        {{-- Email --}}
                           <div class="form-floating mb-3">      
                            <input id="email" type="text" placeholder="email" class="form-control @error('email') is-invalid @enderror" name="email" minlength="2" value="{{ old('email') }}" required autocomplete="email" autofocus  title="{{ __('articles.CreateTitleName') }}">
                            <label for="email" required_field>{{ __('Email') }}</label>
                            <p id="emailError" class="error-validation"></p>
                        <!--script per validazione live su file validationRegister.js-->

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        {{-- End Email --}}

                          {{-- Password --}}
                          <div class="form-floating mb-3">      
                            <input id="password" type="password" placeholder="password" class="form-control @error('password') is-invalid @enderror" name="password" minlength="2" value="{{ old('password') }}" required autocomplete="password" autofocus  title="{{ __('articles.CreateTitleName') }}">
                            <label for="password" required_field>{{ __('Password') }}</label>
                            <p id="emailError" class="error-validation"></p>
                        <!--script per validazione live su file validationRegister.js-->

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        {{-- End Password --}}


                         {{-- Password Confirm --}}
                         <div class="form-floating mb-3">      
                            <input id="password-confirm" type="password" placeholder="password-confirm" class="form-control" name="password_confirmation" minlength="2" required autocomplete="new-password" autofocus">
                            <label for="password-confirm" required_field>{{ __('Confirm Password') }}</label>
                        </div>
                        {{-- End Password Confirm --}}



                        {{-- <div class="mb-4 row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div> --}}



{{-- 
                        <div class="mb-4 row">
                            <label for="name" class="col-md-4 col-form-label text-md-right required_field">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" minlength="2" value="{{ old('name') }}" required autocomplete="name" autofocus  title="{{ __('articles.CreateTitleName') }}">
                                <p id="nameError" class="error-validation"></p>
                                <!--script per validazione live su file validationRegister.js-->
                         

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div> --}}

                        {{-- <div class="mb-4 row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right  required_field">{{ __('Lastname') }}</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" minlength="2" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus title="{{ __('articles.CreateTitleName') }}">
                                <p id="lastnameError" class="error-validation"></p>
                                <!--script per validazione live su file validationRegister.js-->
                                @error('lastname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div> --}}

                        
                        {{-- <div class="mb-4 row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right required_field">{{ __('Phone') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" minlength="9" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus title="{{ __('articles.CreateTitleName') }}">
                                <p id="phoneError" class="error-validation"></p>
                                <!--script per validazione live su file validationRegister.js-->
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div> --}}
{{-- 
                        <div class="mb-4 row">
                            <label for="email" class="col-md-4 col-form-label text-md-right required_field">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" minlength="4" name="email" value="{{ old('email') }}" required autocomplete="email" title="{{ __('articles.CreateTitleName') }}">
                                <p id="emailError" class="error-validation"></p>
                                <!--script per validazione live su file validationRegister.js-->
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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                <p id="nameError" class="error-validation"></p>
                                <!--script per validazione live su file validationRegister.js-->
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div> --}}

                        {{-- <div class="mb-4 row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div> --}}
{{-- 
                        <div class="mb-4 row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div> --}}



                        {{-- Login Submit --}}
                      <div class="row mt-lg-4 mt-2 ">
                        <div class="col text-center">
                            <button type="submit" class="btn  ms-btn ms-btn-primary ms-btn-md">
                                <i class="fa-solid fa-right-to-bracket me-2"></i>
                                {{ __('Register') }}
                            </button>
                           
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col text-center">
                            <div class="small">Sei già registrato?</div>
                            <a href="{{ route('login') }}">
                                Login
                            </a>
                        </div>
                    </div>
                    {{-- Login Submit --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
