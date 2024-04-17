@extends('admin.layouts.master')

@section('title', 'Setting')

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
                        <a class="nav-link" id="icon-pills-contact-tab" data-toggle="pill" href="#pusher" role="tab"
                           aria-controls="icon-pills-contact" aria-selected="false">
                            <svg height="24" width="24" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                 xmlns:xlink="http://www.w3.org/1999/xlink"
                                 viewBox="0 0 58 58" xml:space="preserve">
<g>
    <path style="fill:#4DC95B;" d="M29,1.5c16.016,0,29,11.641,29,26c0,5.292-1.768,10.211-4.796,14.318
		C53.602,46.563,54.746,53.246,58,56.5c0,0-9.943-1.395-16.677-5.462c-0.007,0.003-0.015,0.006-0.022,0.009
		c-2.764-1.801-5.532-3.656-6.105-4.126c-0.3-0.421-0.879-0.548-1.33-0.277c-0.296,0.178-0.483,0.503-0.489,0.848
		c-0.01,0.622,0.005,0.784,5.585,4.421C35.854,52.933,32.502,53.5,29,53.5c-16.016,0-29-11.641-29-26C0,13.141,12.984,1.5,29,1.5z"
    />
    <circle style="fill:#FFFFFF;" cx="15" cy="27.5" r="3"/>
    <circle style="fill:#FFFFFF;" cx="29" cy="27.5" r="3"/>
    <circle style="fill:#FFFFFF;" cx="43" cy="27.5" r="3"/>
</g>
</svg>
                            Pusher</a>
                    </li>
                </ul>
                <div class="tab-content" id="icon-pills-tabContent">
                    @include('admin.setting.section.general')
                    @include('admin.setting.section.pusher')
                </div>
            </div>
        </div>
    </div>
@endsection
