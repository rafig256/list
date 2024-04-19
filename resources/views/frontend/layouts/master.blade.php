<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />
    <title>@yield('title')</title>
    <link rel="icon" type="image/png" href="{{asset('/frontend/images/favicon.png')}}">
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
    <!-- chat -->
    <link rel="stylesheet" href="{{asset('frontend/css/chat.css')}}">
    @stack('css')

    <script>
        var PUSHER_APP_KEY = "{{config('settings.pusher_key')}}";
        var PUSHER_APP_CLUSTER = "{{config('settings.pusher_cluster')}}";
    </script>
    @vite([ 'resources/js/app.js'])
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
@yield('content')
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



<!-- Chat -->
<div>
<input type="checkbox" id="check">
    <label class="chat-btn" for="check"> <i class="fa fa-commenting-o comment"></i> <i class="fa fa-close close"></i> </label>
    <div class="wrapper">
        <div class="header">
            <h6>Let's Chat - Online</h6>
        </div>
        <div class="text-center p-2">
            <span>Please fill out the form to start chat!</span>
        </div>
        <div class="chat-form">
            <input type="text" class="form-control" placeholder="Name">
            <input type="text" class="form-control" placeholder="Email">
            <textarea class="form-control" placeholder="Your Text Message"></textarea>
            <button class="btn btn-success btn-block">Submit</button>
        </div>
    </div>
</div>
<!-- End Chat -->

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
<script src="{{asset('frontend/js/main.js')}}"></script>
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
