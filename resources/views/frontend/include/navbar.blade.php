
<!-- ##### NAVBAR Area Start ##### -->
<header class="header-area">

<div class="todays-date">
    <p>{{ Carbon\Carbon::today()->toFormattedDateString() }}</p>
</div>

<!-- Navbar Area -->
<div class="mag-main-menu" id="sticker">
    <div class="classy-nav-container breakpoint-off">
        <!-- Menu -->
        <nav class="classy-navbar justify-content-between" id="magNav">

            <!-- Nav brand -->
            <a href="{{ route('index') }}" class="nav-brand">
                @foreach( App\Models\Backend\Logo::orderBy('id','asc')->get() as $logo ) 
                <img src="{{ asset('images/logo/' . $logo->image ) }}" class="img-fluid" style="width: 60px;" alt="">
                @endforeach
            </a>

            <!-- Navbar Toggler -->
            <div class="classy-navbar-toggler">
                <span class="navbarToggler"><span></span><span></span><span></span></span>
            </div>

            <!-- Nav Content -->
            <div class="nav-content d-flex align-items-center">
                <div class="classy-menu">

                    <!-- Close Button -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>

                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul>
                            <li class="active"><a href="{{ url('/') }}">Home</a></li>
                            
                            @foreach( App\Models\Backend\Category\Category::orderBy('id','desc')->where('is_delete',0)->get() as $category )
                            @if( count( App\Models\Backend\News\News::orderBy('id','asc')->where('category_id',$category->id)->where('is_delete',0)->where('is_pending',0)->get() ) > 0 )
                            <li><a href="{{ route('category.show', $category->slug) }}">{{ $category->name }}</a>

                                <div class="megamenu">

                                    <!-- mega menu item start -->
                                    @foreach( App\Models\Backend\News\News::orderBy('id','desc')->where('is_delete',0)->where('is_pending',0)->where('category_id', $category->id)->where('status',1)->take(4)->get() as $news )
                                    <ul class="single-mega cn-col-4">
                                        <div class="row">
                                            <div class="col-md-12 nav-news-box">
                                                <a href="{{ route('newsdetail', $news->id) }}">
                                                @if($news->image == NULL )
                                                    <img src="{{ asset('images/news/thumbnail.png') }}" alt="">
                                                @else
                                                    <img src="{{ asset('images/news/'. $news->image) }}" alt="">
                                                @endif
                                                </a>
                                                <p>{{ $news->title }}</p>
                                                <p> <i class="fas fa-clock"></i> {{$news->created_at->diffForHumans()}}</p>
                                            </div>
                                        </div>
                                    </ul>
                                    @endforeach
                                    <!-- mega menu item end -->
                                    
                                </div>

                            </li>
                            @endif
                            @endforeach
                            

                        </ul>
                    </div> 
                    <!-- Nav End -->
                </div>

                <div class="top-meta-data d-flex align-items-center">
                    <!-- Top Search Area -->
                    <div class="top-search-area">
                        <form action="{{ route('search') }}" method="get">
                        @csrf
                            <input type="search" name="search" id="topSearch" required>
                            <button type="submit" class="btn"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>
</header>
<!-- ##### NAVBAR Area End ##### -->