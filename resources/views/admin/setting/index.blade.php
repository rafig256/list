@extends('admin.layouts.master')

@section('title', 'Setting')

@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="account-settings-container layout-top-spacing">
                <div class="account-content">
    <div class="col-lg-12 col-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="mt-5">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>Site Setting</h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area icon-pill">

                <ul class="nav nav-pills mb-3 mt-3" id="icon-pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="general" data-toggle="pill" href="#icon-pills-home"
                           role="tab" aria-controls="icon-pills-home" aria-selected="true">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-home">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg>
                            General
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="icon-pills-contact-tab" data-toggle="pill" href="#icon-pills-contact"
                           role="tab" aria-controls="icon-pills-contact" aria-selected="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-phone">
                                <path
                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                            </svg>
                            Contact</a>
                    </li>
                </ul>

                <div class="tab-content" id="icon-pills-tabContent">
                    <div class="tab-pane fade active show" id="icon-pills-home" role="tabpanel"
                         aria-labelledby="general">
                        <div>
                            <form name="general_setting" method="POST" action="">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="site_name">Site Name</label>
                                            <input type="text" class="form-control mb-4" id="site_name" placeholder="site NAme">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="site_email">Site Email</label>
                                            <input type="email" class="form-control mb-4" id="site_email" placeholder="Site Email" >
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="site_phone">Site phone</label>
                                            <input type="number" class="form-control mb-4" id="site_phone" placeholder="Site phone">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="site_default_currency">Site Default Currency</label>
                                            <select name="site_default_currency" id="site_default_currency" class="form-control mb-4 select2">
                                                <option>Select</option>
                                                @foreach(config('currencies.currency_list') as $key=>$currency)
                                                    <option value="{{$key}}">{{$currency}} ({{$key}})</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="site_currency_icon">Site Currency Icon</label>
                                            <input type="text" class="form-control mb-4" id="site_currency_icon" placeholder="Site Currency Icon">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="site_currency_position">Site Currency position</label>
                                            <select name="site_currency_position" id="site_currency_position" class="form-control mb-4">
                                                <option value="left">Left</option>
                                                <option value="right">Right</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="">
                                    <button type="submit" class="btn btn-sm btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="icon-pills-contact" role="tabpanel"
                         aria-labelledby="icon-pills-contact-tab">
                        <p class="dropcap  dc-outline-primary">
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                            commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
