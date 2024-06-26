<section id="wsus__location">
    <div class="wsus__location_overlay">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 m-auto">
                    <div class="wsus__heading_area">
                        <h2>{{$sectionTitle['location_title']}}</h2>
                        <p>{{$sectionTitle['location_text']}}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <div class="wsus__location_filter">
                        <button class="active" data-filter="*">All</button>
                        @foreach($parentLocations as $location)
                            <button data-filter=".{{$location->name}}">{{$location->name}}</button>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row grid">
                @foreach($locations as $location)
                    @foreach($location->listings as $listing)

                        <div class="col-xl-3 col-sm-6 col-lg-4 {{$location->parent->name}}">
                            <div class="wsus__featured_single">
                                <div class="wsus__featured_single_img">
                                    <img src="{{asset($listing->thumbnail_image)}}" alt="{{$listing->title}}" class="img-fluid w-100">
                                    <a href="#" class="love"><i class="fas fa-heart"></i></a>
                                    <div class="wsus__category_text">
                                            <a href="{{route('listing',['category'=>$listing->category->slug])}}" class="small_text">{{$listing->category->name}}</a>
                                            <a href="{{route('listing',['location'=>$location->slug])}}" class="small_text">{{$location->name}}</a>
                                    </div>
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
                                    <p class="address"> {{$location->name}}</p>
                                </div>
                            </div>
                        </div>


                    @endforeach
                @endforeach
            </div>
        </div>
    </div>
</section>
