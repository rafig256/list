<section id="blog_part">
    <div class="blog_part_overlay">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 m-auto">
                    <div class="wsus__heading_area">
                        <h2>{{$sectionTitle['blogs_title']}}</h2>
                        <p>{{$sectionTitle['blogs_text']}}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($posts as $post)
                    <div class="col-xl-4 col-md-6 col-lg-4">
                        <div class="single_blog">
                            <div class="img">
                                <img src="{{asset($post->image)}}" alt="{{$post->title}}" class="img-fluid w-100">
                            </div>
                            <div class="text">
                                <span><i class="fal fa-calendar-alt"></i> {{date('d M Y', strtotime($post->created_at))}}</span>
                                <span><i class="fas fa-user"></i> by {{$post->user->name}}</span>
                                <a href="{{route('blog.show.slug',[$post->id,$post->slug])}}" class="title">{{$post->title}}</a>
                                <p>{!! str($post->description)->limit(100) !!} </p>
                                <a class="read_btn" href="{{route('blog.show.slug',[$post->id,$post->slug])}}">learn more <i class="far fa-chevron-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
