@extends('layouts.app')
@php
    $bg_image = json_decode(setting('site.login-image'));
@endphp
@section('content')
    <style>
        html, body{
            height:100%;
        }
        .register-page {
            height: 100%;
        }
        .register-page .card {
            background: white;
            border-radius: 15px;
            margin-top: 30%;
            padding-bottom: 50px;
        }
        .register-page .card-header {
            background: white;
            border: none;
            text-align: center;
            padding-top: 50px;
            padding-bottom: 30px;
            border-radius: 15px;
        }
        .register-page .theme-btn {
            width: 100%; margin-top: 20px;
        }
        .register-page .btb-link {
            color: red;
        }
    </style>
    <div class="register-page" style="background-image: url('{{asset("storage/".$bg_image[0]->download_link)}}')">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <img src="{{asset('storage/'.setting('site.logo'))}}" alt="Omega" />
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <input type="hidden" id="role" name="role" value="5" />
                                <div class="form-group row">
                                    <div class="col-sm-6 offset-sm-3">
                                        <input id="name" placeholder="Name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 offset-sm-3">
                                        <input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 offset-sm-3">
                                        <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 offset-sm-3">
                                        <input id="password-confirm" placeholder="Repeat Password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-sm-6 offset-sm-3">
                                        <button type="submit" class="theme-btn">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
