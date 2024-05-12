@extends('frontend.layouts.master')

@section('title', 'Blog')

@section('content')
    <!--==========================
        BREADCRUMB PART START
    ===========================-->
    <div id="breadcrumb_part">
        <div class="bread_overlay">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 text-center text-white">
                        <h4>blog</h4>
                        <nav style="--bs-breadcrumb-divider: '';" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('/')}}"> Home </a></li>
                                <li class="breadcrumb-item active" aria-current="page"> blog </li>
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
        BLOG PART START
    ===========================-->
    <section id="blog_part">
        <div class="blog_part_overlay">
            <div class="container">
                <div class="row">
                    @foreach($posts as $post)
                        <div class="col-xl-4 col-sm-6 col-lg-4">
                            <div class="single_blog">
                                <div class="img">
                                    <img src="{{$post->image}}" alt="bloh images" class="img-fluid w-100">
                                </div>
                                <div class="text">
                                    <span><i class="fal fa-calendar-alt"></i> {{date('d M Y' , strtotime($post->created_at))}}</span>
                                    <span><i class="fas fa-user"></i> by {{$post->user->name}}</span>
                                    <a href="{{route('blog.show',$post->id)}}" class="title">{{$post->title}}</a>
                                    <p>{!! $post->description !!}</p>
                                    <a class="read_btn" href="{{route('blog.show.slug',[$post->id, $post->slug])}}">learn more <i class="far fa-chevron-double-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>


                <div class="col-12">
                    <div id="pagination">
                        @if($posts->hasPages())
                            {{$posts->withQueryString()->links()}}
                        @endif
                    </div>
                </div>


            </div>
        </div>
    </section>
    <!--==========================
        BLOG PART END
    ===========================-->
@endsection
