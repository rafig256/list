@extends('frontend.layouts.master')

@section('title','Packages')

@section('content')


    <!--==========================
        BREADCRUMB PART START
    ===========================-->
    <div id="breadcrumb_part">
        <div class="bread_overlay">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 text-center text-white">
                        <h4>pricing</h4>
                        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('/')}}"> Home </a></li>
                                <li class="breadcrumb-item active" aria-current="page"> pricing </li>
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
        LISTING PAGE START
    ===========================-->
    <section id="wsus__package">
        <div class="wsus__package_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 m-auto">
                        <div class="wsus__heading_area">
                            <h2>Our pricing </h2>
                            <p>Lorem ipsum dolor sit amet, qui assum oblique praesent te. Quo ei erant essent scaevola
                                estut clita dolorem ei est mazim fuisset scribentur.</p>
                        </div>
                    </div>
                </div>
                <div class="procing_area">
                    <div class="row">
                        @foreach($packages as $package)
                            <x-package-component :id="$package->id" />
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--==========================
        LISTING PAGE START
    ===========================-->
@endsection
