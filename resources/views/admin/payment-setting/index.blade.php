@extends('admin.layouts.master')

@section('title', 'Payment Setting')

@section('content')
<div class="col-lg-12 col-12 layout-spacing mt-2">
    <div class="statbox widget box box-shadow">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12 mt-5 ml-2">
                    <h4>Payment Setting</h4>
                </div>
            </div>
        </div>
        <div class="widget-content widget-content-area simple-pills">
            <ul class="nav nav-pills mb-3 mt-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="paypal-setting" data-toggle="pill" href="#paypal" role="tab"
                       aria-controls="pills-home" aria-selected="true">PayPal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="other" data-toggle="pill" href="#pills-contact" role="tab"
                       aria-controls="pills-contact" aria-selected="false">Aqaye PArdakht</a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                @include('admin.payment-setting.paypal.index')
                @include('admin.payment-setting.aqayepardakht.index')
            </div>
        </div>
    </div>
</div>
@endsection
