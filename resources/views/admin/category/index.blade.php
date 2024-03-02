@extends('admin.layouts.master')

@section('title','category')
@push('css')
    <!--    Jquery DataTable -->
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.1/css/dataTables.dataTables.min.css">
@endpush
@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing bg-white">
            <div class="account-settings-container layout-top-spacing">
                <div class="account-content">
                    <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                        <div class="row pt-5">
                            <a href="{{route('admin.category.create')}}" class="btn btn-sm btn-success">create</a>
                        </div>
                        <div class="row">
                            {{ $dataTable->table() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <!-- Jquery Datatable -->
    <script src="//cdn.datatables.net/2.0.1/js/dataTables.min.js"></script>

    {{ $dataTable->scripts() }}
@endpush
