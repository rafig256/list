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
                    <div class="col-xl-4 col-sm-6 col-lg-4">
                        <div class="single_blog">
                            <div class="img">
                                <img src="images/blog_1.jpg" alt="bloh images" class="img-fluid w-100">
                            </div>
                            <div class="text">
                                <span><i class="fal fa-calendar-alt"></i> 05 Julay 2021</span>
                                <span><i class="fas fa-user"></i> by admin</span>
                                <a href="#" class="title">How to create a Portfolio</a>
                                <p>Lorem Ipsum is simply dummy of the printing typesetting industry. Lorem Ipsum has
                                    been
                                    simply dummy of the printing </p>
                                <a class="read_btn" href="blog_details.html">learn more <i
                                        class="far fa-chevron-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6 col-lg-4">
                        <div class="single_blog">
                            <div class="img">
                                <img src="images/blog_2.jpg" alt="bloh images" class="img-fluid w-100">
                            </div>
                            <div class="text">

                                <span><i class="fal fa-calendar-alt"></i> 05 Julay 2021</span>
                                <span><i class="fas fa-user"></i> by admin</span>
                                <a href="#" class="title">Maecenas tincidunt vehicula</a>
                                <p>Lorem Ipsum is simply dummy of the printing typesetting industry. Lorem Ipsum has
                                    been
                                    simply dummy of the printing </p>
                                <a class="read_btn" href="blog_details.html">learn more <i
                                        class="far fa-chevron-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6 col-lg-4">
                        <div class="single_blog">
                            <div class="img">
                                <img src="images/blog_3.jpg" alt="bloh images" class="img-fluid w-100">
                            </div>
                            <div class="text">
                                <span><i class="fal fa-calendar-alt"></i> 05 Julay 2021</span>
                                <span><i class="fas fa-user"></i> by admin</span>
                                <a href="#" class="title">How to create a Resume</a>
                                <p>Lorem Ipsum is simply dummy of the printing typesetting industry. Lorem Ipsum has
                                    been
                                    simply dummy of the printing </p>
                                <a class="read_btn" href="blog_details.html">learn more <i
                                        class="far fa-chevron-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6 col-lg-4">
                        <div class="single_blog">
                            <div class="img">
                                <img src="images/blog_4.jpg" alt="bloh images" class="img-fluid w-100">
                            </div>
                            <div class="text">
                                <span><i class="fal fa-calendar-alt"></i> 05 Julay 2021</span>
                                <span><i class="fas fa-user"></i> by admin</span>
                                <a href="#" class="title">How to create a Portfolio</a>
                                <p>Lorem Ipsum is simply dummy of the printing typesetting industry. Lorem Ipsum has
                                    been
                                    simply dummy of the printing </p>
                                <a class="read_btn" href="blog_details.html">learn more <i
                                        class="far fa-chevron-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6 col-lg-4">
                        <div class="single_blog">
                            <div class="img">
                                <img src="images/blog_5.jpg" alt="bloh images" class="img-fluid w-100">
                            </div>
                            <div class="text">

                                <span><i class="fal fa-calendar-alt"></i> 05 Julay 2021</span>
                                <span><i class="fas fa-user"></i> by admin</span>
                                <a href="#" class="title">Maecenas tincidunt vehicula</a>
                                <p>Lorem Ipsum is simply dummy of the printing typesetting industry. Lorem Ipsum has
                                    been
                                    simply dummy of the printing </p>
                                <a class="read_btn" href="blog_details.html">learn more <i
                                        class="far fa-chevron-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6 col-lg-4">
                        <div class="single_blog">
                            <div class="img">
                                <img src="images/blog_6.jpg" alt="bloh images" class="img-fluid w-100">
                            </div>
                            <div class="text">
                                <span><i class="fal fa-calendar-alt"></i> 05 Julay 2021</span>
                                <span><i class="fas fa-user"></i> by admin</span>
                                <a href="#" class="title">How to create a Resume</a>
                                <p>Lorem Ipsum is simply dummy of the printing typesetting industry. Lorem Ipsum has
                                    been
                                    simply dummy of the printing </p>
                                <a class="read_btn" href="blog_details.html">learn more <i
                                        class="far fa-chevron-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div id="pagination">
                            <nav aria-label="">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true"><i
                                                class="fas fa-chevron-left"></i></a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">01</a></li>
                                    <li class="page-item" aria-current="page">
                                        <a class="page-link" href="#">02</a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">03</a></li>
                                    <li class="page-item"><a class="page-link" href="#">04</a></li>
                                    <li class="page-item"><a class="page-link" href="#">05</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--==========================
        BLOG PART END
    ===========================-->
@endsection
