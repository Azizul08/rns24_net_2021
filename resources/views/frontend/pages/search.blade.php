@extends('frontend.template.layout')
@section('header-section')
<meta charset="UTF-8">
<meta name="description" content="">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="csrf-token" content="{{ csrf_token() }}">
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
                    <h2>Search News</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Breadcrumb Area End ##### -->

<section class="search-result">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center alert alert-warning">
             Search news for '{{ $search }}'
            </div>
        </div>
    </div>
</section>

<!-- ##### Main Posts Area Start ##### -->
<section class="mag-posts-area d-flex flex-wrap">

    <!-- >>>>>>>>>>>>>>>>>>>>
 Post Left Sidebar Area
<<<<<<<<<<<<<<<<<<<<< -->
    <div class="post-sidebar-area left-sidebar mt-30 mb-30 bg-white box-shadow">


    </div>
    <!-- >>>>>>>>>>>>>>>>>>>>
 Post Left Sidebar Area END
<<<<<<<<<<<<<<<<<<<<< -->



    <!-- >>>>>>>>>>>>>>>>>>>>
     MIDDLE Posts Area
<<<<<<<<<<<<<<<<<<<<< -->
    <div class="mag-posts-content mt-30 mb-30 p-30 box-shadow search-block">

        <div class="row">
            <div class="col-md-12">
                <p>Search result : {{ count($searchnews) }}</p>
            </div>

            <!--- left part start -->
            @if( $searchnews->count() > 0 )
            @foreach( $searchnews as $news )
            @if( $news->is_delete != 1 ) 
            
            <div class="col-md-6 col-12">
                
                <!-- category wise news start -->
                <div class="most-viewed-videos">
                    
                    <div class="single-blog-post d-flex style-3 " style="margin: 10px 0">
                        <div class="post-thumbnail">
                            @if( $news->image == NULL )
                            <a href="{{ route('newsdetail', $news->id) }}">
                                <img src="{{ asset('images/news/thumbnail.png') }}" alt="">
                            </a>
                            @else
                            <a href="{{ route('newsdetail', $news->id) }}">
                                <img src="{{ asset('images/news/'. $news->image) }}" alt="">
                            </a>
                            @endif
                        </div>
                        <div class="post-content">
                            <a href="{{ route('newsdetail', $news->id) }}" class="post-title">{{ $news->title }}</a>
                            <p>{{$news->created_at->toDayDateTimeString()}}</p>
                           
                        </div>
                    </div>
                    
                </div>
                <!-- category wise news end -->
            </div>
            @endif
            @endforeach
            @else
            <div class="col-md-12 text-center alert alert-warning">
                No result found in your search for '{{ $search }}'
            </div>
            @endif
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

    </div>


</section>
<!-- ##### Main Posts Area End ##### -->

@endsection