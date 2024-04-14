@extends('frontend.layouts.master')
@section('title','listing view')

@section('content')
    <!--==========================
        BREADCRUMB PART START
    ===========================-->
    <div id="breadcrumb_part" style="
    background: url('{{$listing->thumbnail_image}}');
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    ">
        <div class="bread_overlay">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 text-center text-white">
                        <h4>{{$listing->title}}</h4>
                        <nav style="--bs-breadcrumb-divider: '';" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url("/")}}"> Home </a></li>
                                <li class="breadcrumb-item active" aria-current="page"> listing details </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--==========================
        BREADCRUMB PART END
    ===========================-->


    <!--==========================
        LISTING DETAILS START
    ===========================-->
    <section id="listing_details">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="listing_details_text">
                        <div class="listing_det_header" >
                            <div class="d-flex justify-content-between">
                                <div class="listing_det_header_img col-4">
                                    <img src="{{asset($listing->image)}}" alt="logo" class="img-fluid w-100">
                                </div>
                                <div class="col-8 d-flex flex-column" style="direction: rtl">
                                    <p><b>{{number_format($listing->averageStar,1)}}</b> <span>({{$reviews->total()}} review)</span></p>
                                    @foreach($listingPoints as $pointList)
                                        {{$pointList->reviewCategory->name}}
                                        <p class="rating">
                                        @for($i = 1 ; $i < 11 ;  $i++)
                                            <i @class(['fas' => $pointList->averageStar > $i , 'far' => $pointList->averageStar <= $i ,'fa-star']) style="color: gold" ></i>
                                        @endfor
                                        </p>
                                    @endforeach
                                </div>

                            </div>
                            <div class="listing_det_header_text">
                                <h6>{{$listing->title}}</h6>
                                <p class="host_name">Hosted by <a href="agent_public_profile.html">{{$listing->user->name}}</a></p>
                                <ul>
                                    @if($listing->is_verified) <li><a href="#"><i class="far fa-check"></i> Verified</a></li> @endif
                                    @if($listing->is_featured)<li><a href="#"><i class="far fa-star"></i> Featured</a></li>@endif
                                    <li><a href="#"><i class="fal fa-heart"></i> Add to Favorite</a></li>
                                    <li><a href="#"><i class="fal fa-eye"></i> {{$listing->views}}</a></li>
                                    <li><a href="#">{{$openState}}</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="listing_det_text">
                            <p>
                                {!! $listing->description !!}}
                            </p>
                        </div>
                        <div class="listing_det_Photo">
                            <div class="row">
                                @foreach($listing->ImagesGallery as $image)
                                    <div class="col-xl-3 col-sm-6">
                                        <a class="venobox" data-gall="gallery01" href="{{asset($image->image)}}">
                                            <img src="{{asset($image->image)}}" alt="gallery1" class="img-fluid w-100">
                                            <div class="photo_overlay">
                                                <i class="fal fa-plus"></i>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="listing_det_feature">
                            <div class="row">
                                @foreach($listing->amenities as $amenity)
                                    <div class="col-xl-4 col-sm-6">
                                        <div class="listing_det_feature_single">
                                            <i class="{{$amenity->icon}}"></i>
                                            <span>{{$amenity->name}}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        @if($listing->map_embed_code)
                            <div class="listing_det_location">
                                {!! $listing->map_embed_code !!}
                            </div>
                        @endif
                        <div class="wsus__listing_review">
                            <h4>reviews {{$reviews->total()    }}</h4>
                            @foreach($reviews as $review)
                                <div class="wsus__single_comment">
                                    <div class="wsus__single_comment_img">
                                        <img src="{{asset($review->user->avatar)}}" alt="{{$review->user->name}}" class="img-fluid w-100">
                                    </div>
                                    <div class="wsus__single_comment_text">
                                        <h5>{{$review->user->name}}</h5>
                                        <table>
                                                @foreach($review->points as $point)
                                                    <tr>
                                                        <td>{{$point->reviewCategory->name}}:</td>
                                                        <td>
                                                            @for($i= 1 ; $i <=10 ; $i++)
                                                                <i @class(['fas fa-star' => $point->point + 1 > $i ,'far fa-star' => $point->$point < $i]) style="color: gold"></i>
                                                            @endfor
                                                    </tr>
                                                @endforeach
                                        </table>
                                        <span>{{date('Y-m-d',strtotime($review->created_at))}}</span>
                                        <p>
                                            {{$review->text}}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
