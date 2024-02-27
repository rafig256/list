{{--<x-guest-layout>--}}
{{--    <!-- Session Status -->--}}
{{--    <x-auth-session-status class="mb-4" :status="session('status')" />--}}

{{--    <form method="POST" action="{{ route('login') }}">--}}
{{--        @csrf--}}

{{--        <!-- Email Address -->--}}
{{--        <div>--}}
{{--            <x-input-label for="email" :value="__('Email')" />--}}
{{--            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />--}}
{{--            <x-input-error :messages="$errors->get('email')" class="mt-2" />--}}
{{--        </div>--}}

{{--        <!-- Password -->--}}
{{--        <div class="mt-4">--}}
{{--            <x-input-label for="password" :value="__('Password')" />--}}

{{--            <x-text-input id="password" class="block mt-1 w-full"--}}
{{--                            type="password"--}}
{{--                            name="password"--}}
{{--                            required autocomplete="current-password" />--}}

{{--            <x-input-error :messages="$errors->get('password')" class="mt-2" />--}}
{{--        </div>--}}

{{--        <!-- Remember Me -->--}}
{{--        <div class="block mt-4">--}}
{{--            <label for="remember_me" class="inline-flex items-center">--}}
{{--                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">--}}
{{--                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>--}}
{{--            </label>--}}
{{--        </div>--}}

{{--        <div class="flex items-center justify-end mt-4">--}}
{{--            @if (Route::has('password.request'))--}}
{{--                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">--}}
{{--                    {{ __('Forgot your password?') }}--}}
{{--                </a>--}}
{{--            @endif--}}

{{--            <x-primary-button class="ms-3">--}}
{{--                {{ __('Log in') }}--}}
{{--            </x-primary-button>--}}
{{--        </div>--}}
{{--    </form>--}}
{{--</x-guest-layout>--}}


@extends('frontend.layouts.master')
@section('title','Login')
@section('content')
    <!--==========================
        BREADCRUMB PART START
    ===========================-->
    <div id="breadcrumb_part">
        <div class="bread_overlay">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 text-center text-white">
                        <h4>sign in</h4>
                        <nav style="--bs-breadcrumb-divider: '';" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"> Home </a></li>
                                <li class="breadcrumb-item active" aria-current="page"> sign in </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--==========================
        BREADCRUMB PART END
    ===========================-->

    <!--=========================
        SIGN IN START
    ==========================-->
    <section class="wsus__login_page">
        <div class="container">
            <div class="row">
                <div class="col-xxl-5 col-xl-6 col-md-9 col-lg-7 m-auto">
                    <div class="wsus__login_area">
                        <h2>Welcome back!</h2>
                        <p>sign in to continue</p>
                        <form action="{{route('login')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="wsus__login_imput">
                                        <label for="email">email</label>
                                        <input name="email" id="email" type="email" placeholder="Email" value="{{old('email')}}" autofocus autocomplete="username" required>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="wsus__login_imput">
                                        <label for="password">password</label>
                                        <input name="password" id="password" type="password" placeholder="Password" required>
                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <div class="wsus__login_imput wsus__login_check_area">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" name="remember"
                                                   id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Remeber Me
                                            </label>
                                        </div>
                                        <a href="{{ route('password.request') }}">Forget Password ?</a>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="wsus__login_imput">
                                        <button type="submit">login</button>
                                    </div>
                                </div>
                            </div>
                        </form>
{{--                        <p class="or"><span>or</span></p>--}}
{{--                        <ul class="d-flex">--}}
{{--                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>--}}
{{--                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>--}}
{{--                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>--}}
{{--                            <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>--}}
{{--                        </ul>--}}
                        <p class="create_account">Dont’t have an aceount ? <a href="{{route('register')}}">Create Account</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=========================
        SIGN IN END
    ==========================-->
@endsection
