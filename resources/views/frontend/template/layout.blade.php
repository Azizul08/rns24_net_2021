<!DOCTYPE html>
<html lang="en">

    <head>
        @yield('header-section')
        @include('frontend.include.css')
    </head>

    <body>
        
        
        


        @include('frontend.include.navbar')

        <!-- text slide start -->
        <marquee behavior="" direction="" class="text-slide">
            <ul>
            @foreach( App\Models\Backend\News\News::orderBy('id','desc')->where('is_delete',0)->where('status',1)->where('is_breakingNews',1)->get() as $news )
                <li><a href="{{ route('newsdetail', $news->slug) }}">{{ $news->title }}</a></li>
            @endforeach
            </ul>
        </marquee>
        <!-- text slide end -->

        @yield('body-content')    

        @include('frontend.include.footer')

        @include('frontend.include.script')
        
    </body>

</html>