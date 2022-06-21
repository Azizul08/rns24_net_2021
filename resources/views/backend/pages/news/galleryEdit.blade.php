@extends('backend.template.layout')
@section('per_page_css')
<style>
    .chosen-container{
        width: 100%!important;
    }
</style>
<link href="{{asset('backend/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet"/>
@endsection
@section('per_page_js')
<script src="{{ asset('backend/assets/extra-libs/DataTables/datatables.min.js')}}"></script>
<script>
    $("#gallery").DataTable();
     $(".chosen").chosen();
</script>
@endsection
@section('main_card_content')

<!-- container start -->
<div class="container-fluid">

    <!-- title row start -->
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">All News</h4>
        </div>
    </div>
    <!-- title row end -->

    <!-- main card start -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-12">
                            <!-- add message -->
                            @if( session()->has('success') )
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Congratulation!</strong> {{ session()->get('create') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                            <!-- update message -->
                            @if( session()->has('update') )
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Congratulation!</strong> {{ session()->get('update') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                             <!-- delete message -->
                             @if( session()->has('delete') )
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Congratulation!</strong> {{ session()->get('delete') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                            
                            @error('image')
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Congratulation!</strong> {{ $message }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @enderror

                            <!-- delete message -->
                            @if( session()->has('passnotmatch') )
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Sorry!</strong> {{ session()->get('passnotmatch') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                            <!-- create failed message -->
                            @if( session()->has('createFailed') )
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Sorry!</strong> {{ session()->get('createFailed') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                        </div>
                    </div>

                    <!-- add row start -->
                    <div class="row">
                        <div class="col-md-12 text-right">
                            @can('superAdmin')
                            <form action="{{ route('gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                    <input type="hidden" class="form-control" name="author_id" value="{{ Auth::user()->id }}" required >
                                    <div class="form-group">
                                        <label>Caption</label>
                                        <input type="text" class="form-control @error('caption') is-invalid @enderror"" value="{{ $gallery->caption }}" name="caption" required >
                                        @error('caption')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Select news</label>
                                        <select class="chosen" name="news_id">
                                            @foreach($newses as $news)
                                            <option value="{{ $news->id }}" @if($gallery->news->id == $news->id) selected @endif >{{ $news->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Upload News Image (Image size may not be gather than 150 Kilobyte)</label> <br>
                                        <img src="{{ asset('images/gallery/'. $gallery->image) }}" id="image_preview_container" width="100px" alt=""> <br> <br>
                                        <input type="file" id="image" class="form-control-file @error('image') is-invalid @enderror" name="image" >
                                        @error('image')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                            </form>
                            @endcan

                        </div>
                    </div>
                    <!-- add row end -->

                </div>
            </div>
        </div>
    </div>
    <!-- main card end -->

</div>
<!-- container end-->

@endsection 

