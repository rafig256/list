@extends('admin.layouts.master')

@section('title','Show Post')

@push('css')
    <link href="{{asset('admin/assets/css/users/user-profile.css')}}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
    <div class="layout-px-spacing widget-content-area" style="border-radius: 10px; margin-top: 10px; padding-top: 10px">
        <div class=" layout-spacing">
    <div class="account-settings-container layout-top-spacing" style="padding-top: 30px">
        <div class="account-content">
            <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                        <div class="section social">
                            <div class="info">
                                <h5 class=""><span>title: </span> {{$post->title}}</h5>
                                <span>sluge: {{$post->slug}}</span>
                                <div class="row">
                                    <div class="col-lg-11 mx-auto">
                                        <div class="row">
                                            <div class="col-xl-8 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                <div class="form">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                {{$post->description}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card component-card_2 col-xl-4 col-lg-12 col-md-4">
                                                <img src="{{$post->image}}" class="card-img-top" alt="{{$post->title}}">
                                                <div class="card-body">

                                                    <ul class="list-group list-group-icons-meta">
                                                        <li class="list-group-item list-group-item-action">
                                                            <div class="media">
                                                                <div class="d-flex mr-3">
                                                                    <svg fill="#000000" height="50px" width="50px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                         viewBox="0 0 964.07 964.07" xml:space="preserve">
<g>
    <path d="M850.662,877.56c-0.77,0.137-4.372,0.782-10.226,1.831c-230.868,41.379-273.337,48.484-278.103,49.037
		c-11.37,1.319-19.864,0.651-25.976-2.042c-3.818-1.682-5.886-3.724-6.438-4.623c0.268-1.597,2.299-5.405,3.539-7.73
		c1.207-2.263,2.574-4.826,3.772-7.558c7.945-18.13,2.386-36.521-14.51-47.999c-12.599-8.557-29.304-12.03-49.666-10.325
		c-12.155,1.019-225.218,36.738-342.253,56.437l-57.445,45.175c133.968-22.612,389.193-65.433,402.622-66.735
		c11.996-1.007,21.355,0.517,27.074,4.4c3.321,2.257,2.994,3.003,2.12,4.997c-0.656,1.497-1.599,3.264-2.596,5.135
		c-3.835,7.189-9.087,17.034-7.348,29.229c1.907,13.374,11.753,24.901,27.014,31.626c8.58,3.78,18.427,5.654,29.846,5.654
		c4.508,0,9.261-0.292,14.276-0.874c9.183-1.065,103.471-17.67,280.244-49.354c5.821-1.043,9.403-1.686,10.169-1.821
		c9.516-1.688,15.861-10.772,14.172-20.289S860.183,875.87,850.662,877.56z"/>
    <path d="M231.14,707.501L82.479,863.005c-16.373,17.127-27.906,38.294-33.419,61.338l211.087-166.001
		c66.081,29.303,118.866,38.637,159.32,38.637c71.073,0,104.065-28.826,104.065-28.826c-66.164-34.43-75.592-98.686-75.592-98.686
		c50.675,21.424,156.235,46.678,156.235,46.678c140.186-93.563,213.45-296.138,213.45-296.138
		c-14.515,3.99-28.395,5.652-41.475,5.652c-65.795,0-111-42.13-111-42.13l183.144-39.885C909.186,218.71,915.01,0,915.01,0
		L358.176,495.258C295.116,551.344,250.776,625.424,231.14,707.501z"/>
