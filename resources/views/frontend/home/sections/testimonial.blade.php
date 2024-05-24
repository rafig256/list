<section id="wsus__testimonial">
    <div class="wsus__test_overlay">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 m-auto">
                    <div class="wsus__heading_area">
                        <h2>{{$sectionTitle['testimonials_title']}}</h2>
                        <p>{{$sectionTitle['testimonials_text']}}</p>
                    </div>
                </div>
            </div>
            <div class="row testi_slider">
                @foreach($testimonials as $testimonial)
                    <div class="col-xl-6">
                        <div class="wsus__single_clients">
                            <div class="text">
                                <img src="{{asset($testimonial->image)}}" alt="{{$testimonial->name}}" class="img-fluid">
                                <p class="c_name">{{$testimonial->name}}
                                    <span class="c_det">{{$testimonial->role}}</span>
                                </p>
                            </div>
                            <p class="description">{{$testimonial->description}}</p>
                            <p class="rating">
                                @for($i=1; $i<=5; $i++)
                                    <i class="{{$i <= $testimonial->rating/2 ? 'fas' : 'far'}} fa-star"></i>
                                @endfor
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
