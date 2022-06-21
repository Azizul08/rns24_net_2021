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

<!-- ##### Main Posts Area Start ##### -->
<section class="mag-posts-area d-flex flex-wrap">

    
    @include('frontend.include.leftcard')



    <!-- >>>>>>>>>>>>>>>>>>>>
     MIDDLE Posts Area
<<<<<<<<<<<<<<<<<<<<< -->
    <div class="mag-posts-content mt-30 mb-30 p-30 box-shadow">


        <!-- category wise news start -->
        <div class="most-viewed-videos mb-30">
            <!-- Section Title -->
            <div class="section-heading">
                <h3>{{ $category->name }}</h3>
                <p>{{ $category->description }}</p>
            </div>

            <div class="row">

                <!-- Single Featured Post -->
                @foreach( $categorynews as $news )
                <div class="col-md-6">

                    <div class="single-featured-post">
                            <!-- Thumbnail -->
                            <div class="post-thumbnail mb-50">
                            @if( $news->image == NULL )
                            <a href="{{ route('newsdetail', $news->id) }}">
                                <img src="{{ asset('images/news/thumbnail.png') }}" alt="">
                            </a>
                            @else
                            <a href="{{ route('newsdetail', $news->id) }}">
                                <img src="{{ asset('images/news/'. $news->image) }}" alt="">
                            </a>
                            @endif
                            @if( $news->video != NULL )
                            <a href="{{ route('newsdetail', $news->id) }}" class="video-play"><i class="fa fa-play"></i></a>
                            @endif
                        </div>
                        <!-- Post Contetnt -->
                        <div class="post-content">
                            <div class="post-meta">
                                <a href="{{ route('newsdetail', $news->id) }}">{{$news->created_at->toDayDateTimeString()}}</a>
                                <a href="{{ route('newsdetail', $news->id) }}">{{ $category->name }}</a>
                            </div>
                            <a href="{{ route('newsdetail', $news->id) }}" class="post-title">{{ $news->title }}</a>
                        </div>
                    </div>

                </div>
                @endforeach
                <!-- Single Featured end -->

            </div>
        </div>
        <!-- category wise news end -->

        <div class="row">
            <div class="col-md-12">
            {{ $categorynews->links() }}
            </div>
        </div>

    </div>
    <!-- >>>>>>>>>>>>>>>>>>>>
     MIDDLE Posts Area END
<<<<<<<<<<<<<<<<<<<<< -->


    @include('frontend.include.rightcard')



</section>
<!-- ##### Main Posts Area End ##### -->

@endsection