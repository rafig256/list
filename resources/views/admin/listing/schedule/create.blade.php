@extends('admin.layouts.master')

@section('title', ' Create Schedule Gallery ')

@section('content')
    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="row layout-top-spacing">
            <div id="fuMultipleFile" class="col-lg-12 layout-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>Record Schedule</h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        <form method="POST" action="{{route('admin.image-gallery.store')}}" >
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="listing_id" value="{{$listing->id}}">

                            <div class="rw">
                                <button type="submit" class="btn btn-primary mt-4 mb-4">create Schedule</button>
                            </div>
                        </form>


                        <div>
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                <th>#</th>
                                <th>image</th>
                                <th>action</th>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  END CONTENT AREA  -->
@endsection
@push('scripts')

@endpush
