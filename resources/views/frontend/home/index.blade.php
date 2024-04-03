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
@endpush
