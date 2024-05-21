@extends('frontend.dashboard.layouts.master')
@section('title', 'Visitors Review')
@section('content')
    <div class="dashboard_content">
        <div class="my_listing p_xm_0">
            <div class="row">
                <div class="col-xxl-12 col-xl-12">
                    <div class="visitor_rev_area">
                        <h4>Visitor's Reviews</h4>
                        @foreach($listingReviews as $listing)
                            <div>
                                <div class="rafig-box" id="listing-{{$listing->id}}" data-listing="{{$listing->id}}">
                                    <div class="tf__single_massage d-flex">
                                        <div class="tf__single_massage_img">
                                            <img src="{{asset($listing->image)}}" style="height: 100% !important" alt="{{$listing->title}}" class="img-fluid w-100">
                                        </div>
                                        <div class="tf__single_massage_text">
                                            <h4>{{$listing->title}}</h4>
                                            <p>Location: {{$listing->location->name}}</p>
                                            <span class="tf__massage_time">Directory: {{$listing->category->name}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-none" id="review-{{$listing->id}}">
                                    @foreach($listing->reviews as $review)
                                        <div class="visitor_rev_single mt-2">
                                            <div class="visitor_rev_img">
                                                <img src="{{asset($review->user->avatar)}}" alt="{{$review->user->name}}" class="img-fluid w-100">
                                            </div>
                                            <div class="visitor_rev_text">
                                                <div class="d-flex flex-row justify-content-between">
                                                    <div><a class="title" href="#"> {{$review->user->name}}</span></a>  <span>{{date('d M Y', strtotime($review->created_at))}}</div>
                                                    <div><span @style(['padding: 0px 5px; border-radius: 5px; color:white;','background-color: green' => $review->status == 1 , 'background-color: red' => $review->status == 0 ])>{{$review->status ? 'verified' : 'pending'}}</span> </div>
                                                    <div>Rate: {{$review->points->first()->rate}}</div>
                                                </div>
                                                <div>
                                                    @foreach($review->points as $row)
                                                        <div>
                                                            {{$row->reviewCategory->name}} :
                                                            @for($i = 1 ; $i<11 ; $i++)
                                                                <i class="fas fa-star" @style(['color:gold' => $i <= $row->point])></i>
                                                            @endfor
                                                        </div>
                                                    @endforeach
                                                    <span class="small_text">{{$review->text}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function (){
            $('.rafig-box').click(function (){
                let listingId = $(this).data('listing');
                $('#review-'+listingId).toggleClass('d-none').hide().fadeIn(1500);
            });
        });
    </script>
@endpush
