@extends('frontend.layouts.master')

@section('title','listing')

@section('content')
    <!--==========================
        LISTING PAGE START
    ===========================-->
    <section id="listing_grid" class="grid_view">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <form>
                        <div class="listing_grid_sidbar">
                            <div class="sidebar_line">
                                <input type="text" placeholder="Search">
                                <button type="submit"><i class="far fa-search"></i></button>
                            </div>
                            <div class="sidebar_line_select">
                                <select class="select_2" name="state">
                                    <option value="">categorys</option>
                                    <option value="">category 1</option>
                                    <option value="">category 2</option>
                                    <option value="">category 3</option>
                                    <option value="">category 4</option>
                                    <option value="">category 5</option>
                                </select>
                            </div>
                            <div class="sidebar_line_select">
                                <select class="select_2" name="state">
                                    <option value="">location</option>
                                    <option value="">location 1</option>
                                    <option value="">location 2</option>
                                    <option value="">location 3</option>
                                    <option value="">location 4</option>
                                    <option value="">location 5</option>
                                </select>
                            </div>
                            <div class="wsus__pro_check">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                           id="flexCheckIndeterminate4">
                                    <label class="form-check-label" for="flexCheckIndeterminate4">
                                        Heating
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                           id="flexCheckIndeterminate5">
                                    <label class="form-check-label" for="flexCheckIndeterminate5">
                                        Smoking Allow
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                           id="flexCheckIndeterminate6">
                                    <label class="form-check-label" for="flexCheckIndeterminate6">
                                        Icon
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                           id="flexCheckIndeterminate7">
                                    <label class="form-check-label" for="flexCheckIndeterminate7">
                                        Parking
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                           id="flexCheckIndeterminate">
                                    <label class="form-check-label" for="flexCheckIndeterminate">
                                        Air Condition
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                           id="flexCheckIndeterminate1">
                                    <label class="form-check-label" for="flexCheckIndeterminate1">
                                        Internet
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                           id="flexCheckIndeterminate2">
                                    <label class="form-check-label" for="flexCheckIndeterminate2">
                                        Terrace
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                           id="flexCheckIndeterminate3">
                                    <label class="form-check-label" for="flexCheckIndeterminate3">
                                        Wi-Fi
                                    </label>
                                </div>
                            </div>
                            <button class="read_btn" type="submit">search</button>
                        </div>
                    </form>
                </div>

                <div class="col-lg-9">
                    <div class="row">

                        @foreach($listings as $listing)
                            <div class="col-xl-4 col-sm-6">
                                <div class="wsus__featured_single">
                                    <div class="wsus__featured_single_img">
                                        <img src="{{asset($listing->thumbnail_image)}}" alt="{{$listing->title}}" class="img-fluid w-100">
                                        <a href="#" class="love"><i class="fas fa-heart"></i></a>
                                        <a href="{{route('listing',['category'=>$listing->category->slug])}}" class="small_text">{{$listing->category->name}}</a>
                                    </div>
                                    <a class="map" data-bs-toggle="modal" data-bs-target="#exampleModal2" data-id="{{$listing->id}}" href="#"><i
                                            class="fas fa-info"></i></a>
                                    <div class="wsus__featured_single_text">
                                        <p class="list_rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                            <span>(5 review)</span>
                                        </p>
                                        <a href="{{route('listing.show',$listing->slug)}}">{{$listing->title}}</a>
                                        <p class="address"> {{$listing->location->name}}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <div class="col-12">
                            <div id="pagination">
                                <nav aria-label="">
                                    <ul class="pagination">
                                        <li class="page-item">
                                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true"><i
                                                    class="fas fa-chevron-left"></i></a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">01</a></li>
                                        <li class="page-item" aria-current="page">
                                            <a class="page-link" href="#">02</a>
                                        </li>
                                        <li class="page-item active"><a class="page-link" href="#">03</a></li>
                                        <li class="page-item"><a class="page-link" href="#">04</a></li>
                                        <li class="page-item"><a class="page-link" href="#">05</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Start Modal -->
    <section id="wsus__map_popup">
        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">

            </div>
        </div>
    </section>
    <!-- End Modal -->

    <!--==========================
        LISTING PAGE START
    ===========================-->
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.map').click(function (){
                let id = $(this).data('id');
                $.ajax({
                    method : 'GET',
                    url : '{{route("listing.ajax-modal",":id")}}'.replace(":id",id),
                    data: {},
                    beforeSend: function (){
                            $('.modal-dialog').html(`<div class="spinner-border" role="status">
                                <span class="visually-hidden">Loading...</span>
                        </div>`)
                    },
                    success: function (response) {
                        $('.modal-dialog').html(response);
                    },
                    error: function (xhr,status,error){
                        console.log(error);
                    }
                });
            });
        });
    </script>
@endpush
