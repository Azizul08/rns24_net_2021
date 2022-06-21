<?php set_time_limit(0);?>
@extends('frontend.template.layout')
@section('header-section')
<title>Rns24</title>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta property="og:title" content="Rns24" />
<meta property="og:image" content="http://rns24.net/public/frontend/img/logo.JPG" />
<meta property="fb:app_id" content="1238493226503259">

<!-- Favicon -->
<link type="image/gif" rel="shortcut icon" href="{{ asset('frontend/img/fav.JPG') }}">
@endsection
@section('body-content')
<!-- ##### Banner Area Start ##### -->
<div class="banner-area">
     
     <div class="container-fluid">

         <div class="row news-banner">
             <div class="col-md-4">
                 
                 <div class="row">

                     <!--- item start --->
                     @php
                        $i = 0;
                     @endphp
                     @foreach( $newses as $news )
                     @if( $i == 0 )
                     <div class="col-md-6 col-6">
                         <a href="{{ route('newsdetail', $news->id) }}">
                             <div class="banner-news-item right"
                             @if( $news->image == NULL )
                             style="background-image: url( {{ asset('images/news/thumbnail.png') }})"
                             @else
                             style="background-image: url( {{ asset('images/news/'.$news->image) }})"
                             @endif
                             >
                                 <!-- Post Contetnt -->
                                 <div class="post-content text-center">
                                     <div class="post-meta" data-animation="fadeInUp" data-delay="100ms">
                                         <p>{{$news->created_at->toFormattedDateString()}}</p>
                                         <h2>{{ $news->title }}</h2>
                                         
                                     </div>
                                 </div>
                             </div>
                         </a>
                     </div>
                     @endif
                     @php
                        $i--;
                     @endphp
                     @endforeach
                     <!--- item end --->

                     <!--- item start --->
                     @php
                        $i = 1;
                     @endphp
                     @foreach( $newses as $news )
                     @if( $i == 0 )
                     <div class="col-md-6 col-6">
                        <a href="{{ route('newsdetail', $news->id) }}">
                            <div class="banner-news-item right" 
                            @if( $news->image == NULL )
                             style="background-image: url( {{ asset('images/news/thumbnail.png') }})"
                             @else
                             style="background-image: url( {{ asset('images/news/'.$news->image) }})"
                             @endif
                            >
                                 <!-- Post Contetnt -->
                                 <div class="post-content text-center">
                                     <div class="post-meta" data-animation="fadeInUp" data-delay="100ms">
                                         <p>{{$news->created_at->toFormattedDateString()}}</p>
                                         <h2>{{ $news->title }}</h2>
                                         
                                     </div>
                                 </div>
                             </div>
                        </a>
                     </div>
                     @endif
                     @php
                        $i--;
                     @endphp
                     @endforeach
                     <!--- item end --->

                     <!--- item start --->
                     @php
                        $i = 2;
                     @endphp
                     @foreach( $newses as $news )
                     @if( $i == 0 )
                     <div class="col-md-6 col-6">
                        <a href="{{ route('newsdetail', $news->id) }}">
                            <div class="banner-news-item right" 
                            @if( $news->image == NULL )
                             style="background-image: url( {{ asset('images/news/thumbnail.png') }})"
                             @else
                             style="background-image: url( {{ asset('images/news/'.$news->image) }})"
                             @endif
                            >
                                 <!-- Post Contetnt -->
                                 <div class="post-content text-center">
                                     <div class="post-meta" data-animation="fadeInUp" data-delay="100ms">
                                         <p>{{$news->created_at->toFormattedDateString()}}</p>
                                         <h2>{{ $news->title }}</h2>
                                         
                                     </div>
                                 </div>
                             </div>
                        </a>
                     </div>
                     @endif
                     @php
                        $i--;
                     @endphp
                     @endforeach
                      <!--- item end --->

                    <!--- item start --->
                    @php
                        $i = 3;
                     @endphp
                     @foreach( $newses as $news )
                     @if( $i == 0 )
                     <div class="col-md-6 col-6">
                        <a href="{{ route('newsdetail', $news->id) }}">
                            <div class="banner-news-item right" 
                            @if( $news->image == NULL )
                             style="background-image: url( {{ asset('images/news/thumbnail.png') }})"
                             @else
                             style="background-image: url( {{ asset('images/news/'.$news->image) }})"
                             @endif
                            >
                                 <!-- Post Contetnt -->
                                 <div class="post-content text-center">
                                     <div class="post-meta" data-animation="fadeInUp" data-delay="100ms">
                                         <p>{{$news->created_at->toFormattedDateString()}}</p>
                                         <h2>{{ $news->title }}</h2>
                                         
                                     </div>
                                 </div>
                             </div>
                        </a>
                     </div>
                     @endif
                     @php
                        $i--;
                     @endphp
                     @endforeach
                     <!--- item end --->
                    

                 </div>
             </div>

             <!--- item start --->
            @php
                $i = 4;
            @endphp
            @foreach( $newses as $news )
            @if( $i == 0 )
             <div class="col-md-4 col-12">
                 <a href="{{ route('newsdetail', $news->id) }}">
                     <div class="banner-news-item left" 
                     @if( $news->image == NULL )
                             style="background-image: url( {{ asset('images/news/thumbnail.png') }})"
                             @else
                             style="background-image: url( {{ asset('images/news/'.$news->image) }})"
                             @endif
                     >
                        <!-- Post Contetnt -->
                        <div class="post-content text-center">
                            <div class="post-meta" data-animation="fadeInUp" data-delay="100ms">
                                <p>{{$news->created_at->toFormattedDateString()}}</p>
                                <h2>{{ $news->title }}</h2>
                                
                            </div>
                        </div>
                     </div>
                 </a>
             </div>
             @endif
            @php
                $i--;
            @endphp
            @endforeach
             <!--- item end --->

             <div class="col-md-4">
                 
                 <div class="row">

                     <!--- item start --->
                     @php
                        $i = 5;
                     @endphp
                     @foreach( $newses as $news )
                     @if( $i == 0 )
                     <div class="col-md-6 col-6">
                        <a href="{{ route('newsdetail', $news->id) }}">
                            <div class="banner-news-item right" 
                            @if( $news->image == NULL )
                             style="background-image: url( {{ asset('images/news/thumbnail.png') }})"
                             @else
                             style="background-image: url( {{ asset('images/news/'.$news->image) }})"
                             @endif
                            >
                                 <!-- Post Contetnt -->
                                 <div class="post-content text-center">
                                     <div class="post-meta" data-animation="fadeInUp" data-delay="100ms">
                                         <p>{{$news->created_at->toFormattedDateString()}}</p>
                                         <h2>{{ $news->title }}</h2>
                                         
                                     </div>
                                 </div>
                             </div>
                        </a>
                     </div>
                     @endif
                     @php
                        $i--;
                     @endphp
                     @endforeach
                     <!--- item end --->

                     <!--- item start --->
                     @php
                        $i = 6;
                     @endphp
                     @foreach( $newses as $news )
                     @if( $i == 0 )
                     <div class="col-md-6 col-6">
                        <a href="{{ route('newsdetail', $news->id) }}">
                            <div class="banner-news-item right" 
                            @if( $news->image == NULL )
                             style="background-image: url( {{ asset('images/news/thumbnail.png') }})"
                             @else
                             style="background-image: url( {{ asset('images/news/'.$news->image) }})"
                             @endif
                            >
                                 <!-- Post Contetnt -->
                                 <div class="post-content text-center">
                                     <div class="post-meta" data-animation="fadeInUp" data-delay="100ms">
                                         <p>{{$news->created_at->toFormattedDateString()}}</p>
                                         <h2>{{ $news->title }}</h2>
                                         
                                     </div>
                                 </div>
                             </div>
                        </a>
                     </div>
                     @endif
                     @php
                        $i--;
                     @endphp
                     @endforeach
                     <!--- item end --->

                     <!--- item start --->
                     @php
                        $i = 7;
                     @endphp
                     @foreach( $newses as $news )
                     @if( $i == 0 )
                     <div class="col-md-6 col-6">
                        <a href="{{ route('newsdetail', $news->id) }}">
                            <div class="banner-news-item right" 
                            @if( $news->image == NULL )
                             style="background-image: url( {{ asset('images/news/thumbnail.png') }})"
                             @else
                             style="background-image: url( {{ asset('images/news/'.$news->image) }})"
                             @endif
                            >
                                 <!-- Post Contetnt -->
                                 <div class="post-content text-center">
                                     <div class="post-meta" data-animation="fadeInUp" data-delay="100ms">
                                         <p>{{$news->created_at->toFormattedDateString()}}</p>
                                         <h2>{{ $news->title }}</h2>
                                         
                                     </div>
                                 </div>
                             </div>
                        </a>
                     </div>
                     @endif
                     @php
                        $i--;
                     @endphp
                     @endforeach
                      <!--- item end --->

                      <!--- item start --->
                      @php
                        $i = 8;
                     @endphp
                     @foreach( $newses as $news )
                     @if( $i == 0 )
                     <div class="col-md-6 col-6">
                        <a href="{{ route('newsdetail', $news->id) }}">
                            <div class="banner-news-item right" 
                            @if( $news->image == NULL )
                             style="background-image: url( {{ asset('images/news/thumbnail.png') }})"
                             @else
                             style="background-image: url( {{ asset('images/news/'.$news->image) }})"
                             @endif
                            >
                                 <!-- Post Contetnt -->
                                 <div class="post-content text-center">
                                     <div class="post-meta" data-animation="fadeInUp" data-delay="100ms">
                                         <p>{{$news->created_at->toFormattedDateString()}}</p>
                                         <h2>{{ $news->title }}</h2>
                                         
                                     </div>
                                 </div>
                             </div>
                        </a>
                     </div>
                     @endif
                     @php
                        $i--;
                     @endphp
                     @endforeach
                     <!--- item end --->
                     
                     </div>
                    
                 </div>


         </div>

     </div>

