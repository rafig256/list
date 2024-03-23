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
                            <div class="col-xl-4 col-md-6 col-lg-4">
                                <div class="member_price">
                                    <h4>{{$package->name}}</h4>
                                    <h5>{{number_format($package->price,0)}} {{config('setting.currency_symbol')}}<span>/
                                    @if($package->num_of_days == -1)
                                                Unlimited
                                            @else
                                                {{$package->num_of_days}} Days
                                            @endif
                                    </span>
                                    </h5>
                                    <p>type: {{$package->type}}</p>
                                    <p>Daily cost: {{$package->num_of_days == -1 ? 'one time payment' :round($package->price/$package->num_of_days , 0)." ".config('setting.currency_symbol')}}</p>
                                    <p>number of days: {!! $package->num_of_days == -1 ? "<span class='text-success'>Unlimited</span>" : $package->num_of_days !!}</p>
                                    <p>number of listings: {!! $package->num_of_listings == -1 ? "<span class='text-success'>Unlimited</span>" : $package->num_of_listings !!}</p>
                                    <p>number of photos: {!! $package->num_of_photos == -1 ? "<span class='text-success'>Unlimited</span>" : $package->num_of_photos !!}</p>
                                    <p>number of featured: {!! $package->num_of_featured_listings == -1 ? "<span class='text-success'>Unlimited</span>" : $package->num_of_featured_listings !!}</p>
                                    <p>number of amenities: {!! $package->num_of_amenities == -1 ? "<span class='text-success'>Unlimited</span>" : $package->num_of_amenities !!}</p>
                                    <a href="#">Order now</a>
                                </div>
                            </div>
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
