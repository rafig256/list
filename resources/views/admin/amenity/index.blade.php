@extends('admin.layouts.master')

@section('title','amenity')

@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing bg-white">
            <div class="account-settings-container layout-top-spacing">
                <div class="account-content">
                    <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                        <div class="row pt-5">
                            <a href="{{route('admin.amenity.create')}}" class="btn btn-sm btn-success">create</a>
                        </div>
                        <div class="row">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

