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
            <h6>Online Support</h6>
        </div>
        @if (!isset($_COOKIE['ishtap_user_phone']))
            <div class="chat">
                <div class="text-center p-2">
                    <span>Please fill out the form to start chat!</span>
                </div>
                <div class="chat-box">
                    <form id="chatForm">
                        @csrf
                        <input type="text" name="name" class="form-control" id="chatName" placeholder="Name*">
                        <input type="text" name="phone" id="chatPhone" class="form-control" placeholder="Phone*">
                        <input type="hidden" name="user_id" id="chatUserId" value="">
                        <textarea class="form-control" name="message" id="chatMessage" placeholder="Your Text Message"></textarea>
                        <button class="btn btn-success btn-block" id="submitChat">Send</button>
                    </form>
                </div>
            </div>
        @else
            <div class="chat chat-box">
               <span class="btn btn-info btn-sm" id="view-records">مشاهده ی سوابق</span>
            </div>
            <div class="chat-form">
                <form id="sendMessage">
                    @csrf
                    <textarea class="form-control" name="message" id="chatMessageArea" placeholder="Your Text Message"></textarea>
                    <input type="hidden" id="firstCookie" value="{{request()->cookie('ishtap_user_phone')}}">
                    <button class="btn btn-success btn-block" id="submitSendMessage">Send</button>
                </form>
            </div>
        @endif
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

<!-- chat -->


<script>
    $(document).ready(function(){
        $('.chat-btn').click(function(){
            let ishtapUserPhoneCookie = {{isset($_COOKIE['ishtap_user_phone']) ? 'true' : 'false'}};
            let loggedIn = {{ auth()->check() ? 'true' : 'false' }};

            if (ishtapUserPhoneCookie) {
                //there is cookie
                findMessage();
            } else {
                //there is Not cookie
                console.log('not cookie');
                if(loggedIn){
                    $('#chatName').val('{{ auth()->user()?->name }}').prop('readonly', true);
                    $('#chatPhone').val('{{ auth()->user()?->phone }}').prop('readonly' , true);
                    $('#chatUserId').val('{{ auth()->user()?->id }}');
                }
            }
        })


        //تنظیم اجرا شدن تابع در زمان سابمیت شدن فرم
        $(document).on('submit', '#submitSecondaryMessage', function(event) {
            event.preventDefault();
            addMessage(event);
        });

        $("#sendMessage").submit(function(event) {
            event.preventDefault();
            addMessage(event);
        });


        //create cookie and add first message
        $("#chatForm").submit(function(event) {
            event.preventDefault();
            var user_id = "{{ auth()->user()?->id }}";
            var formData = {
                name: $("#chatName").val(),
                phone: $("#chatPhone").val(),
                message: $("#chatMessage").val(),
                user_id: user_id,
                _token: "{{ csrf_token() }}"
            };
            $.ajax({
                type: "POST",
                url: "{{route('chat.create')}}", // آدرس سمت سرور
                data: formData,
                success: function(response, status, xhr) {
                    console.log(response);
                    var OriginalCookie = xhr.getResponseHeader("OriginalCookie");
                    // پردازش پاسخ از سرور
                    $('.chat').html(`<div class="chat chat-box">
                    <div class="alert alert-success">${$("#chatMessage").val()}<br><p style='font-size: 10px'>Now</p></div>
            </div>
            <div class="chat-form">
                <form id="submitSecondaryMessage">
                    @csrf
                    <textarea class="form-control" name="message" id="chatMessageArea" placeholder="Your Text Message"></textarea>
                    <input type="hidden" id="firstCookie" name="cookie" value="${OriginalCookie}">
                    <button class="btn btn-success btn-block">Send</button>
                </form>
            </div>`);
                }
            });
        });
    });

    function addMessage(event){
        let message = $('#chatMessageArea').val();
        let cookie = $('#firstCookie').val();
        $.ajax({
            type: "POST",
            url: "{{route('chat.addMessage')}}",
            data: {
                message: message,
                cookie : cookie,
                _token: "{{ csrf_token() }}"
            } ,
            success: function(response) {
                if (response.success){
                    $('.chat-box').append(`<div class="alert alert-success messageBox">${message}<br><p style='font-size: 10px'>Now</p></div>`);
                    $('#chatMessageArea').val('');
                }
            }
        });
    }

    //insert secondary messages in chatBox function
    function processResponse(response) {
        $('.chat').empty();
        $.each(response.messages, function(index, message) {
            const senderType = message.sender_type;
            const messageClass = senderType === 'user' ? 'messageRight' : 'messageLeft';
            $('.chat').append(`<div class="message-box ${messageClass}">${message.message}<br><p style='font-size: 10px'>${message.time}</p></div>`);
        });
    }


    //find Message function
    function findMessage() {
        let cookie = '{{request()->cookie('ishtap_user_phone')}}'
        $.ajax({
            type: "POST",
            url: "{{route('chat.findMessage')}}", // آدرس سمت سرور
            data: {
                cookie: cookie,
                _token: "{{ csrf_token() }}"},

            success: function(response) {
                // پردازش پاسخ از سرور
                processResponse(response);
            }
        });
    }

    $('#view-records').click(findMessage());

</script>


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
