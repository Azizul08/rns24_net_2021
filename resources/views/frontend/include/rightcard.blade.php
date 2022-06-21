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
    <a href="{{ $ad->link }}" class="add-img"><img src="{{ asset('images/ad/'. $ad->image) }}" alt=""></a>
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
    @foreach( App\Models\Backend\News\News::orderBy('id','desc')->where('is_pending',0)->where('is_delete',0)->where('status',1)->where('is_trend',1)->get() as $news )
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