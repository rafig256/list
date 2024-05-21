@extends('admin.layouts.master')

@section('title','Admin | Dashboard')

@push('css')
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{asset('admin/assets/css/scrollspyNav.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/assets/css/components/custom-counter.css')}}" rel="stylesheet" type="text/css">
    <!--  END CUSTOM STYLE FILE  -->
@endpush

@section('content')
    <div class="page-header">
        <div class="page-title">
            <h3>Analytics Dashboard</h3>
        </div>
        <div class="dropdown filter custom-dropdown-icon">
            <a class="dropdown-toggle btn" href="#" role="button" id="filterDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="text"><span>Show</span> : Daily Analytics</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather counter-ico feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>            </a>

            <div class="dropdown-menu" aria-labelledby="filterDropdown">
                <a class="dropdown-item" data-value="<span>Show</span> : Daily Analytics" href="javascript:void(0);">Daily Analytics</a>
                <a class="dropdown-item" data-value="<span>Show</span> : Weekly Analytics" href="javascript:void(0);">Weekly Analytics</a>
                <a class="dropdown-item" data-value="<span>Show</span> : Monthly Analytics" href="javascript:void(0);">Monthly Analytics</a>
                <a class="dropdown-item" data-value="Download All" href="javascript:void(0);">Download All</a>
                <a class="dropdown-item" data-value="Share Statistics" href="javascript:void(0);">Share Statistics</a>
            </div>
        </div>
    </div>

    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget-four">
                <div class="widget-heading">
                    <h5 class="">statistics</h5>
                </div>
                <div class="icon--counter-container">

                    <div class="counter-container">

                        <div class="counter-content">
                            <h1 class="ico-counter1 ico-counter">{{$users}}</h1>
                        </div>

                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather counter-ico feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>

                        <p class="ico-counter-text">Users</p>
                    </div>

                    <div class="counter-container">

                        <div class="counter-content">
                            <h1 class="ico-counter2 ico-counter">{{$listing}}</h1>
                        </div>

                        <svg width="24px" height="24px" viewBox="0 0 60 60" stroke="currentColor" class="feather counter-ico feather-user">
                            <g id="People"stroke-width="1">
                                <g id="Icon-11">
                                    <path d="M28,27 L28,30 L32,30 L32,27 L32,22 L28,22 L28,27 Z M8,27 C8,26.448 8.448,26 9,26 L26,26 L26,22 C26,20.897 26.897,20 28,20 L32,20 C33.103,20 34,20.897 34,22 L34,26 L51,26 C51.552,26 52,26.448 52,27 C52,27.552 51.552,28 51,28 L34,28 L34,30 C34,31.103 33.103,32 32,32 L28,32 C26.897,32 26,31.103 26,30 L26,28 L9,28 C8.448,28 8,27.552 8,27 L8,27 Z M30.03,29 C30.583,29 31.03,28.552 31.03,28 C31.03,27.448 30.583,27 30.03,27 L30.02,27 C29.468,27 29.025,27.448 29.025,28 C29.025,28.552 29.478,29 30.03,29 L30.03,29 Z M7,10 C6.449,10 6,10.449 6,11 L6,40 L54,40 L54,11 C54,10.449 53.551,10 53,10 L7,10 Z M26,8 L34,8 L34,6 L26,6 L26,8 Z M22,8 L24,8 L24,5 C24,4.448 24.448,4 25,4 L35,4 C35.552,4 36,4.448 36,5 L36,8 L38,8 L38,3 C38,2.449 37.551,2 37,2 L23,2 C22.449,2 22,2.449 22,3 L22,8 Z M7,8 L20,8 L20,3 C20,1.346 21.346,0 23,0 L37,0 C38.654,0 40,1.346 40,3 L40,8 L53,8 C54.654,8 56,9.346 56,11 L56,41 C56,41.552 55.552,42 55,42 L5,42 C4.448,42 4,41.552 4,41 L4,11 C4,9.346 5.346,8 7,8 L7,8 Z M39,54 L36,54 L36,53 C36,52.448 35.552,52 35,52 C34.448,52 34,52.448 34,53 L34,55 C34,55.552 34.448,56 35,56 L39,56 C40.123,56 41.295,56.914 41.775,58 L18.225,58 C18.705,56.914 19.877,56 21,56 L31,56 C31.552,56 32,55.552 32,55 C32,54.448 31.552,54 31,54 L26,54 L26,53 C26,52.448 25.552,52 25,52 C24.448,52 24,52.448 24,53 L24,54 L21,54 C18.43,54 16,56.43 16,59 C16,59.552 16.448,60 17,60 L43,60 C43.552,60 44,59.552 44,59 C44,56.43 41.57,54 39,54 L39,54 Z M30.02,44 C29.468,44 29.025,44.448 29.025,45 C29.025,45.552 29.478,46 30.03,46 C30.583,46 31.03,45.552 31.03,45 C31.03,44.448 30.583,44 30.03,44 L30.02,44 Z M60,9 L60,45 C60,47.804 57.804,50 55,50 L5,50 C1.898,50 0,45.468 0,43 L0,9 C0.191,6.167 2.386,4 5,4 L17,4 C17.552,4 18,4.448 18,5 C18,5.552 17.552,6 17,6 L5,6 C3.252,6 2.101,7.56 1.998,9.068 L2,43 C2,45.02 3.58,48 5,48 L55,48 C56.71,48 58,46.71 58,45 L58,9 C58,7.346 56.654,6 55,6 L43,6 C42.448,6 42,5.552 42,5 C42,4.448 42.448,4 43,4 L55,4 C57.757,4 60,6.243 60,9 L60,9 Z" id="job-desktop">

                                    </path>
                                </g>
                            </g>
                        </svg>
                        <p class="ico-counter-text">Listings</p>
                    </div>

                    <div class="counter-container">
                        <div class="counter-content">
                            <h1 class="ico-counter3 ico-counter">{{$review}}</h1>
                        </div>

                        <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" class="feather counter-ico feather-user">
                            <path opacity="0.5" d="M22 10.5V12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2H13.5" stroke="blue" stroke-width="1.5" stroke-linecap="round"/>
                            <path d="M17.3009 2.80624L16.652 3.45506L10.6872 9.41993C10.2832 9.82394 10.0812 10.0259 9.90743 10.2487C9.70249 10.5114 9.52679 10.7957 9.38344 11.0965C9.26191 11.3515 9.17157 11.6225 8.99089 12.1646L8.41242 13.9L8.03811 15.0229C7.9492 15.2897 8.01862 15.5837 8.21744 15.7826C8.41626 15.9814 8.71035 16.0508 8.97709 15.9619L10.1 15.5876L11.8354 15.0091C12.3775 14.8284 12.6485 14.7381 12.9035 14.6166C13.2043 14.4732 13.4886 14.2975 13.7513 14.0926C13.9741 13.9188 14.1761 13.7168 14.5801 13.3128L20.5449 7.34795L21.1938 6.69914C22.2687 5.62415 22.2687 3.88124 21.1938 2.80624C20.1188 1.73125 18.3759 1.73125 17.3009 2.80624Z" stroke="#1C274C" stroke-width="1.5"/>
                            <path opacity="0.5" d="M16.6522 3.45508C16.6522 3.45508 16.7333 4.83381 17.9499 6.05034C19.1664 7.26687 20.5451 7.34797 20.5451 7.34797M10.1002 15.5876L8.4126 13.9" stroke="blue" stroke-width="1.5"/>
                        </svg>
                        <p class="ico-counter-text">Reviews</p>
                    </div>

                    <div class="counter-container">
                        <div class="counter-content">
                            <h1 class="ico-counter3 ico-counter">{{$post}}</h1>
                        </div>

                        <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" class="feather counter-ico feather-user">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M19.5 15.6857L19.5 4.5H4.5V18.75L5.25 19.5L13.7205 19.5V19.5H15.2205V19.5H15.6857L19.5 15.6857ZM15.2205 17.8439L17.8437 15.2206H15.2205V17.8439ZM18 13.7206L18 6L6 6L6 18L13.7205 18V13.7206H18Z" fill="blue"/>
                        </svg>
                        <p class="ico-counter-text">Posts</p>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection

@push('scripts')
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{asset('admin/assets/js/scrollspyNav.js')}}"></script>
    <script src="{{asset('admin/plugins/counter/jquery.countTo.js')}}"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    assets/js/scrollspyNav.js
    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <script src="{{asset('admin/assets/js/components/custom-counter.js')}}"></script>
    <!--  END CUSTOM SCRIPTS FILE  -->
@endpush
