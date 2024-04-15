@extends('frontend.layouts.master')

@section('title', 'Home Page')

@section('content')

    <!--==========================
    BANNER PART START
===========================-->
    @include('frontend.home.sections.banner')
    <!--==========================
        BANNER PART END
    ===========================-->


    <!--==========================
        CATEGORY SLIDER START
    ===========================-->
    @include('frontend.home.sections.slider')
    <!--==========================
        CATEGORY SLIDER END
    ===========================-->


    <!--==========================
        FEATURES PART START
    ===========================-->
    @include('frontend.home.sections.features')
    <!--==========================
        FEATURES PART END
    ===========================-->


    <!--==========================
        COUNTER PART START
    ===========================-->
    @include('frontend.home.sections.counter')
    <!--==========================
        COUNTER PART END
    ===========================-->


    <!--==========================
        OUR CATEGORY START
    ===========================-->
    @include('frontend.home.sections.category')
    <!--==========================
        OUR CATEGORY END
    ===========================-->


    <!--==========================
        OUR LOCATION START
    ===========================-->
    @include('frontend.home.sections.location')
    <!--==========================
        OUR LOCATION END
    ===========================-->


    <!--==========================
        FEATURED LISTING START
    ===========================-->
    @include('frontend.home.sections.listing')
    <!--==========================
        FEATURED LISTING END
    ===========================-->


    <!--==========================
        OUR PACKAGE START
    ===========================-->
    @include('frontend.home.sections.package')
    <!--==========================
        OUR PACKAGE END
    ===========================-->


    <!--============================
        TESTIMONIAL PART START
    ==============================-->
    @include('frontend.home.sections.testimonial')
    <!--============================
        TESTIMONIAL PART END
    ==============================-->


    <!--==========================
        BLOG PART START
    ===========================-->
    @include('frontend.home.sections.blog')
    <!--==========================
        BLOG PART END
    ===========================-->

@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.map').click(function (){
                let id = $(this).data('id');
                $.ajax({
                    method : 'GET',
                    url : '{{route("listing.ajax-modal",":id")}}'.replace(":id",id),
                    data: {},
                    beforeSend: function (){
                        $('.modal-dialog').html(`<div class="spinner-border" role="status">
                                <span class="visually-hidden">Loading...</span>
                        </div>`)
                    },
                    success: function (response) {
                        $('.modal-dialog').html(response);
                    },
                    error: function (xhr,status,error){
                        console.log(error);
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#category_parent_id').change(function() {
                var parentId = $(this).val();
                var token = "{{ csrf_token() }}";
                $.ajax({
                    url: '/admin/ajax/get-child-categories',
                    method: 'POST',
                    data: {
                        parent_id: parentId,
                        _token: token
                    },
                    success: function(response) {
                        $('#category_id').empty(); // پاک کردن گزینه‌های قبلی
                        if (response.length === 0) {
                            // اگر زیرمجموعه‌ای وجود نداشت، گزینه "NO DATA" را اضافه کنید
                            $('#category_id').append($('<option>', {
                                value: '',
                                text: 'NO DATA',
                                disabled: true
                            }));
                        } else {
                            // پر کردن گزینه‌های مجموعه‌های فرزند با داده‌های دریافتی
                            $.each(response, function(index, category) {
                                $('#category_id').append($('<option>', {
                                    value: category.id,
                                    text: category.name
                                }));
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
        });

    </script>

    <script>
        $(document).ready(function() {
            $('#location_parent_id').change(function() {
                var parentId = $(this).val();
                var token = "{{ csrf_token() }}";
                $.ajax({
                    url: '/admin/ajax/get-child-locations',
                    method: 'POST',
                    data: {
                        parent_id: parentId ,
                        _token: token // اضافه کردن توکن CSRF به داده‌های ارسالی
                    },
                    success: function(response) {
                        $('#location_id').empty(); // پاک کردن گزینه‌های قبلی
                        if (response.length === 0) {
                            // اگر زیرمجموعه‌ای وجود نداشت، گزینه "NO DATA" را اضافه کنید
                            $('#location_id').append($('<option>', {
                                value: '',
                                text: 'NO DATA',
                                disabled: true
                            }));
                        }else {
                            $.each(response, function(index, category) {
                                $('#location_id').append($('<option>', {
                                    value: category.id,
                                    text: category.name
                                }));
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
        });
    </script>
@endpush
