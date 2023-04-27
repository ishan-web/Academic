@extends('layouts.app')

@section('content')
@php 
    $sitesetting = App\Models\sitesetting::first();
@endphp
    <div id="preloader"></div>
    <!-- Preloader End Here -->
    <!-- Login Page Start Here -->
    <div class="login-page-wrap">
        <div class="login-page-content">
            <div class="login-box">
                <div class="item-logo">
                    @if($sitesetting!==null)
                    <img src="{{ asset('uploads/logo/'.$sitesetting->logo) }}" alt="main_logo" class="logo">
                    @endif
                </div>
                <form action="{{ route('login') }}" class="login-form" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Email</label>
                        <input id="email" type="email" placeholder="Enter Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        <i class="far fa-envelope"></i>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" placeholder="Enter password"  id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        <i class="fas fa-lock"></i>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="form-group d-flex align-items-center justify-content-between">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                Remember Me
                            </label>
                        </div>
                        @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="forgot-btn">Forgot Password?</a>
                        @endif
                    </div>
                    <div class="form-group">
                        <button type="submit" class="login-btn">
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
