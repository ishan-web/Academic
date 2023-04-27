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

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form action="{{ route('password.email') }}" class="login-form" method="post">
                    @csrf
                    <div class="form-group">
                        <label>{{ __('Email Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="login-btn">
                            Send Link For Password Reset
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
