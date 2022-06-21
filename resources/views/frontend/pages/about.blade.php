@extends('frontend.template.layout')
@section('header-section')
<meta charset="UTF-8">
<meta name="description" content="">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="csrf-token" content="{{ csrf_token() }}">

<meta property="og:title" content="Rns24" />
<meta property="og:image" content="http://rns24.net/public/frontend/img/logo.JPG" />


<!-- Favicon -->
<link type="image/gif" rel="shortcut icon" href="{{ asset('frontend/img/fav.JPG') }}">
@endsection
@section('body-content')

<!-- ##### Breadcrumb Area Start ##### -->
<section class="breadcrumb-area bg-img bg-overlay" style="background-image: url( {{ asset('frontend/img/bg-img/3.jpg') }}); background-position: top;">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="breadcrumb-content">
                    @php
                    $i = 7;
                    @endphp
                    @foreach( App\Models\Backend\Title\Title::orderBy('id','asc')->get() as $title )
                    @if( $i == 0 )
                    <h2>
                    {{ $title->title }}
                    </h2>
                    @endif
                    @php
                    $i--;
                    @endphp
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Breadcrumb Area End ##### -->

<!-- ##### Breadcrumb Area Start ##### -->
<div class="mag-breadcrumb py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">About</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcrumb Area End ##### -->

<!-- ##### About Us Area Start ##### -->
<section class="about-us-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-xl-8">
                <!-- About Us Content -->
                <div class="about-us-content bg-white mb-30 p-30 box-shadow">
                    <!-- Section Title -->
                    <div class="section-heading">
                    @php
                    $i = 7;
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
                    @foreach( $abouts as $about )
                    {!! $about->info !!}
                    @if( $about->image != NULL )
                    <img class="mt-15" src="{{ asset('images/about/'. $about->image ) }}" alt="">
                    @endif
                    @endforeach
                    
                    <!-- Team Member Area -->
                    <div class="section-heading mt-30">
                    @php
                    $i = 8;
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
                    
                    <!-- Single Team Member -->
                    @foreach( $teams as $team )
                    <div class="single-team-member d-flex align-items-center">
                        <div class="team-member-thumbnail">
                            <img src="{{ asset('images/team/'. $team->image ) }}" alt="">
                        </div>
                        <div class="team-member-content">
                            <h6>{{ $team->name }}</h6>
                            <span>{{ $team->designation }}</span>
                            <p>{{ $team->description }}</p>
                        </div>
                    </div>
                    @endforeach
                    

                </div>
            </div>

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
<!-- ##### About Us Area End ##### -->

@endsection