</div>
 <!-- ##### Banner Area End ##### -->

 <!-- ##### Main Posts Area Start ##### -->
 <section class="mag-posts-area d-flex flex-wrap">

    @include('frontend.include.leftcard')


     <!-- >>>>>>>>>>>>>>>>>>>>
          MIDDLE Posts Area
     <<<<<<<<<<<<<<<<<<<<< -->
     <div class="mag-posts-content mt-30 mb-30 p-30 box-shadow">
         
            <!-- all newses  Area start-->
            <div class="trending-now-posts mb-30">
                <!-- Section Title -->
                <div class="section-heading">
                    
                @php
                $i = 1;
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
                    
                    
                    <!-- Single  Post loop start-->
                    @foreach( $allnewses as $news )
                    <div class="single-trending-post" style="height: 200px;">
                        @if( $news->image == NULL )
                        <a href="{{ route('newsdetail', $news->id) }}">
                            <img src="{{ asset('images/news/thumbnail.png') }}" alt="">
                        </a>
                        @else
                        <a href="{{ route('newsdetail', $news->id) }}">
                            <img src="{{ asset('images/news/'. $news->image) }}" alt="" 
                            style="position: absolute;
                                top: 50%;
                                left: 50%;
                                width: 100%;
                                height: 100%;
                                transform: translate(-50%,-50%);"
                            >
                        </a>
                        @endif
                        <div class="post-content">
                            @if( $news->video != NULL )
                            <a class="post-cata">Video</a>
                            @endif
                            <a href="{{ route('newsdetail', $news->id) }}" class="post-title">{{ $news->title }}</a>
                            
                        </div>
                    </div>
                    @endforeach
                    <!-- Single  Post loop end-->

                </div>
            </div>
            <!-- all newses news Area end-->

         <!-- Feature news  Area start -->
         <div class="feature-video-posts mb-30">
             <!-- Section Title -->
             <div class="section-heading">
               
         
          
                @php
                $i = 2;
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

            <div class="featured-video-posts">
                <div class="row">
                    
                    <!--- left part start --->
                    @foreach( App\Models\Backend\News\News::orderBy('id','desc')->where('is_featured',1)->where('is_pending',0)->where('status',1)->where('is_delete',0)->take(1)->get() as $news )
                    <div class="col-12 col-lg-7">
                        
                        <!-- Single Featured Post -->
                        <div class="single-featured-post">
                            <!-- Thumbnail -->
                            <div class="post-thumbnail mb-50">
                                <a href="{{ route('newsdetail', $news->id) }}">
                                    @if( $news->image == NULL )
                                    <img src="{{ asset('images/news/thumbnail.png') }}" alt="">
                                    @else
                                    <img src="{{ asset('images/news/'. $news->image) }}" alt="">
                                    @endif
                                </a>
                            </div>
                            <!-- Post Contetnt -->
                            <div class="post-content">
                                <div class="post-meta">
                                    <a href="{{ route('newsdetail', $news->id) }}">{{$news->created_at->toDayDateTimeString()}}</a>
                                    @foreach( $categories as $category  )
                                    @if( $category->id == $news->category->id )
                                    <a href="{{ route('newsdetail', $news->id) }}">{{ $category->name }}</a>
                                    @endif
                                    @endforeach
                                </div>
                                <a href="{{ route('newsdetail', $news->id) }}" class="post-title">{{ $news->title }}</a>
                                
                            </div>
                            
                        </div>
                    </div>
                    @endforeach
                    <!--- left part end --->

                    <!--- right part start -->
                    <div class="col-12 col-lg-5">

                        <!-- Featured Video Posts Slide -->
                        <div class="featured-video-posts-slide owl-carousel">

                            @foreach( App\Models\Backend\Category\Category::orderBy('id','desc')->get() as $category )
                            @if( count( App\Models\Backend\News\News::orderBy('id','desc')->where('is_pending',0)->where('category_id',$category->id)->where('is_delete',0)->where('is_featured',1)->where('status',1)->get() ) > 0 )
                            <!-- slide for one category start --->
                            <div class="single--slide">
                                
                                <!-- Single Blog Post -->
                                @foreach( App\Models\Backend\News\News::orderBy('id','desc')->where('is_pending',0)->where('is_delete',0)->where('category_id', $category->id)->where('status',1)->take(6)->get() as $news )
                                <div class="single-blog-post d-flex style-3">
                                    <div class="post-thumbnail">
                                        @if( $news->image == NULL )
                                        <a href="{{ route('newsdetail', $news->id) }}" target="blank">
                                            <img src="{{ asset('images/news/thumbnail.png') }}" alt="">
                                        </a>
                                        @else
                                        <a href="{{ route('newsdetail', $news->id) }}" target="blank">
                                            <img src="{{ asset('images/news/'. $news->image) }}" alt="">
                                        </a>
                                        @endif
                                    </div>
                                    <div class="post-content">
                                        <a href="{{ route('newsdetail', $news->id) }}" class="post-title">{{ $news->title }}</a>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                            <!-- slide for one category end --->
                            @endif
                            @endforeach

                        </div>
                    </div>
                    <!--- right part end -->

                </div>
            </div>
        </div>
        <!-- Feature news  Area end -->

        <div class="row">

            @foreach( App\Models\Backend\Category\Category::orderBy('id','desc')->where('is_delete',0)->take(11)->get() as $category )
            @if( count( App\Models\Backend\News\News::orderBy('id','desc')->where('is_pending',0)->where('category_id',$category->id)->where('is_delete',0)->where('status',1)->get() ) > 0 )
            <!--- left part start -->
            <div class="col-md-6">
                <!-- category wise news start -->
                <div class="most-viewed-videos mb-30">
                    <!-- Section Title -->
                    <div class="section-heading">
                        <a href="{{ route('newsdetail', $news->id) }}">{{ $category->name }}</a>
                    </div>

                    <div class="row most-viewed-videos-slide-two owl-carousel">

                        <!-- Single Featured Post -->
                        <div class="col-md-12">

                            @foreach( App\Models\Backend\News\News::orderBy('id','desc')->where('is_pending',0)->where('is_delete',0)->where('category_id', $category->id)->where('status',1)->take(1)->get() as $news )
                            <div class="single-featured-post">
                                <!-- Thumbnail -->
                                <div class="post-thumbnail mb-50">
                                    @if( $news->image == NULL )
                                    <a href="{{ route('newsdetail', $news->id) }}" target="blank">
                                        <img src="{{ asset('images/news/thumbnail.png') }}" alt="">
                                    </a>
                                    @else
                                    <a href="{{ route('newsdetail', $news->id) }}" target="blank">
                                        <img src="{{ asset('images/news/'. $news->image) }}" alt="">
                                    </a>
                                    @endif
                                    @if( $news->video != NULL )
                                    <a class="{{ route('newsdetail', $news->id) }}"><i class="fa fa-play"></i></a>
                                    @endif
                                </div>
                                <!-- Post Contetnt -->
                                <div class="post-content">
                                    <div class="post-meta">
                                        <a href="{{ route('newsdetail', $news->id) }}">{{$news->created_at->toDayDateTimeString()}}</a>
                                    </div>
                                    <a href="{{ route('newsdetail', $news->id) }}" class="post-title">{{ $news->title }}</a>
                                    
                                </div>
                            </div>
                            @endforeach

                            <!--- item start -->
                            @php
                                $i = 0;
                            @endphp
                            @foreach( App\Models\Backend\News\News::orderBy('id','desc')->where('is_pending',0)->where('is_delete',0)->where('category_id', $category->id)->where('status',1)->take(6)->get() as $news )
                            @if( $i > 0 )
                            <div class="single-blog-post d-flex style-3 mb-30">
                                <div class="post-thumbnail">
                                    @if( $news->image == NULL )
                                    <a href="{{ route('newsdetail', $news->id) }}" target="blank">
                                        <img src="{{ asset('images/news/thumbnail.png') }}" alt="">
                                    </a>
                                    @else
                                    <a href="{{ route('newsdetail', $news->id) }}" target="blank">
                                        <img src="{{ asset('images/news/'. $news->image) }}" alt="">
                                    </a>
                                    @endif
                                </div>
                                <div class="post-content">
                                    <a href="{{ route('newsdetail', $news->id) }}" class="post-title">{{ $news->title }}</a>
                                </div>
                            </div>
                            @endif
                            @php
                                $i++;
                            @endphp
                            @endforeach
                            <!--- item end -->

                        </div>
                        <!-- Single Featured end -->
                        
                    </div>
                </div>
                <!-- category wise news end -->
            </div>
            @endif
            @endforeach
            <!--- left part end -->

        </div>
         
     </div>
     <!-- >>>>>>>>>>>>>>>>>>>>
          MIDDLE Posts Area END
     <<<<<<<<<<<<<<<<<<<<< -->

     

     <!-- >>>>>>>>>>>>>>>>>>>>
