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
                <form action="{{ route('password.update') }}" class="login-form">
                    @csrf
                    <div class="form-group">
                        <label>Email</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="login-btn">
                            Reset Password
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
