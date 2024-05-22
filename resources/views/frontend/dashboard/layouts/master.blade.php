<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />
    <title>@yield('title')</title>
    <link rel="icon" type="image/png" href="{{asset(config('settings.favicon'))}}">
    <link rel="stylesheet" href="{{asset('/frontend/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('/frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/frontend/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('/frontend/css/venobox.min.css')}}">
    <link rel="stylesheet" href="{{asset('/frontend/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('/frontend/css/summernote.min.css')}}">
    <link rel="stylesheet" href="{{asset('/frontend/css/nice-select.css')}}">

    <link rel="stylesheet" href="{{asset('/frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('/frontend/css/responsive.css')}}">
    <!-- <link rel="stylesheet" href="css/rtl.css"> -->
    <!--    toastr  -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" class="rel">
    @stack('css')
</head>

<body>

<!--==========================
    TOPBAR PART START
===========================-->
@include('frontend.layouts.tapbar')
<!--==========================
    TOPBAR PART END
===========================-->


<!--==========================
    MENU PART START
===========================-->
@include('frontend.layouts.menu')
<!--==========================
    MENU PART END
===========================-->

<!-- Start Content -->
<section id="dashboard">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                @include('frontend.dashboard.sidebar')
            </div>
            <div class="col-lg-9">
                <div class="dashboard_content">
                        @yield('content')
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Content -->


<!--==========================
    FOOTER PART START
===========================-->
@include('frontend.layouts.footer')
<!--==========================
    FOOTER PART END
===========================-->


<!--=============SCROLL BTN==============-->
<div class="scroll_btn">
    <i class="fas fa-chevron-up"></i>
</div>
<!--=============SCROLL BTN==============-->


<!--jquery library js-->
<script src="{{asset('frontend/js/jquery-3.6.0.min.js')}}"></script>
<!--bootstrap js-->
<script src="{{asset('frontend/js/bootstrap.bundle.min.js')}}"></script>
<!--font-awesome js-->
<script src="{{asset('frontend/js/Font-Awesome.js')}}"></script>
<!--slick js-->
<script src="{{asset('frontend/js/slick.min.js')}}"></script>
<!--venobox js-->
<script src="{{asset('frontend/js/venobox.min.js')}}"></script>
<!--counter js-->
<script src="{{asset('frontend/js/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.countup.min.js')}}"></script>
<!--nice select js-->
<script src="{{asset('frontend/js/select2.min.js')}}"></script>
<!--isotope js-->
<script src="{{asset('frontend/js/isotope.pkgd.min.js')}}"></script>
<!--summer_note js-->
<script src="{{asset('frontend/js/summernote.min.js')}}"></script>
<!--select js-->
<script src="{{asset('frontend/js/jquery.nice-select.min.js')}}"></script>

<!--main/custom js-->
{{--<script src="{{asset('frontend/js/main.js')}}"></script>--}}
<!-- BEGIN TOASTR SCRIPTS -->
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
@if($errors->any())
    <script>
        @foreach($errors->all() as $error)
        toastr.error('{{$error}}')
        @endforeach
    </script>
@endif
@stack('scripts')
</body>

</html>
