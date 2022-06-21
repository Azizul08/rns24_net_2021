@extends('backend.template.layout')
@section('main_card_content')
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Sales Cards  -->
    <!-- ============================================================== -->
    
    <div class="row">

        <!-- Column -->
        <div class="col-md-6 col-lg-2 col-xlg-3">
            <a href="{{ route('pendingnews.show') }}">
                <div class="card card-hover">
                    <div class="box bg-cyan text-center">
                        <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                        <h6 class="text-white">
                           
                        </h6>
                        <h6 class="text-white">Total Pending News</h6>
                        <h6 class="text-white">{{ count(App\Models\Backend\News\News::orderBy('id','desc')->where('is_pending',1)->get() ) }}</h6>
                    </div>
                </div>
            </a>
        </div>
        <!-- Column -->

        <!-- Column -->
        <div class="col-md-6 col-lg-2 col-xlg-3">
            <a href="{{ route('news.show') }}">
                <div class="card card-hover">
                    <div class="box bg-cyan text-center">
                        <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                        <h6 class="text-white">
                           
                        </h6>
                        <h6 class="text-white">Total News</h6>
                        <h6 class="text-white">{{ count(App\Models\Backend\News\News::orderBy('id','desc')->where('status',1)->where('is_delete',0)->get() ) }}</h6>
                    </div>
                </div>
            </a>
        </div>
        <!-- Column -->

        <!-- Column -->
        <div class="col-md-6 col-lg-2 col-xlg-3">
            <a href="{{ route('message.show') }}">
                <div class="card card-hover">
                    <div class="box bg-cyan text-center">
                        <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                        <h6 class="text-white">
                           
                        </h6>
                        <h6 class="text-white">Total Message</h6>
                        <h6 class="text-white">{{ count(App\Models\Frontend\Message::orderBy('id','desc')->get() ) }}</h6>
                    </div>
                </div>
            </a>
        </div>
        <!-- Column -->
       
    </div>
    <!-- ============================================================== -->
    <!-- Sales chart -->
    <!-- ============================================================== -->
</div>
@endsection