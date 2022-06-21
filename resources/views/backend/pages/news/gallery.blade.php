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
                                <strong>Congratulation!</strong> {{ session()->get('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                            
                            @error('caption')
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Congratulation!</strong> {{ $message }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @enderror
                            
                            @error('image')
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Congratulation!</strong> {{ $message }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @enderror

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
                        </div>
                    </div>

                    <!-- add row start -->
                    <div class="row">
                        <div class="col-md-12 text-right">
                            @can('superAdmin')
                            <button class="btn btn-warning" data-toggle="modal" data-target="#addnews">Add Gallery Image</button>
                            <!-- Modal -->
                            <div class="modal fade bd-example-modal-lg " id="addnews" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('gallery.add') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                    <input type="hidden" class="form-control" name="author_id" value="{{ Auth::user()->id }}" required >
                                                    <div class="form-group">
                                                        <label>Caption</label>
                                                        <input type="text" class="form-control @error('caption') is-invalid @enderror "  name="caption" required >
                                                        @error('caption')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Select news</label>
                                                        <select class="chosen" name="news_id">
                                                            @foreach($newses as $news)
                                                            <option value="{{ $news->id }}">{{ $news->title }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Upload News Image (Image size may not be gather than 150 Kilobyte)</label> <br>
                                                        <img src="{{ asset('images/image-preview.png') }}" id="image_preview_container" width="100px" alt=""> <br> <br>
                                                        <input type="file" id="image" class="form-control-file @error('image') is-invalid @enderror" name="image" required>
                                                        @error('image')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-primary">Add</button>
                                                    </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endcan

                        </div>
                    </div>
                    <!-- add row end -->

                    <!-- manage row start -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table id="gallery" class="table table-bordered table-hover text-center align-item-center">
                                    <thead class="text-center">
                                        <tr>
                                        <th scope="col">SI</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Caption</th>
                                        <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach( $galleries as $key => $gallery )
                                        <tr>
                                            <td>
                                                {{ $key + 1 }}
                                            </td>
                                            <td>
                                                @if($gallery->image != NULL)
                                                <img src="{{ asset('images/gallery/'. $gallery->image) }}" width="50px">
                                                @else
                                                <p class="alert alert-danger">No image uploaded</p>
                                                @endif
                                            </td>
                                            <td>
                                                {{ $gallery->caption }}
                                            </td>
                                            <td>
                                            <a href="{{ route('gallery.edit', $gallery->id) }}" target="blank" class="btn btn-primary">Edit</a>

                                            @can('superAdmin')
                                            <button class="btn btn-danger" data-toggle="modal" data-target="#deletenews{{ $gallery->id }}">Delete</button>
                                            @endcan
                                            <!-- Modal -->
                                            <div class="modal fade" id="deletenews{{ $gallery->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Are you sure want to delete this gallery image ?</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="{{ route('gallery.delete', $gallery->id) }}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="btn btn-success">Yes</button>
                                                        </form>
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- manage row end -->

                </div>
            </div>
        </div>
    </div>
    <!-- main card end -->

</div>
<!-- container end-->

@endsection 

