@extends('frontend.layouts.master')

@section('title', $post->title)

@section('content')
    <!--==========================
        BLOG DETAILS START
    ===========================-->
    <section id="blog_details">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="main_blog">
                        <div class="main_blog_img">
                            <img src="{{$post->image}}" alt="{{$post->title}}" class="img-fluid w-100">
                        </div>
                        <ul class="main_blog_header">
                            <li><a href="#"><i class="fal fa-calendar-alt"></i> {{date('d M Y',strtotime($post->created_at))}}</a></li>
                            <li><a href="#"><i class="fal fa-comment-dots"></i> 0 Comment</a></li>
                            <li><a href="#"><i class="fal fa-eye"></i> {{$post->views}} Views</a></li>
                            <li><i class="fal fa-tags"></i>
                                @foreach($post->blogCategories as $category)
                                    <span class="btn btn-sm"><a href="{{route('blog.index' , ['category' => $category->slug])}}" class="text-white">{{$category->name}}</a></span>
                                @endforeach
                            </li>
                        </ul>
                        <h4>{{$post->title}}</h4>
                        <p>{!! $post->description !!}</p>
                        <!-- Comment -->
                        <div class="blog_comment_area">
                            <h5 class="wsus__single_comment_heading">Total Comment {{$post->comments->count()}}</h5>
                            @foreach($post->comments as $comment)
                                @if($comment->status)
                                <div class="wsus__single_comment">
                                    <div class="wsus__single_comment_img">
                                        <img src="{{$post->user->avatar}}" alt="{{$post->user->name}}" class="img-fluid w-100">
                                    </div>
                                    <div class="wsus__single_comment_text">
                                        <h5>{{$post->user->name}}</h5>
                                        <span>{{date('d M Y',strtotime($comment->created_at))}}</span>
                                        <p>{{$comment->comment}}</p>
                                    </div>
                                </div>
                                @endif
                            @endforeach

                            @auth()
                                <form class="input_comment" method="post" action="{{route('comment.add')}}">
                                    @csrf
                                    <h5>post a Comment </h5>
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="blog_single_input">
                                                <input type="hidden" name="post_id" value="{{$post->id}}">
                                                <textarea name="comment" cols="3" rows="5" placeholder="Message"></textarea>
                                                <button type="submit" class="read_btn">send</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            @endauth
                            @guest
                                <div class="alert alert-warning ">Please <a href="{{route('login')}}">log in</a> for add a comment! </div>
                            @endguest

                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="blog_sidebar">
                        <div class="blog_search">
                            <h4>search</h4>
                            <form method="GET" action="{{route('blog.index')}}">
                                <input type="text" name="search" placeholder="Search">
                                <button type="submit"><i class="far fa-search"></i></button>
                            </form>
                        </div>
                        <div class="blog_category">
                            <h4>Category</h4>
                            <ul>
                                @foreach($blogCategories as $category)
                                <li><a href="{{route('blog.index',['category' => $category->slug])}}">{{$category->name}} <span>{{$category->posts_count}}</span></a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="sidebar_blog">
                            <h4>Popular Post</h4>
                            <a href="#" class="sidebar_blog_single">
                                <div class="sidebar_blog_img">
                                    <img src="images/location_1.jpg" alt="blog" class="imgofluid w-100">
                                </div>
                                <div class="sidebar_blog_text">
                                    <h5>One Thing Separates Creators From Consumers</h5>
                                    <p> <span>Jul 29 2021 </span> 2 Comment </p>
                                </div>
                            </a>
                            <a href="#" class="sidebar_blog_single">
                                <div class="sidebar_blog_img">
                                    <img src="images/location_2.jpg" alt="blog" class="imgofluid w-100">
                                </div>
                                <div class="sidebar_blog_text">
                                    <h5>Should Startups Care About Profitability?</h5>
                                    <p> <span>Jul 29 2021 </span> 2 Comment </p>
                                </div>
                            </a>
                            <a href="#" class="sidebar_blog_single">
                                <div class="sidebar_blog_img">
                                    <img src="images/location_3.jpg" alt="blog" class="imgofluid w-100">
                                </div>
                                <div class="sidebar_blog_text">
                                    <h5>The Best Delicious Coffee Shop In Bangkok China.</h5>
                                    <p> <span>Jul 29 2021 </span> 2 Comment </p>
                                </div>
                            </a>
                            <a href="#" class="sidebar_blog_single">
                                <div class="sidebar_blog_img">
                                    <img src="images/location_4.jpg" alt="blog" class="imgofluid w-100">
                                </div>
                                <div class="sidebar_blog_text">
                                    <h5>List Of Benifits And Impressive Listeo Services</h5>
                                    <p> <span>Jul 29 2021 </span> 2 Comment </p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--==========================
        BLOG DETAILS END
    ===========================-->
@endsection
