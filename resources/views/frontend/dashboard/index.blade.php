@extends('frontend.dashboard.layouts.master')
@section('title', 'Dashboard')
@section('content')
<div class="col-lg-12">
    <div class="dashboard_content">
        <div class="manage_dasboard">
            <div class="row">
                <div class="col-xl-6 col-12 col-sm-6 col-lg-6 col-xxl-3">
                    <div class="manage_dashboard_single">
                        <i class="far fa-star"></i>
                        <h3>116</h3>
                        <p>Total Reviews</p>
                    </div>
                </div>
                <div class="col-xl-6 col-12 col-sm-6 col-lg-6 col-xxl-3">
                    <div class="manage_dashboard_single orange">
                        <i class="fas fa-list-ul"></i>
                        <h3>21</h3>
                        <p>active listing</p>
                    </div>
                </div>
                <div class="col-xl-6 col-12 col-sm-6 col-lg-6 col-xxl-3">
                    <div class="manage_dashboard_single green">
                        <i class="far fa-heart"></i>
                        <h3>35</h3>
                        <p>wishlist</p>
                    </div>
                </div>
                <div class="col-xl-6 col-12 col-sm-6 col-lg-6 col-xxl-3">
                    <div class="manage_dashboard_single red">
                        <i class="fal fa-comment-alt-dots"></i>
                        <h3>120</h3>
                        <p>message</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
