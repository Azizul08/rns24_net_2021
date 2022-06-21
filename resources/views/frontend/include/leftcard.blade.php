<!-- >>>>>>>>>>>>>>>>>>>>
Post Left Sidebar Area
<<<<<<<<<<<<<<<<<<<<< -->
<div class="post-sidebar-area left-sidebar mt-30 mb-30 bg-white box-shadow">

<!-- Recent upload news Widget start -->
<div class="single-sidebar-widget p-30">
    <!-- Section Title -->
    <div class="section-heading">
        @php
        $i = 0;
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
    @foreach( App\Models\Backend\News\News::orderBy('id','desc')->where('is_pending',0)->where('is_delete',0)->where('status',1)->take(25)->get() as $news )
    <div class="single-blog-post d-flex">
        <div class="post-thumbnail">
            @if( $news->image == NULL )
            <a href="{{ route('newsdetail', $news->slug) }}" target="blank">
                <img src="{{ asset('images/news/thumbnail.png') }}" alt="">
            </a>
            @else
            <a href="{{ route('newsdetail', $news->slug) }}" target="blank">
                <img src="{{ asset('images/news/'. $news->image) }}" alt="">
            </a>
            @endif  
        </div>
        <div class="post-content">
                <a href="{{ route('newsdetail', $news->slug) }}" class="post-title">{{ Str::limit($news->title,30) }}</a>
                <div class="post-meta d-flex justify-content-between">
                    <!-- <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 34</a>
                    <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 84</a>
                    <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 14</a> -->
                </div>
        </div>
    </div>
    @endforeach
    <!-- Single Blog Post end-->

</div>
<!-- Recent upload news Widget end -->


    <!-- Magazine Widget start -->
    <div class="single-sidebar-widget">
        @php
        $i = 0;
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
    <!-- Magazine Widget end -->

    <!-- Running news Widget start -->
    <div class="single-sidebar-widget p-30">
        <!-- Section Title -->
        <div class="section-heading">
            @php
            $i = 4;
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
        @foreach( App\Models\Backend\News\News::orderBy('id','desc')->where('is_pending',0)->where('is_delete',0)->where('status',1)->where('is_running',1)->take(25)->get() as $news )
        <div class="single-blog-post d-flex">
            <div class="post-thumbnail">
                @if( $news->image == NULL )
                <a href="{{ route('newsdetail', $news->slug) }}" target="blank">
                    <img src="{{ asset('images/news/thumbnail.png') }}" alt="">
                </a>
                @else
                <a href="{{ route('newsdetail', $news->slug) }}" target="blank">
                    <img src="{{ asset('images/news/'. $news->image) }}" alt="">
                </a>
                @endif
                    
            </div>
            <div class="post-content">
                <a href="{{ route('newsdetail', $news->slug) }}" class="post-title">{{ $news->title }}</a>
                <div class="post-meta d-flex justify-content-between">
                    <!-- <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 34</a>
                    <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 84</a>
                    <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 14</a> -->
                </div>
            </div>
        </div>
        @endforeach
        <!-- Single Blog Post end-->
    

    </div>
    <!-- Running news Widget end -->

</div>
<!-- >>>>>>>>>>>>>>>>>>>>
Post Left Sidebar Area END
<<<<<<<<<<<<<<<<<<<<< -->