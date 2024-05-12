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
                                    <span class="btn btn-sm"><a href="#" class="text-white">{{$category->name}}</a></span>
                                @endforeach
                            </li>
                        </ul>
                        <h4>{{$post->title}}</h4>
                        <p>{!! $post->description !!}</p>
                        <div class="blog_comment_area">
                            <h5 class="wsus__single_comment_heading">Total Comment 05</h5>
                            <div class="wsus__single_comment">
                                <div class="wsus__single_comment_img">
                                    <img src="images/user_large_img.jpg" alt="comment" class="img-fluid w-100">
                                </div>
                                <div class="wsus__single_comment_text">
                                    <h5>sumon jahan</h5>
                                    <span>01-Dec-2021</span>
                                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ad maxime placeat
                                        ducimus magni facilis delectus.</p>
                                </div>
                            </div>
                            <div class="wsus__single_comment">
                                <div class="wsus__single_comment_img">
                                    <img src="images/card_img.jpg" alt="comment" class="img-fluid w-100">
                                </div>
                                <div class="wsus__single_comment_text">
                                    <h5>shimul sign</h5>
                                    <span>21-Nov-2021</span>
                                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ad maxime placeat
                                        ducimus magni facilis delectus.</p>
                                </div>
                            </div>
                            <div class="wsus__single_comment">
                                <div class="wsus__single_comment_img">
                                    <img src="images/user_large_img.jpg" alt="comment" class="img-fluid w-100">
                                </div>
                                <div class="wsus__single_comment_text">
                                    <h5>sumon jahan</h5>
                                    <span>01-Dec-2021</span>
                                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ad maxime placeat
                                        ducimus magni facilis delectus.</p>
                                </div>
                            </div>
                            <div class="wsus__single_comment">
                                <div class="wsus__single_comment_img">
                                    <img src="images/card_img.jpg" alt="comment" class="img-fluid w-100">
                                </div>
                                <div class="wsus__single_comment_text">
                                    <h5>shimul sign</h5>
                                    <span>21-Nov-2021</span>
                                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ad maxime placeat
                                        ducimus magni facilis delectus.</p>
                                </div>
                            </div>
                            <form class="input_comment">
                                <h5>post a Comment </h5>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="blog_single_input">
                                            <input type="text" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="blog_single_input">
                                            <input type="email" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="blog_single_input">
                                            <input type="text" placeholder="Phone">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="blog_single_input">
                                            <input type="text" placeholder="Subject">
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="blog_single_input">
                                            <textarea cols="3" rows="5" placeholder="Message"></textarea>
                                            <button type="submit" class="read_btn">send</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="blog_sidebar">
                        <div class="blog_search">
                            <h4>search</h4>
                            <form>
                                <input type="text" placeholder="Search">
                                <button type="submit"><i class="far fa-search"></i></button>
                            </form>
                        </div>
                        <div class="blog_category">
                            <h4>search</h4>
                            <ul>
                                <li><a href="#">Fitness <span>10</span></a></li>
                                <li><a href="#">Lifestyle <span>7</span></a></li>
                                <li><a href="#">Event <span>21</span></a></li>
                                <li><a href="#">Bar & Cafe <span>14</span></a></li>
                                <li><a href="#">Food & Drink <span>5</span></a></li>
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
