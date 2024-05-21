@extends('frontend.dashboard.layouts.master')
@section('title', 'Dashboard')
@section('content')
<div class="col-lg-12">
    <div class="dashboard_content">
        <div class="manage_dasboard">
            <div class="row">
                <div class="col-xl-4 col-4 col-sm-4 col-lg-4 col-xxl-4">
                    <div class="manage_dashboard_single">
                        <i class="far fa-star"></i>
                        <h3>{{$totalReview}}</h3>
                        <p>Total Reviews</p>
                    </div>
                </div>
                <div class="col-xl-4 col-4 col-sm-4 col-lg-4 col-xxl-4">
                    <div class="manage_dashboard_single orange">
                        <i class="fas fa-list-ul"></i>
                        <h3>{{$listingCount}}</h3>
                        <p>Total listing</p>
                    </div>
                </div>
                <div class="col-xl-4 col-4 col-sm-4 col-lg-4 col-xxl-4">
                    <div class="manage_dashboard_single green">
                        <i class="far fa-heart"></i>
                        <h3>{{$pendingListingCount}}</h3>
                        <p>Pending Listing</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
