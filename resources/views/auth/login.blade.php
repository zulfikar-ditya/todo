@extends('layouts.app')

@section('content')
    <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <h1 class="text-center">Login</h1>
                    <hr class="border border-info">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="my-4">
                            <div class="form-group mb-1">
                                <label for="email" class="">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
    
                            <div class="form-group mb-1">
                                <label for="password" class="">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
    
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" name="remember">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Remember</label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-block btn-outline-info w-100">
                            {{ __('Login') }}
                        </button>
                        <div class="text-center mt-3">
                            <a class="text-center" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
