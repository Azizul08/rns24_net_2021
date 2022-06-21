@extends('backend.template.layout')
@section('per_page_css')
<link href="{{asset('backend/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet"/>
@endsection
@section('per_page_js')
<script src="{{ asset('backend/assets/extra-libs/DataTables/datatables.min.js')}}"></script>
<script>
    $("#a").DataTable();
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
                            @if( session()->has('create') )
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Congratulation!</strong> {{ session()->get('create') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                            
                            @if ($errors->any())
                            @foreach ($errors->all() as $error)
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ $error }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endforeach
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
                            <button class="btn btn-warning" data-toggle="modal" data-target="#addnews">Add News</button>
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
                                        <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                                <input type="hidden" class="form-control" name="author_id" value="{{ Auth::user()->id }}" required >
                                                <div class="form-group">
                                                    <label>Title</label>
                                                    <input type="text" class="form-control" name="title" required >
                                                </div>
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <textarea id="div_editor1" name="description" >
                                                        
                                                    </textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>References</label>
                                                    <input type="text" class="form-control" name="ref" >
                                                </div>
                                                <div class="row">

                                                    <div class="col-md-3 text-left">
                                                        <label>Status</label>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="1">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Active
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="0" checked>
                                                            <label class="form-check-label" for="exampleRadios2">
                                                                Inactive
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3 text-left">
                                                        <label>Is this featured news?</label>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="featured" id="exampleRadios1" value="1">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Yes
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="featured" id="exampleRadios2" value="0" checked>
                                                            <label class="form-check-label" for="exampleRadios2">
                                                                No
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3 text-left">
                                                        <label>Is this trending news?</label>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="trending" id="one" value="1" >
                                                                <label class="form-check-label" for="one">
                                                                    Yes
                                                                </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="trending" id="two" value="0" checked>
                                                                <label class="form-check-label" for="two">
                                                                No
                                                                </label>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3 text-left">
                                                        <label>Is this running news?</label>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="running" id="three" value="1" >
                                                            <label class="form-check-label" for="three">
                                                                Yes
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="running" id="three" value="0" checked>
                                                            <label class="form-check-label" for="three">
                                                                No
                                                            </label>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-3 text-left" style="margin-top: 15px;">
                                                        <label>Is this breaking news?</label>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="breaking" id="four" value="1" >
                                                            <label class="form-check-label" for="four">
                                                                Yes
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="breaking" id="four" value="0" checked>
                                                            <label class="form-check-label" for="four">
                                                                No
                                                            </label>
                                                        </div>
                                                    </div>

                                                </div>
                                                
                                                <div class="form-group">
                                                    <label>Select Category</label>
                                                    <select name="category_id" class="form-control" required>
                                                    @foreach( App\Models\Backend\Category\Category::orderBy('id','desc')->where('is_delete',0)->get() as $category )
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                    </select>
                                                </div>

                                                <div class="row">

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Upload News Image</label> <br>
                                                            <img src="{{ asset('images/image-preview.png') }}" id="image_preview_container" width="100px" alt=""> <br> <br>
                                                            <input type="file" id="image" class="form-control-file" name="image">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>You tube video link</label>
                                                            <input type="text" name="video"  class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Upload News Audio</label>
                                                            <input type="file" name="audio" id="audio" class="form-control-file">
                                                        </div>
                                                    </div>
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
                            @can('admin')
                            <button class="btn btn-warning" data-toggle="modal" data-target="#addnewsadmin">Add News</button>
                            <div class="modal fade bd-example-modal-lg " id="addnewsadmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('news.storeadmin') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                                <input type="hidden" class="form-control" name="author_id" value="{{ Auth::user()->id }}" required >
                                                <div class="form-group">
                                                    <label>Title</label>
                                                    <input type="text" class="form-control" name="title" required >
                                                </div>
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <textarea type="text" id="one-ckeditor" class="form-control" name="description" required > </textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>References</label>
                                                    <input type="text" class="form-control" name="ref" >
                                                </div>

                                                <div class="row">

                                                    <div class="col-md-3 text-left">
                                                        <label>Status</label>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="1">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Active
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="0" checked>
                                                            <label class="form-check-label" for="exampleRadios2">
                                                                Inactive
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3 text-left">
                                                        <label>Is this featured news?</label>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="featured" id="exampleRadios1" value="1">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Yes
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="featured" id="exampleRadios2" value="0" checked>
                                                            <label class="form-check-label" for="exampleRadios2">
                                                                No
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3 text-left">
                                                        <label>Is this trending news?</label>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="trending" id="one" value="1" >
                                                                <label class="form-check-label" for="one">
                                                                    Yes
                                                                </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="trending" id="two" value="0" checked>
                                                                <label class="form-check-label" for="two">
                                                                No
                                                                </label>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3 text-left">
                                                        <label>Is this running news?</label>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="running" id="three" value="1" >
                                                            <label class="form-check-label" for="three">
                                                                Yes
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="running" id="three" value="0" checked>
                                                            <label class="form-check-label" for="three">
                                                                No
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="is_pending" value="1">

                                                </div>
                                                
                                                <div class="form-group">
                                                    <label>Select Category</label>
                                                    <select name="category_id" class="form-control" required>
                                                    @foreach( App\Models\Backend\Category\Category::orderBy('id','desc')->where('is_delete',0)->get() as $category )
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                    </select>
                                                </div>

                                                <div class="row">

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Upload News Image</label> <br>
                                                            <img src="{{ asset('images/image-preview.png') }}" id="image_preview_container" width="100px" alt=""> <br> <br>
                                                            <input type="file" id="image" class="form-control-file" name="image">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>You tube video link</label>
                                                            <input type="text" name="video"  class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Upload News Audio</label>
                                                            <input type="file" name="audio" id="audio" class="form-control-file">
                                                        </div>
                                                    </div>
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
                                <table id="a" class="table table-bordered table-hover text-center align-item-center">
                                    <thead class="text-center">
                                        <tr>
                                        <th scope="col">SI</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php 
                                            $i = 1 ;
                                        @endphp
                                        @foreach( $newses as $news )
                                        <tr class="text-center">
                                            <th scope="row">{{ $i }}</th>
                                            <th scope="row">
                                            @foreach( App\Models\Backend\Category\Category::orderBy('id','desc')->get() as $category )
                                            @if( $category->id == $news->category_id )
                                            <p class="badge badge-danger">{{ $category->name }}</p>
                                            @endif
                                            @endforeach
                                            </th>
                                            <th scope="row">{{ $news->title }}</th>
                                            

                                            
                                            <td>
                                                 
                                                
                                                <a href="{{ route('news.edit', $news->id) }}" target="blank" class="btn btn-primary">Edit</a>

                                                @can('superAdmin')
                                                <button class="btn btn-danger" data-toggle="modal" data-target="#deletenews{{ $news->id }}">Delete</button>
                                                @endcan
                                                <!-- Modal -->
                                                <div class="modal fade" id="deletenews{{ $news->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Are you sure want to delete "{{ $news->title }}" ?</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="{{ route('news.delete', $news->id) }}" method="POST">
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
                                        @php 
                                            $i++ ;
                                        @endphp
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