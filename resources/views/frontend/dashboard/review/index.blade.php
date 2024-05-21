@extends('frontend.dashboard.layouts.master')
@section('title', 'My Review')
@section('content')
    <div class="dashboard_content">
        <div class="my_listing p_xm_0">
            <div class="row">
                <div class="col-xxl-12 col-xl-12">
                    <div class="visitor_rev_area">
                        <h4>my Reviews</h4>
                        @foreach($reviews as $review)
                            <div class="visitor_rev_single mt-2">
                                <div class="visitor_rev_img">
                                    <img src="{{asset($review->listing->image)}}" alt="{{$review->listing->slug}}" class="img-fluid w-100">
                                </div>
                                <div class="visitor_rev_text">
                                    <div class="d-flex flex-row justify-content-between">
                                        <div><a class="title" href="#"> {{$review->listing->title}}</span></a>  <span>{{date('d M Y', strtotime($review->created_at))}}</div>
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
                                        <ul>
                                            <li><a href="#" data-review="{{$review->id}}" class="edit"><i class="fal fa-edit"></i> edit</a></li>
                                            <li>
                                                <form action="{{route('user.review.destroy' , $review->id)}}" class="pt-0" method="POST" onclick="return confirm('Are you sure?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" style="background-color: red; padding: 5px 20px; font-size: 12px; border-radius: 3px"><i class="fal fa-trash-alt"></i> delete</button>
                                                </form>
                                            </li>

                                        </ul>
                                    </div>

                                </div>
                                <div id="form-review-{{$review->id}}" class="d-none">
                                    <form action="{{route('user.review.update',$review->id)}}" method="POST" name="edit-review-{{$review->id}}">
                                        @csrf
                                        @method('PUT')
                                        <div class="input_area">
                                            @foreach($review->points as $item)
                                                <div class="wsus__search_area">
                                                    <label for="point">{{$item->reviewCategory->name}} :</label>
                                                    <select class="" id="point" name="points[{{$item->reviewCategory->id}}]">
                                                        @for($j = 1 ; $j<= 10 ; $j++)
                                                            <option value="{{$j}}" @selected($item->point == $j)>{{$j}}</option>
                                                        @endfor
                                                    </select>
                                                </div>
                                            @endforeach
                                            <div class="wsus__rev_textarea">
                                                <textarea aria-label="text" name="text" cols="3" rows="3" placeholder="Lorem ipsum dolor sit amet.">{{$review->text}}</textarea>
                                            </div>
                                            <button type="submit" class="read_btn">Update Review</button>
                                        </div>
                                    </form>
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
        $(document).ready(function(){
            $('a.edit').click(function (e){
                e.preventDefault();
                var reviewId = $(this).data('review');
                $('#form-review-' + reviewId).toggleClass('d-none').hide().fadeIn(1500);
            });
        });
    </script>
@endpush