</g>
</svg>
                                                                </div>
                                                                <div class="media-body pl-2 pr-2">
                                                                    <h6 class="tx-inverse">Author</h6>
                                                                    <p class="mg-b-0">{{$post->user->name}}</p>
                                                                </div>
                                                            </div>
                                                        </li>

                                                        <li class="list-group-item list-group-item-action">
                                                            <div class="media">
                                                                <div class="d-flex mr-3">
                                                                    <svg fill="#000000" width="50px" height="50px" viewBox="-7.5 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                                                        <title>category</title>
                                                                        <path d="M2.594 4.781l-1.719 1.75h15.5l-1.719-1.75h-12.063zM17.219 13.406h-17.219v-6.031h17.219v6.031zM12.063 11.688v-1.719h-6.875v1.719h0.844v-0.875h5.156v0.875h0.875zM17.219 20.313h-17.219v-6.031h17.219v6.031zM12.063 18.594v-1.75h-6.875v1.75h0.844v-0.875h5.156v0.875h0.875zM17.219 27.188h-17.219v-6h17.219v6zM12.063 25.469v-1.719h-6.875v1.719h0.844v-0.875h5.156v0.875h0.875z"></path>
                                                                    </svg>
                                                                    <div class="media-body pl-2 pr-2">
                                                                        <h6 class="tx-inverse">Category</h6>
                                                                        <p class="mg-b-0">
                                                                            @foreach($post->blogCategories as $category)
                                                                                <span class="badge badge-secondary"> {{$category->name}} </span>
                                                                            @endforeach
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>

                                                        <li class="list-group-item list-group-item-action">
                                                            <div class="media">
                                                                <div class="d-flex mr-3">
                                                                    <svg width="50px" height="50px" viewBox="0 -4 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">

                                                                        <title>view_simple [#815]</title>
                                                                        <desc>Created with Sketch.</desc>
                                                                        <defs>

                                                                        </defs>
                                                                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                            <g id="Dribbble-Light-Preview" transform="translate(-260.000000, -4563.000000)" fill="#000000">
                                                                                <g id="icons" transform="translate(56.000000, 160.000000)">
                                                                                    <path d="M216,4409.00052 C216,4410.14768 215.105,4411.07682 214,4411.07682 C212.895,4411.07682 212,4410.14768 212,4409.00052 C212,4407.85336 212.895,4406.92421 214,4406.92421 C215.105,4406.92421 216,4407.85336 216,4409.00052 M214,4412.9237 C211.011,4412.9237 208.195,4411.44744 206.399,4409.00052 C208.195,4406.55359 211.011,4405.0763 214,4405.0763 C216.989,4405.0763 219.805,4406.55359 221.601,4409.00052 C219.805,4411.44744 216.989,4412.9237 214,4412.9237 M214,4403 C209.724,4403 205.999,4405.41682 204,4409.00052 C205.999,4412.58422 209.724,4415 214,4415 C218.276,4415 222.001,4412.58422 224,4409.00052 C222.001,4405.41682 218.276,4403 214,4403" id="view_simple-[#815]">

                                                                                    </path>
                                                                                </g>
                                                                            </g>
                                                                        </g>
                                                                    </svg>                                                                </div>
                                                                <div class="media-body pl-2 pr-2">
                                                                    <h6 class="tx-inverse">views</h6>
                                                                    <p class="mg-b-0">{{$post->views}}</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item list-group-item-action">
                                                            <div class="media">
                                                                <div class="d-flex mr-3">
                                                                    <svg width="50px" height="50px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M12 6C12 4.11438 12 3.17157 12.5858 2.58579C13.1716 2 14.1144 2 16 2H18C19.8856 2 20.8284 2 21.4142 2.58579C22 3.17157 22 4.11438 22 6V8C22 9.88562 22 10.8284 21.4142 11.4142C20.8284 12 19.8856 12 18 12H16C14.1144 12 13.1716 12 12.5858 11.4142C12 10.8284 12 9.88562 12 8V6Z" fill="#1C274C"/>
                                                                        <path d="M10.5 7.00048C8.94286 7.00504 8.11735 7.05425 7.5858 7.5858C7.00001 8.17159 7.00001 9.1144 7.00001 11V13C7.00001 14.4372 7.00001 15.3267 7.2594 15.9279C7.32969 16.0908 7.41903 16.2325 7.53258 16.3582C7.54976 16.3773 7.56749 16.3959 7.58579 16.4142C8.17157 17 9.11438 17 11 17H13C14.8856 17 15.8284 17 16.4142 16.4142C16.9458 15.8827 16.995 15.0572 16.9995 13.5L15.9105 13.5C15.0449 13.5001 14.2512 13.5002 13.6056 13.4134C12.8946 13.3178 12.1432 13.0929 11.5251 12.4749C10.9071 11.8568 10.6822 11.1054 10.5866 10.3944C10.4998 9.74881 10.4999 8.95514 10.5 8.08951L10.5 7.00048Z" fill="#1C274C"/>
                                                                        <path d="M5.50001 12.0005C3.94285 12.005 3.11733 12.0542 2.58579 12.5858C2 13.1716 2 14.1144 2 16V18C2 19.8856 2 20.8284 2.58579 21.4142C3.17157 22 4.11438 22 6 22H8C9.88562 22 10.8284 22 11.4142 21.4142C11.9458 20.8827 11.995 20.0572 11.9995 18.5L10.9105 18.5C10.0449 18.5001 9.25122 18.5002 8.6056 18.4134C7.89464 18.3178 7.14319 18.0929 6.52514 17.4749C5.90709 16.8568 5.6822 16.1054 5.58661 15.3944C5.49981 14.7488 5.4999 13.9551 5.50001 13.0895L5.50001 12.0005Z" fill="#1C274C"/>
                                                                    </svg>
                                                                    <div class="media-body pl-2 pr-2">
                                                                    <h6 class="tx-inverse">Popular</h6>
                                                                    <p class="mg-b-0">{{$post->is_popular ? 'Yes' : 'No'}}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item list-group-item-action">
                                                            <div class="media">
                                                                <div class="d-flex mr-3">
                                                                    <svg width="50px" height="50px" viewBox="0 0 60 60" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                                        <g id="People" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                            <g id="Icon-11" fill="#000000">
                                                                                <path d="M28,27 L28,30 L32,30 L32,27 L32,22 L28,22 L28,27 Z M8,27 C8,26.448 8.448,26 9,26 L26,26 L26,22 C26,20.897 26.897,20 28,20 L32,20 C33.103,20 34,20.897 34,22 L34,26 L51,26 C51.552,26 52,26.448 52,27 C52,27.552 51.552,28 51,28 L34,28 L34,30 C34,31.103 33.103,32 32,32 L28,32 C26.897,32 26,31.103 26,30 L26,28 L9,28 C8.448,28 8,27.552 8,27 L8,27 Z M30.03,29 C30.583,29 31.03,28.552 31.03,28 C31.03,27.448 30.583,27 30.03,27 L30.02,27 C29.468,27 29.025,27.448 29.025,28 C29.025,28.552 29.478,29 30.03,29 L30.03,29 Z M7,10 C6.449,10 6,10.449 6,11 L6,40 L54,40 L54,11 C54,10.449 53.551,10 53,10 L7,10 Z M26,8 L34,8 L34,6 L26,6 L26,8 Z M22,8 L24,8 L24,5 C24,4.448 24.448,4 25,4 L35,4 C35.552,4 36,4.448 36,5 L36,8 L38,8 L38,3 C38,2.449 37.551,2 37,2 L23,2 C22.449,2 22,2.449 22,3 L22,8 Z M7,8 L20,8 L20,3 C20,1.346 21.346,0 23,0 L37,0 C38.654,0 40,1.346 40,3 L40,8 L53,8 C54.654,8 56,9.346 56,11 L56,41 C56,41.552 55.552,42 55,42 L5,42 C4.448,42 4,41.552 4,41 L4,11 C4,9.346 5.346,8 7,8 L7,8 Z M39,54 L36,54 L36,53 C36,52.448 35.552,52 35,52 C34.448,52 34,52.448 34,53 L34,55 C34,55.552 34.448,56 35,56 L39,56 C40.123,56 41.295,56.914 41.775,58 L18.225,58 C18.705,56.914 19.877,56 21,56 L31,56 C31.552,56 32,55.552 32,55 C32,54.448 31.552,54 31,54 L26,54 L26,53 C26,52.448 25.552,52 25,52 C24.448,52 24,52.448 24,53 L24,54 L21,54 C18.43,54 16,56.43 16,59 C16,59.552 16.448,60 17,60 L43,60 C43.552,60 44,59.552 44,59 C44,56.43 41.57,54 39,54 L39,54 Z M30.02,44 C29.468,44 29.025,44.448 29.025,45 C29.025,45.552 29.478,46 30.03,46 C30.583,46 31.03,45.552 31.03,45 C31.03,44.448 30.583,44 30.03,44 L30.02,44 Z M60,9 L60,45 C60,47.804 57.804,50 55,50 L5,50 C1.898,50 0,45.468 0,43 L0,9 C0.191,6.167 2.386,4 5,4 L17,4 C17.552,4 18,4.448 18,5 C18,5.552 17.552,6 17,6 L5,6 C3.252,6 2.101,7.56 1.998,9.068 L2,43 C2,45.02 3.58,48 5,48 L55,48 C56.71,48 58,46.71 58,45 L58,9 C58,7.346 56.654,6 55,6 L43,6 C42.448,6 42,5.552 42,5 C42,4.448 42.448,4 43,4 L55,4 C57.757,4 60,6.243 60,9 L60,9 Z" id="job-desktop">

                                                                                </path>
                                                                            </g>
                                                                        </g>
                                                                    </svg>
                                                                    <div class="media-body pl-2 pr-2">
                                                                        <h6 class="tx-inverse">Related Listing</h6>
                                                                        <p class="mg-b-0">{{$post->listing_id ? '' : 'There is no related job'}}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>

                                                        <li class="list-group-item list-group-item-action">
                                                            <div class="media">
                                                                <div class="d-flex mr-3">
                                                                    <svg fill="#000000" height="50px" width="50px" version="1.1" id="Filled_Icons" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                                         y="0px" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve">
<g id="Status-Approved-Filled">
    <path d="M12,0C5.4,0,0,5.4,0,12s5.4,12,12,12s12-5.4,12-12S18.6,0,12,0z M9.5,18.3l-5.6-5.7l1.8-1.8l3.9,3.9l8.4-8.4l1.8,1.8
		L9.5,18.3z"/>
</g>
</svg>                                                                    <div class="media-body pl-2 pr-2">
                                                                        <h6 class="tx-inverse">status</h6>
                                                                        <p class="mg-b-0">{{$post->status ? "active" : 'deActivated'}}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item list-group-item-action">
                                                            <div class="media">
                                                                <div class="d-flex mr-3">
                                                                    <svg width="50px" height="50px" viewBox="-0.5 0 15 15">
                                                                        <path fill="#000000" fill-rule="evenodd" d="M107,154.006845 C107,153.45078 107.449949,153 108.006845,153 L119.993155,153 C120.54922,153 121,153.449949 121,154.006845 L121,165.993155 C121,166.54922 120.550051,167 119.993155,167 L108.006845,167 C107.45078,167 107,166.550051 107,165.993155 L107,154.006845 Z M108,157 L120,157 L120,166 L108,166 L108,157 Z M116.5,163.5 L116.5,159.5 L115.757485,159.5 L114.5,160.765367 L114.98503,161.275112 L115.649701,160.597451 L115.649701,163.5 L116.5,163.5 Z M112.5,163.5 C113.412548,163.5 114,163.029753 114,162.362119 C114,161.781567 113.498099,161.473875 113.110266,161.433237 C113.532319,161.357765 113.942966,161.038462 113.942966,160.550798 C113.942966,159.906386 113.395437,159.5 112.505703,159.5 C111.838403,159.5 111.359316,159.761248 111.051331,160.115385 L111.456274,160.632075 C111.724335,160.370827 112.055133,160.231495 112.425856,160.231495 C112.819392,160.231495 113.13308,160.382438 113.13308,160.690131 C113.13308,160.974601 112.847909,161.102322 112.425856,161.102322 C112.28327,161.102322 112.020913,161.102322 111.952471,161.096517 L111.952471,161.839623 C112.009506,161.833817 112.26616,161.828012 112.425856,161.828012 C112.956274,161.828012 113.190114,161.967344 113.190114,162.275036 C113.190114,162.565312 112.93346,162.768505 112.471483,162.768505 C112.10076,162.768505 111.684411,162.605951 111.427757,162.327286 L111,162.87881 C111.279468,163.227141 111.804183,163.5 112.5,163.5 Z M110,152.5 C110,152.223858 110.214035,152 110.504684,152 L111.495316,152 C111.774045,152 112,152.231934 112,152.5 L112,153 L110,153 L110,152.5 Z M116,152.5 C116,152.223858 116.214035,152 116.504684,152 L117.495316,152 C117.774045,152 118,152.231934 118,152.5 L118,153 L116,153 L116,152.5 Z" transform="translate(-107 -152)"/>
                                                                    </svg>
                                                                    <div class="media-body pl-2 pr-2">
                                                                    <h6 class="tx-inverse">publication date</h6>
                                                                    <p class="mg-b-0">{{$post->created_at}}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item list-group-item-action">
                                                            <div class="media">
                                                                <div class="d-flex mr-3">
                                                                    <svg width="50px" height="50px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M18.4721 16.7023C17.3398 18.2608 15.6831 19.3584 13.8064 19.7934C11.9297 20.2284 9.95909 19.9716 8.25656 19.0701C6.55404 18.1687 5.23397 16.6832 4.53889 14.8865C3.84381 13.0898 3.82039 11.1027 4.47295 9.29011C5.12551 7.47756 6.41021 5.96135 8.09103 5.02005C9.77184 4.07875 11.7359 3.77558 13.6223 4.16623C15.5087 4.55689 17.1908 5.61514 18.3596 7.14656C19.5283 8.67797 20.1052 10.5797 19.9842 12.5023M19.9842 12.5023L21.4842 11.0023M19.9842 12.5023L18.4842 11.0023" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                                        <path d="M12 8V12L15 15" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                                    </svg>
                                                                    <div class="media-body pl-2 pr-2">
                                                                        <h6 class="tx-inverse">latest Update</h6>
                                                                        <p class="mg-b-0">{{$post->updated_at}}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>

                                                    </ul>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                        <div class="section social">
                            <div class="info">
                                <h5 class="">Seo (Search Engine Optimization)</h5>
                                <div class="row">
                                    <div class="col-md-11 mx-auto">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="seo_title">Seo Title: {{$post->seo_title}} </label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="seo_description">Seo Description: {{$post->seo_description}} </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="account-settings-footer">

            <div class="as-footer-container">
                <a href="{{route('admin.post.edit' , $post->id)}}" class="btn btn-warning">edit</a>
            </div>

        </div>
    </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!--  BEGIN CUSTOM SCRIPTS FILE  -->

    <script src="{{asset('admin/plugins/dropify/dropify.min.js')}}"></script>
    <script src="{{asset('admin/plugins/blockui/jquery.blockUI.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/users/account-settings.js')}}"></script>
    <!--  END CUSTOM SCRIPTS FILE  -->

    <!-- SELECT2 -->
    <script src="{{asset('admin/plugins/select2/select2.min.js')}}"></script>
    <script src="{{asset('admin/plugins/select2/custom-select2.js')}}"></script>
    <script>
        $(".tagging").select2({
            tags: true
        });
    </script>
@endpush
