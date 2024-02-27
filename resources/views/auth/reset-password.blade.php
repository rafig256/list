@extends('frontend.layouts.master')
@section('title','ResetPassword')
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
                            <li class="breadcrumb-item active" aria-current="page"> Reset Password </li>
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
                        <h2> Reset Password </h2>
                        <form action="{{ route('password.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="wsus__login_imput">
                                        <label for="email">email</label>
                                        <input name="email" id="email" type="email" placeholder="Email" value="{{old('email', $request->email)}}" autofocus autocomplete="username" required>
                                    </div>
                                </div>
                                <!-- Password Reset Token -->
                                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                                <div class="col-xl-12">
                                    <div class="wsus__login_imput">
                                        <label for="password">password</label>
                                        <input name="password" id="password" type="password" placeholder="password" required>
                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <div class="wsus__login_imput">
                                        <label for="password_confirmation">password confirmation</label>
                                        <input name="password_confirmation" id="password_confirmation" type="password" placeholder="password confirmation" required>
                                    </div>
                                </div>

                                    <div class="col-xl-12">
                                        <div class="wsus__login_imput">
                                            <button type="submit">Reset password</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<!--=========================
    SIGN IN END
==========================-->
@endsection
