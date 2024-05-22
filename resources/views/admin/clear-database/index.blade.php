@extends('admin.layouts.master')

@section('title','Clear Database')
@push('css')
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{asset('admin/assets/css/users/account-setting.css')}}" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->
@endpush
@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="account-settings-container layout-top-spacing">
                <div class="account-content">
                    <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                        <div class="">
                            <form id="clear database" class="" enctype="multipart/form-data" method="POST" action="{{route('admin.about.update')}}">
                                @csrf
                                @method('PUT')
                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing section general-info">
                                    <div class="info">
                                        <h5 class="">Clear Database</h5>
                                        <div class="row">
                                            <div class="box alert-danger m-2 rounded p-2">
                                                <span>With this action, all the information of your site will be deleted from the database. If you are not sure about doing this, consult the support of the site.</span>
                                                <button class="btn btn-success mt-1" onclick="return confirm('Are you sure?')" type="submit">Clear</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!--  BEGIN CUSTOM SCRIPTS FILE  -->

    <!--  END CUSTOM SCRIPTS FILE  -->
@endpush
