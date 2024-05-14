@extends('admin.layouts.master')
@section('title' , 'Menu Management')
@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing mt-5" style="background-color: white; border-radius: 5px; ">
            <div class="account-settings-container layout-top-spacing">
                <div class="account-content">
                    <div class="scrollspy-example general-info" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                    {!! Menu::render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {!! Menu::scripts() !!}
@endpush