Post Right Sidebar Area
<<<<<<<<<<<<<<<<<<<<< -->
<div class="post-sidebar-area right-sidebar mt-30 mb-30 box-shadow">

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
            @php
            $i = 5;
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
    <a href="#" class="add-img"><img src="{{ asset('images/ad/'. $ad->image) }}" alt=""></a>
    @endif
    @php
    $i--;
    @endphp
    @endforeach
</div>



<!-- Recent upload news Widget start -->
<div class="single-sidebar-widget p-30">
    <!-- Section Title -->
    <div class="section-heading">
        @php
        $i = 3;
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

    <!-- Single Blog Post -->
    @foreach( App\Models\Backend\News\News::orderBy('id','desc')->where('is_pending',0)->where('is_delete',0)->where('status',1)->where('is_trend',1)->take(40)->get() as $news )
    <div class="single-blog-post d-flex">
        <div class="post-thumbnail">
            @if( $news->image == NULL )
            <a href="{{ route('newsdetail', $news->id) }}" target="blank">
                <img src="{{ asset('images/news/thumbnail.png') }}" alt="">
            </a>
            @else
            <a href="{{ route('newsdetail', $news->id) }}" target="blank">
                <img src="{{ asset('images/news/'. $news->image) }}" alt="">
            </a>
            @endif  
        </div>
        <div class="post-content">
            <a href="{{ route('newsdetail', $news->id) }}" class="post-title">{{ $news->title }}</a>
        </div>
    </div>
    @endforeach
    <!-- Single Blog Post end-->

</div>
<!-- Recent upload news Widget end -->
        

</div>
<!-- >>>>>>>>>>>>>>>>>>>>
Post Right Sidebar Area END
<<<<<<<<<<<<<<<<<<<<< -->

 </section>
 <!-- ##### Main Posts Area End ##### -->
@endsection