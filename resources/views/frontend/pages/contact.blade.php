@extends('frontend.template.layout')
@section('header-section')
<meta charset="UTF-8">
<meta name="description" content="">
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

<!-- ##### Breadcrumb Area Start ##### -->
<section class="breadcrumb-area bg-img bg-overlay" style="background-image: url( {{ asset('frontend/img/bg-img/3.jpg') }}); background-position: top;">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                    @php
                    $i = 9;
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
                            <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Contact Area Start ##### -->
    <section class="contact-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-xl-8">
                    <div class="contact-content-area bg-white mb-30 p-30 box-shadow">
                        <!-- Google Maps -->
                        {{-- <div class="map-area mb-30">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22236.40558254599!2d-118.25292394686001!3d34.057682914027104!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2c75ddc27da13%3A0xe22fdf6f254608f4!2z4Kay4Ka4IOCmj-CmnuCnjeCmnOCnh-CmsuCnh-CmuCwg4KaV4KeN4Kav4Ka-4Kay4Ka_4Kar4KeL4Kaw4KeN4Kao4Ka_4Kav4Ka84Ka-LCDgpq7gpr7gprDgp43gppXgpr_gpqgg4Kav4KeB4KaV4KeN4Kak4Kaw4Ka-4Ka34KeN4Kaf4KeN4Kaw!5e0!3m2!1sbn!2sbd!4v1532328708137" allowfullscreen></iframe>
                        </div> --}}

                        <!-- Section Title -->
                        <div class="section-heading">
                        @php
                        $i = 9;
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

                        @foreach( $contacts as $contact )
                        <div class="contact-information mb-30">

                            <!-- Single Contact Info -->
                            <div class="single-contact-info d-flex align-items-center">
                                <div class="icon mr-15">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                </div>
                                <div class="text">
                                    <p>Our Office:</p>
                                    <h6>{{ $contact->address }}</h6>
                                </div>
                            </div>

                            <!-- Single Contact Info -->
                            <div class="single-contact-info d-flex align-items-center">
                                <div class="icon mr-15">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                </div>
                                <div class="text">
                                    <p>Email:</p>
                                    <h6>{{ $contact->email }}</h6>
                                </div>
                            </div>

                            <!-- Single Contact Info -->
                            <div class="single-contact-info d-flex align-items-center">
                                <div class="icon mr-15">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                </div>
                                <div class="text">
                                    <p>Phone:</p>
                                    <h6>{{ $contact->phone }}</h6>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        <!-- Section Title -->
                        <div class="section-heading">
                        @php
                        $i = 10;
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

                        <!-- Contact Form Area -->
                        <div class="contact-form-area">
                            <form id="createMessage">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="name" placeholder="Name" name="name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="email" placeholder="E-mail" name="email">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn mag-btn mt-30" type="submit">Send</button>
                                    </div>
                                </div>
                            </form>
                        </div>
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

                            @php
                            $i = 1;
                            @endphp
                            @foreach( App\Models\Backend\Ad\Ad::orderBy('id','desc')->get() as $ad )
                            @if( $i == 0 )
                            <a href="{{ $ad->link }}" class="add-img" style="margin-top: 15px; display: inline-block;"><img src="{{ asset('images/ad/'. $ad->image) }}" alt=""></a>
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
    <!-- ##### Contact Area End ##### -->

@endsection