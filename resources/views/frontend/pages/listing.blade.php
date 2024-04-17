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
                    <form action="{{route('listing')}}" method="get">
                        <div class="listing_grid_sidbar">
                            <div class="sidebar_line">
                                <input type="text" placeholder="Search" name="search">
                                <button type="submit"><i class="far fa-search"></i></button>
                            </div>
                            <div class="sidebar_line_select">
                                <select class="select_2" id="category_parent_slug" name="parent_category">
                                    <option value="">Select</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->slug}}">{{$category->name}}</option>
                                    @endforeach
                                    <option value="">categorys</option>
                                </select>
                            </div>
                            <div class="sidebar_line_select">
                                <select class="select_2" id="category_slug" name="category">
                                    <option value="">First select the collection</option>
                                </select>
                            </div>
                            <div class="sidebar_line_select">
                                <select class="select_2" name="parent_location" id="location_parent_slug">
                                    <option value="">location</option>
                                    @foreach($locations as $location)
                                        <option value="{{$location->slug}}">{{$location->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="sidebar_line_select">
                                <select class="select_2" id="location_slug" name="location">
                                    <option value="">First select the location</option>
                                </select>
                            </div>
                            <div class="wsus__pro_check">
                                @foreach($amenities as $amenity)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{$amenity->slug}}" name="amenity[]">
                                        <label class="form-check-label" >
                                            {{$amenity->name}}
                                        </label>
                                    </div>
                                @endforeach
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
                                    <a class="map" data-bs-toggle="modal" data-bs-target="#exampleModal2" data-id="{{$listing->id}}" href="#">
                                        <i class="fas fa-info"></i>
                                    </a>
                                    <div class="wsus__featured_single_text">
                                        <p class="list_rating">
                                            @for($i = 1 ; $i<=5 ; $i++)
                                                <i @class(['fas' => $listing->averageStar/2 > $i, 'far' => $listing->averageStar/2 <= $i ,'fa-star']) class="fas fa-star"></i>
                                            @endfor
                                            <span>({{$listing->reviews->count()}} review)</span>
                                        </p>
                                        <a href="{{route('listing.show',$listing->slug)}}">{{$listing->title}}</a>
                                        <p class="address"> {{$listing->location->name}}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <div class="col-12">
                            <div id="pagination">
                                @if($listings->hasPages())
                                    {{$listings->links()}}
                                @endif
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

    @push('scripts')
        <script>
            // create token for use the getChildCategories and getChildLocations
            window.token = {
                csrfToken: '{{ csrf_token() }}'
            };
        </script>
        <script src="{{asset('frontend/js/getChildCategories.js')}}"></script>
        <script src="{{asset('frontend/js/getChildLocations.js')}}"></script>
    @endpush
@endpush
