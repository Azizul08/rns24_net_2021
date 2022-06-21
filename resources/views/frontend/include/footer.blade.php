<!-- ##### Footer Area Start ##### -->
<footer class="footer-area">
    <div class="container">
        <div class="row">
            
            <!-- Footer Widget Area -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="footer-widget">
                    <!-- Logo -->
                    <a href="{{ route('index') }}" class="nav-brand">
                        @foreach( App\Models\backend\Logo::orderBy('id','asc')->get() as $logo) )
                        <img src="{{ asset('images/logo/' . $logo->image ) }}" class="img-fluid" width="150px"  alt="">
                        @endforeach
                    </a>
                    <div class="footer-body">
                        <ul>
                            @foreach( App\Models\Backend\Contact\Contact::orderBy('id','asc')->get() as $contact )
                            <li><i class="fa fa-map-marker" aria-hidden="true"></i>{{ $contact->address }}</li>
                            <li><i class="fa fa-envelope" aria-hidden="true"></i>{{ $contact->email }}</li>
                            <li><i class="fa fa-phone" aria-hidden="true"></i>{{ $contact->phone }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="footer-social-info">
                        <h6 class="text-white">Publisher</h6> 
                        <h6 class="text-white">Rumi Bhuiyan</h6>    
                    </div>
                    <div class="footer-social-info">
                        @foreach( App\Models\Backend\Contact\Contact::orderBy('id','asc')->get() as $contact )
                        <a href="{{ $contact->f_link }}" class="facebook-fans"><i class="fa fa-facebook"></i> </a>
                        <a href="https://twitter.com/" class="facebook-fans"><i class="fa fa-twitter"></i> </a>
                        <a href="https://youtube.com/" class="facebook-fans"><i class="fa fa-youtube"></i> </a>
                        <a href="https://google.com/" class="facebook-fans"><i class="fa fa-google"></i> </a>
                        <a href="https://yahoo.com/" class="facebook-fans"><i class="fa fa-yahoo"></i> </a>
                        @endforeach
                    </div>
                    <div class="footer-social-info" style="margin-top: 10px;">
                        <a href="https://www.bbc.com/news" target="blank" style="background:unset;">
                                <img src="{{ asset('frontend/img/bbc.png') }}">
                        </a>
                        <a href="https://edition.cnn.com/" target="blank" style="background:unset;">
                                <img src="{{ asset('frontend/img/cnn.png') }}">
                        </a>
                        <a href="https://www.unicef.org/" target="blank" style="background:unset;">
                                <img src="{{ asset('frontend/img/unicef.png') }}">
                        <a href="https://www.un.org/en/" target="blank" style="background:unset;">
                                <img src="{{ asset('frontend/img/un.png') }}">
                        </a>
                        <a href="https://www.savethechildren.net/" target="blank" style="background:unset;">
                                <img src="{{ asset('frontend/img/savethechildren.jpg') }}">
                        </a>
                    </div>
                    <div class="footer-social-info" style="margin-top: 10px;">
                        <h6 class="text-white">Bureau chief : Bangladesh</h6>
                        <h6 class="text-white">Ziauddin chowdhury (z.salim)</h6>
                    </div>
                    
                     <div class="footer-social-info" style="margin-top: 10px;">
                        <h6 class="text-white">editor@rns24.net</h6>
                        <h6 class="text-white">info@rns24.net</h6>
                    </div>
                    
                </div>
            </div>
            
            
            <!-- Footer Widget Area -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="footer-widget">
                    @php
                    $i = 5;
                    @endphp
                    @foreach( App\Models\Backend\Title\Title::orderBy('id','asc')->get() as $title )
                    @if( $i == 0 )
                    <h6 class="widget-title">{{ $title->title }}</h6>
                    @endif
                    @php
                    $i--;
                    @endphp
                    @endforeach
                    <nav class="footer-widget-nav">
                        <ul>
                            @foreach( App\Models\Backend\Category\Category::orderBy('id','desc')->take(18)->get() as $category )
                            @if( count( App\Models\Backend\News\News::orderBy('id','asc')->where('category_id',$category->id)->where('is_delete',0)->get() ) > 0 )
                            <li>
                                <a href="{{ route('category.show', $category->slug) }}">
                                    <span>
                                        <i class="fa fa-angle-double-right" aria-hidden="true"></i> {{ $category->name }}
                                    </span> 
                                </a>
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </nav>
                </div>
            </div>

            <!-- Footer Widget Area -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="footer-widget">
                    @php
                    $i = 1;
                    @endphp
                    @foreach( App\Models\Backend\Title\Title::orderBy('id','asc')->get() as $title )
                    @if( $i == 0 )
                    <h6 class="widget-title">{{ $title->title }}</h6>
                    @endif
                    @php
                    $i--;
                    @endphp
                    @endforeach
                    
                    <!-- Single Blog Post -->
                    @foreach( App\Models\Backend\News\News::orderBy('id','desc')->where('is_pending',0)->where('is_delete',0)->where('status',1)->take(5)->get() as $news )
                    <div class="single-blog-post style-2 d-flex">
                        <div class="post-thumbnail">
                            @if( $news->image == NULL )
                            <a href="{{ route('newsdetail', $news->slug) }}">
                                <img src="{{ asset('images/news/thumbnail.png') }}" alt="">
                            </a>
                            @else
                            <a href="{{ route('newsdetail', $news->slug) }}">
                                <img src="{{ asset('images/news/'. $news->image) }}" alt="">
                            </a>
                            @endif
                        </div>
                        <div class="post-content">
                            <a href="{{ route('newsdetail', $news->slug) }}" class="post-title">{{ $news->title }}</a>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>

            <!-- Footer Widget Area -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="footer-widget">
                    @php
                    $i = 3;
                    @endphp
                    @foreach( App\Models\Backend\Title\Title::orderBy('id','asc')->get() as $title )
                    @if( $i == 0 )
                    <h6 class="widget-title">{{ $title->title }}</h6>
                    @endif
                    @php
                    $i--;
                    @endphp
                    @endforeach
                    
                    <!-- Single Blog Post -->
                    @foreach( App\Models\Backend\News\News::orderBy('id','desc')->where('is_pending',0)->where('is_delete',0)->where('status',1)->where('is_trend',1)->take(5)->get() as $news )
                    <div class="single-blog-post style-2 d-flex">
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
                    

                </div>
            </div>

            

        </div>
    </div>

    <!-- Copywrite Area -->
    <div class="copywrite-area">
        <div class="container">
            <div class="row">
                <!-- Copywrite Text -->
                <div class="col-12 col-sm-6">
                    <p class="copywrite-text">
                        Developed by <a href="http://ssttechbd.com/"> SST Tech Ltd.</a>
                    </p>
                </div>
                <div class="col-12 col-sm-6">
                    <nav class="footer-nav">
                        <ul>
                            <li><a href="{{ route('index') }}">Home</a></li>
                            <li><a href="{{ route('about') }}">About</a></li>
                            <li><a href="{{ route('contact') }}">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-md-12">
                    <p class="text-center text-white">The RNS is not responsible for the content of external sites</p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- ##### Footer Area End ##### -->