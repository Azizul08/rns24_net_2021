@extends('frontend.template.layout')

@section('header-section')
<title>{{ Str::limit($news->title,30) }}</title>
<meta name="og:title" content="{{ $news->title }}" />
<meta name="og:description" content="{{ $news->title }}" />
<meta name="og:type" content="article" />
<meta name="og:url" content="https://rns24.net/newsdetail/" />
<meta name="og:image" content="{{ asset('images/news/'. $news->image) }}" />

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Favicon -->
<link type="image/gif" rel="shortcut icon" href="{{ asset('frontend/img/fav.JPG') }}">
@endsection

@section('body-content')

<!-- banner area start -->
<section class="breadcrumb-area bg-img bg-overlay" style="background-image: url( {{ asset('frontend/img/bg-img/3.jpg') }}); background-position: top;">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="breadcrumb-content">
                    <h2>{{ $news->title }}</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- banner area end -->


<!-- page indicator start -->
<div class="mag-breadcrumb py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                        @foreach( $categories as $category )
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('category.show',$category->slug) }}">{{ $category->name }}</a></li>
                        @endforeach
                        <li class="breadcrumb-item active" aria-current="page">{{ $news->title }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- page indicator end -->

<!-- main section start -->
<section class="post-details-area">
    <div class="container">
        <div class="row justify-content-center">
            
            <!-- Post Details Content Area -->
            <div class="col-12 col-xl-8">
                <div class="post-details-content bg-white mb-30 p-30 box-shadow">
                    <div class="blog-thumb mb-30">
                        @if( $news->image == NULL )
                        <img src="{{ asset('images/news/thumbnail.png') }}" alt="">
                        @else
                        <img src="{{ asset('images/news/'. $news->image) }}" alt="">
                        @endif
                        @if( $news->video == NULL )
                        @else
                        <iframe src="{{ $news->video }}" style="margin-top: 15px;width: 100%;height: 300px;" frameborder="0"></iframe>
                        @endif
                        @if( $news->audio == NULL )
                        @else
                        <audio src="{{ asset('audio/'.$news->audio .'/'. $news->audio) }}" controls></audio>
                        @endif
                    </div>

                    <div class="blog-content">
                        <div class="post-meta">
                            <a>{{$news->created_at->toDayDateTimeString()}}</a>
                            <a>{{ $category->name }}</a>
                        </div>
                        <h4 class="post-title">{{ $news->title }}</h4>

                        <p>
                            {!! $news->description !!}
                        </p>
                        
                        <div class="gallery-slides owl-carousel">
                        
                            @foreach( $galleries as $gallery ) 
                            <!-- Single Trending Post loop start-->
                            <div class="single-trending-post gallery-news">
                                <div class="gallery-image">
                                    <img src="{{ asset('images/gallery/'.$gallery->image) }}" alt="">
                                    <a data-fancybox="gallery" href="{{ asset('images/gallery/'.$gallery->image) }}" data-caption="{{ $gallery->caption }}">
                                        <i class="fas fa-search"></i>
                                    </a>
                                </div>
                                <p>{{ $gallery->caption }}</p>
                            </div>
                            <!--Single Trending Post loop end-->
                            @endforeach
    
                        </div>
                        
                    </div>
                </div>

                <!-- Related Post Area -->
                <div class="related-post-area bg-white mb-30 px-30 pt-30 pb-30 box-shadow">
                    <!-- Section Title -->
                    <div class="section-heading">
                    @php
                    $i = 6;
                    @endphp
                    @foreach( App\Models\Backend\Title\Title::orderBy('id','asc')->get() as $title )
                    @if( $i == 0 )
                    <h5>
                    {{ $title->title }}
                    </h5>
                    @endif
                    @php
                    $i--;
                    @endphp
                    @endforeach
                    </div>

                    <div class="trending-post-slides owl-carousel">
                    
                        <!-- Single Trending Post loop start-->
                        @foreach( $relatednewses as $news )
                        <div class="single-trending-post">
                            @if( $news->image == NULL )
                            <a href="{{ route('newsdetail', $news->id) }}">
                                <img src="{{ asset('images/news/thumbnail.png') }}" alt="">
                            </a>
                            @else
                            <a href="{{ route('newsdetail', $news->id) }}">
                                <img src="{{ asset('images/news/'. $news->image) }}" alt="">
                            </a>
                            @endif
                            <div class="post-content" >
                                @if( $news->video != NULL )
                                <a href="{{ route('newsdetail', $news->id) }}" class="post-cata">Video</a>
                                @endif
                                <a href="{{ route('newsdetail', $news->id) }}" class="post-title">{{ $news->title }}</a>
                            </div>
                        </div>
                        @endforeach
                        <!-- Single Trending Post loop end-->

                    </div>
                </div>


            </div>

            <!-- Sidebar Widget -->
            <div class="col-12 col-md-6 col-lg-5 col-xl-4">
                <div class="sidebar-area bg-white mb-30 box-shadow">
                    
                    <!-- Sidebar Widget -->
                    <div class="single-sidebar-widget p-30">
                        <!-- Social Followers Info -->
                        <div class="social-followers-info">
                            <!-- Facebook -->
                            @foreach( App\Models\Backend\Contact\Contact::orderBy('id','asc')->get() as $contact )
                            <a href="{{ $contact->f_link }}" class="facebook-fans"><i class="fa fa-facebook"></i> </a>
                            @endforeach
                        </div>
                    </div>
                    
                    <div class="single-sidebar-widget p-30">
                        <!-- Section Title -->
                        <div class="section-heading">
                            <h5>Newsletter</h5>
                        </div>
        
                        <div class="newsletter-form">
                            <p>Subscribe our newsletter gor get notification about new updates, information discount, etc.</p>
                            <form id="newsletterForm">
                                <input type="email" name="email" placeholder="Enter your email">
                                <button type="submit" class="btn mag-btn w-100">Subscribe</button>
                            </form>
                            <a class="facebook-button" href="https://rns24.net/login/facebook" >With Facebook</a>
                            <!--<a class="google-button" href="https://rns24.net/login/google" >With Google</a>-->
                        </div>
                        
                        @if( session()->has('success') )
                        <div class="alert alert-success alert-dismissible fade show" style="margin-top: 15px;" role="alert">
                        {{ session()->get('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        @endif
                        @if( session()->has('have') )
                        <div class="alert alert-success alert-dismissible fade show" style="margin-top: 15px;" role="alert">
                        {{ session()->get('have') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        @endif
                        @if( session()->has('failed') )
                        <div class="alert alert-danger alert-dismissible fade show" style="margin-top: 15px;" role="alert">
                        {{ session()->get('failed') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        @endif
        
                    </div>

                    <!-- Sidebar Widget -->
                    <div class="single-sidebar-widget p-30">
                        <!-- Section Title -->
                        <div class="section-heading">
                            <h5>Categories</h5>
                        </div>

                        <!-- Catagory Widget -->
                        <ul class="catagory-widgets">
                        @foreach( App\Models\Backend\Category\Category::orderBy('id','desc')->where('is_delete',0)->get() as $category )
                        @if( count( App\Models\Backend\News\News::orderBy('id','asc')->where('category_id',$category->id)->where('is_delete',0)->get() ) > 0 )
                        <li>
                            <a href="{{ route('category.show', $category->slug) }}">
                                <span>
                                    <i class="fa fa-angle-double-right" aria-hidden="true"></i> {{ $category->name }}
                                </span> 
                                <span>
                                {{ count( App\Models\Backend\News\News::orderBy('id','asc')->where('category_id',$category->id)->where('is_delete',0)->where('status',1)->where('is_pending',0)->get() ) }}
                                </span>
                            </a>
                        </li>
                        @endif
                        @endforeach
                        </ul>
                    </div>

                    <!-- Sidebar Widget -->
                    <div class="single-sidebar-widget">
                        @php
                        $i = 1;
                        @endphp
                        @foreach( App\Models\Backend\Ad\Ad::orderBy('id','desc')->get() as $ad )
                        @if( $i == 0 )
                        <a href="{{ $ad->link }}" class="add-img"><img src="{{ asset('images/ad/'. $ad->image) }}" alt=""></a>
                        @endif
                        @php
                        $i--;
                        @endphp
                        @endforeach
                    </div>


                </div>
            </div>

        </div>
    </div>
</section>
<!-- main section end -->

@endsection