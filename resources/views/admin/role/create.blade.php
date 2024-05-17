@extends('admin.layouts.master')

@section('title', ' Create Role')
@push('css')
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{asset('admin/assets/css/users/account-setting.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/forms/switches.css')}}">
    <!--  END CUSTOM STYLE FILE  -->
@endpush
@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="account-settings-container layout-top-spacing">
                <div class="account-content">
                    <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                        <div class="">
                            <form id="add-role" method="POST" action="{{route('admin.role.store')}}">
                                @csrf
                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing section general-info">
                                    <div class="info">
                                        <h6>Create roles and assign permissions to roles</h6>
                                        <div class="row">
                                            <div class="col-lg-11 mx-auto">
                                                <div class="row">
                                                    <div class="col-xl-12 col-lg-12 col-md-12 mt-md-0 mt-4">
                                                        <div class="row">
                                                            <div class="col-md-11 mx-auto">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="role">Role <span class="text-danger">*</span></label>
                                                                            <input type="text" name="role" class="form-control mb-4" id="role" required>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="col-md-12">
                                                                        @foreach($permissions as $group_name => $subPermissions)
                                                                            <p>{{$group_name}}</p>
                                                                            <div class="form-group" >
                                                                                @foreach($subPermissions as $permission)
                                                                                    <div class="row">
                                                                                        <div class="pr-2">{{$permission['name']}}:</div>
                                                                                        <label class="switch s-icons s-outline s-outline-primary mr-2">
                                                                                            <input type="checkbox" name="permissions[]" value="{{$permission['name']}}">
                                                                                            <span class="slider round"></span>
                                                                                        </label>
                                                                                    </div>
                                                                                @endforeach
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="input-group social-tweet mb-3">
                                                                            <button class="btn btn-success" type="submit">Create Role</button>
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
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
