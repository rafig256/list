@extends('frontend.layouts.master')
@section('title' , 'About US')
@section('content')
    <!--==========================
        BREADCRUMB PART START
    ===========================-->
    <div id="breadcrumb_part">
        <div class="bread_overlay">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 text-center text-white">
                        <h4>About</h4>
                        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('/')}}"> Home </a></li>
                                <li class="breadcrumb-item active" aria-current="page"> About </li>
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


    <!--==========================
        ABOUT  START
    ===========================-->
    <section id="about_page">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-xl-6 col-lg-6">
                    <div class="about_text">
                        <h4>{{$about->titre}}</h4>
                        <p>
                            {{$about->description}}
                        </p>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6">
                    <div class="about_img">
                        <img src="{{asset($about->image_big)}}" alt="about" class="img-fluid w-100">
                        
                        <div class="img_2">
                            <img src="{{asset($about->image)}}" alt="about" class="img-fluid w-100">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--==========================
        ABOUT END
    ===========================-->

@endsection
