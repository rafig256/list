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

@if($sectionTitle['features_status'])
    <!--==========================
        FEATURES PART START
    ===========================-->
    @include('frontend.home.sections.features')
    <!--==========================
        FEATURES PART END
    ===========================-->
@endif


    <!--==========================
        COUNTER PART START
    ===========================-->
    @include('frontend.home.sections.counter')
    <!--==========================
        COUNTER PART END
    ===========================-->

@if($sectionTitle['categories_status'])
    <!--==========================
        OUR CATEGORY START
    ===========================-->
    @include('frontend.home.sections.category')
    <!--==========================
        OUR CATEGORY END
    ===========================-->
@endif

@if($sectionTitle['location_status'])
    <!--==========================
        OUR LOCATION START
    ===========================-->
    @include('frontend.home.sections.location')
    <!--==========================
        OUR LOCATION END
    ===========================-->
@endif

@if($sectionTitle['featuredListing_status'])
    <!--==========================
        FEATURED LISTING START
    ===========================-->
    @include('frontend.home.sections.listing')
    <!--==========================
        FEATURED LISTING END
    ===========================-->
@endif

@if($sectionTitle['pricing_status'])
    <!--==========================
        OUR PACKAGE START
    ===========================-->
    @include('frontend.home.sections.package')
    <!--==========================
        OUR PACKAGE END
    ===========================-->
@endif

@if($sectionTitle['testimonials_status'])
    <!--============================
        TESTIMONIAL PART START
    ==============================-->
    @include('frontend.home.sections.testimonial')
    <!--============================
        TESTIMONIAL PART END
    ==============================-->
@endif


@if($sectionTitle['blogs_status'])
        <!--==========================
        BLOG PART START
    ===========================-->
    @include('frontend.home.sections.blog')
    <!--==========================
        BLOG PART END
    ===========================-->
@endif

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
        // create token for use the getChildCategories and getChildLocations
        window.token = {
            csrfToken: '{{ csrf_token() }}'
        };
    </script>
    <script src="{{asset('frontend/js/getChildCategories.js')}}"></script>
    <script src="{{asset('frontend/js/getChildLocations.js')}}"></script>
@endpush
