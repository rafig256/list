@extends('admin.layouts.master')

@section('title', 'Setting')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{asset('admin/plugins/dropify/dropify.min.css')}}">
    <link href="{{asset('admin/assets/css/users/account-setting.css')}}" rel="stylesheet" type="text/css" />
@endpush
@section('content')
    <div class="col-lg-12 col-12 layout-spacing  mt-2">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12 mt-5 ml-2">
                        <h4>Site Setting</h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area simple-pills">
                <ul class="nav nav-pills mb-3 mt-3" id="icon-pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="general" data-toggle="pill" href="#icon-pills-general" role="tab"
                           aria-controls="icon-pills-general" aria-selected="true">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                 viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2"
                                 stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-home">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg>
                            General
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="icon-pills-contact-tab" data-toggle="pill" href="#pusher" role="tab" aria-controls="icon-pills-contact" aria-selected="false">
                            <svg height="24" width="24" viewBox="0 0 58 58" xml:space="preserve">
<g>
    <path style="fill:#4DC95B;" d="M29,1.5c16.016,0,29,11.641,29,26c0,5.292-1.768,10.211-4.796,14.318
		C53.602,46.563,54.746,53.246,58,56.5c0,0-9.943-1.395-16.677-5.462c-0.007,0.003-0.015,0.006-0.022,0.009
		c-2.764-1.801-5.532-3.656-6.105-4.126c-0.3-0.421-0.879-0.548-1.33-0.277c-0.296,0.178-0.483,0.503-0.489,0.848
		c-0.01,0.622,0.005,0.784,5.585,4.421C35.854,52.933,32.502,53.5,29,53.5c-16.016,0-29-11.641-29-26C0,13.141,12.984,1.5,29,1.5z"/>
    <circle style="fill:#FFFFFF;" cx="15" cy="27.5" r="3"/>
    <circle style="fill:#FFFFFF;" cx="29" cy="27.5" r="3"/>
    <circle style="fill:#FFFFFF;" cx="43" cy="27.5" r="3"/>
</g>
</svg>
                            Pusher</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="icon-pills-icon-tab" data-toggle="pill" href="#icon-pills-icon" role="tab" aria-controls="icon-pills-icon" aria-selected="false">
                            <svg width="24" height="24" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><title>folder_type_favicon_opened</title><path d="M27.4,5.5H18.2L16.1,9.7H4.3v4H.5L4.3,26.5H29.5V5.5ZM20.2,7.6h7.1V9.7H19.2Zm5.5,6.1H6.6V11.8H27.4v7.626Z" style="fill:#7daad3"/><circle cx="21" cy="21" r="10" style="fill:#ffc107"/><circle cx="21" cy="21" r="9" style="fill:#1976d2"/><path d="M26.745,19.168a1.335,1.335,0,0,0-.146.111c-.807.8-1.617,1.591-2.416,2.4-.352.355-.278.275-.211.689.184,1.138.382,2.274.574,3.41,0,.03.006.06.011.109-.188-.095-.364-.181-.538-.27q-1.4-.718-2.808-1.442a.365.365,0,0,0-.371-.007c-.659.345-1.32.683-1.981,1.023q-.6.311-1.205.618c-.054.028-.11.051-.185.085.01-.09.016-.162.027-.233q.217-1.335.435-2.67c.046-.281.085-.563.131-.845a.315.315,0,0,0-.1-.294l-1.241-1.223L15.4,19.316c-.043-.043-.083-.087-.14-.148l.611-.095q1.594-.254,3.19-.506a.233.233,0,0,0,.186-.136q.52-1.037,1.045-2.07c.2-.4.395-.795.593-1.193.026-.051.053-.1.089-.169.04.071.072.124.1.179.455.891.907,1.784,1.363,2.674.107.208.223.411.344.611a.245.245,0,0,0,.15.1q1.067.168,2.135.325c.534.079,1.069.154,1.6.231a.3.3,0,0,1,.056.017Z" style="fill:#ffc107"/></svg>
                        Logo and FavIcon</a>
                    </li>
                </ul>
                <div class="tab-content" id="icon-pills-tabContent">
                    @include('admin.setting.section.general')
                    @include('admin.setting.section.icon')
                    @include('admin.setting.section.pusher')
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{asset('admin/plugins/dropify/dropify.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/users/account-settings.js')}}"></script>
@endpush