<!-- review Paginate -->
                            <div id="pagination">
                                @if($reviews->hasPages())
                                    {{$reviews->links()}}
                                @endif
                            </div>
                            @auth()
                                <form class="input_comment" method="post" action="{{route('review.store')}}">
                                    @csrf
                                    <h5>add a review</h5>
                                        <div class="row">
                                            @foreach($listing->category->review_cats as $reviewCat)
                                            <div class="col-xl-2">
                                                <div class="box align-middle">
                                                    {{$reviewCat->name}}
                                                </div>
                                            </div>
                                            <div class="col-xl-10">
                                                <div class="wsus__select_rating">
                                                    <i class="fas fa-star"></i>
                                                    <select class="select_2" name="points[{{$reviewCat->id}}]">
                                                        <option value="">select rating</option>
                                                        @for($i = 1 ; $i <= 10 ; ++$i)
                                                            <option value="{{$i}}" @selected($i == 8)> {{$i}} </option>
                                                        @endfor
                                                    </select>
                                                </div>
                                            </div>
                                            @endforeach
                                            <div class="col-xl-12">
                                                <div class="blog_single_input">
                                                    <textarea name="text" cols="3" rows="5" placeholder="Comment"></textarea>
                                                    <input name="listing_id" type="hidden" value="{{$listing->id}}">
                                                    <button type="submit" class="read_btn">submit review</button>
                                                </div>
                                            </div>
                                        </div>
                                </form>
                            @endauth
                            @guest()
                                <div class="alert alert-warning">
                                    Please <a href="{{ route('login') }}"> login</a> For Submit a review
                                </div>
                            @endguest

                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="listing_details_sidebar">
                        <div class="row">
                            <div class="col-12">
                                <div class="listing_det_side_address">
                                    <a href="callto:{{$listing->phone}}"><i class="fal fa-phone-alt"></i>
                                        {{$listing->phone}}</a>
                                    <a href="mailto:{{$listing->email}}"><i class="fal fa-envelope"></i>
                                        {{$listing->email}}</a>
                                    <p><i class="fal fa-map-marker-alt"></i> {{$listing->location->name}}</p>
                                    @if($listing->website)
                                    <p><i class="fal fa-globe"></i> {{$listing->website}}</p>
                                    @endif
                                    <ul>
                                        @if($listing->facebook_link)<li><a href="https://facebook.com/{{$listing->facebook_link}}"><i class="fab fa-facebook-f"></i></a></li>@endif
                                        @if($listing->x_link)<li><a href="https://twitter.com/{{$listing->x_link}}"><i class="fab fa-twitter"></i></a></li>@endif
                                        @if($listing->instagram_link)<li><a href="https://instagram.com/{{$listing->instagram_link}}"><i class="fab fa-instagram"></i></a></li>@endif
                                        @if($listing->linkedin_link)<li><a href="https://linkedin.com/{{$listing->linkedin_link}}"><i class="fab fa-linkedin-in"></i></a></li>@endif
                                        @if($listing->whatsapp_link)    <li><a href="https://whatsapp.com/{{$listing->whatsapp_link}}"><i class="fab fa-whatsapp"></i></a></li>@endif
                                    </ul>
                                </div>
                            </div>
                            @if($listing->schedules->count() > 0)
                                <div class="col-12">
                                    <div class="listing_det_side_open_hour">
                                        <h5>Opening Hours</h5>
                                        @foreach($listing->schedules as $row)
                                            <p>{{$row->day}} <span>{!! $row->status ? '<span class="text-danger">Closed</span>' : str($row->start_time)->limit(5,"")  ." - ".  str($row->end_time)->limit(5,'') !!}</span></p>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            <div class="col-12">
                                <div class="listing_det_side_contact">
                                    <h5>quick contact</h5>
                                        <form type="text" placeholder="Name*">
                                            <input type="email" placeholder="Email*">
                                            <input type="text" placeholder="Phone*">
                                            <input type="text" placeholder="Subject*">
                                            <textarea cols="3" rows="5" placeholder="Message*"></textarea>
                                            <button type="submit" class="read_btn">send</button>
                                        </form>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="listing_det_side_contact">
                                    <h5>Violation report</h5>
                                    <button type="submit" class="read_btn" data-bs-toggle="modal" data-bs-target="#reportModal">Report</button>
                                </div>
                            </div>

                            @if(count($similarListing) > 0 )
                                <div class="col-12">
                                    <div class="listing_det_side_list">
                                        <h5>Similar Listing</h5>
                                        @foreach($similarListing as $listing)
                                            <a href="{{route('listing.show',$listing->slug)}}" class="sidebar_blog_single">
                                                <div class="sidebar_blog_img">
                                                    <img src="{{asset($listing->image)}}" alt="{{$listing->title}}" class="imgofluid w-100">
                                                </div>
                                                <div class="sidebar_blog_text">
                                                    <h5>{{$listing->title}}</h5>
                                                    <p> <span>{{date('Y/m/d',strtotime($listing->created_at))}}</span> 2 Comment </p>
                                                </div>
                                            </a>
                                        @endforeach

                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--==========================
        LISTING DETAILS END
    ===========================-->

    <!-- Start Modal -->
    <section id="wsus__map_popup">
        <div class="modal fade" id="reportModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <button type="button" class="btn-close popup_close" data-bs-dismiss="modal" aria-label="Close"><i
                            class="far fa-times"></i></button>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 col-xl-12 col-md-12">
                                <div class="">
                                    <h3 class="mb-2">Violation Report This Listing</h3>
                                    <form action="{{route('report')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="listing_id" value="{{$listing->id}}">
                                        <input class="form-control mb-2 " name="name" type="text" placeholder="Name*" value="{{auth()->user()?->name}}">
                                        <input class="form-control mb-2" name="email" type="email" placeholder="Email*" value="{{auth()->user()?->email}}">
                                        <textarea class="form-control mb-2" name="message" cols="3" rows="5" placeholder="Message*"></textarea>
                                        <button type="submit" class="btn btn-sm btn-warning mt-2">send Report</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End Modal -->
@endsection

