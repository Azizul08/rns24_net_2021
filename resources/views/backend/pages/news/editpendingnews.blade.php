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

                    <form action="{{ route('pnews.update', $news->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title" required value="{{ $news->title }}">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea type="text" id="div_editor1" class="form-control" name="description" required >{{ $news->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>References</label>
                                <input type="text" class="form-control" name="ref" value="{{ $news->ref }}">
                            </div>

                            <div class="row">

                                <div class="col-md-3 text-left">
                                    <label>Status</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="exampleRadios1" 
                                        @if( $news->status == 1  )
                                        checked
                                        @endif
                                        value="1">
                                        <label class="form-check-label" for="exampleRadios1">
                                            Active
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="exampleRadios2" 
                                        @if( $news->status == 0  )
                                        checked
                                        @endif
                                        value="0" >
                                        <label class="form-check-label" for="exampleRadios2">
                                            Inactive
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-3 text-left">
                                    <label>Is this featured news?</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="featured" id="exampleRadios1" 
                                        @if( $news->is_featured == 1  )
                                        checked
                                        @endif
                                        value="1">
                                        <label class="form-check-label" for="exampleRadios1">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="featured" id="exampleRadios2" 
                                        @if( $news->is_featured == 0  )
                                        checked
                                        @endif
                                        value="0" >
                                        <label class="form-check-label" for="exampleRadios2">
                                            No
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-3 text-left">
                                    <label>Is this trending news?</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="trending" id="one" 
                                        @if( $news->is_trend == 1  )
                                        checked
                                        @endif
                                        value="1" >
                                            <label class="form-check-label" for="one">
                                                Yes
                                            </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="trending" id="two" 
                                        @if( $news->is_trend == 0  )
                                        checked
                                        @endif
                                        value="0" >
                                            <label class="form-check-label" for="two">
                                            No
                                            </label>
                                    </div>
                                </div>

                                <div class="col-md-3 text-left">
                                    <label>Is this running news?</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="running" id="three" 
                                        @if( $news->is_running == 1  )
                                        checked
                                        @endif
                                        value="1" >
                                        <label class="form-check-label" for="three">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="running" id="three" 
                                        @if( $news->is_running == 0  )
                                        checked
                                        @endif
                                        value="0" >
                                        <label class="form-check-label" for="three">
                                            No
                                        </label>
                                    </div>
                                </div>
                                
                                 <div class="col-md-3 text-left" style="margin-top: 15px;">
                                            <label>Is this breaking news?</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="breaking" id="four"
                                                @if( $news->is_breakingNews == 1  )
                                                checked
                                                @endif
                                                value="1" >
                                                <label class="form-check-label" for="four">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="breaking" id="four" value="0" @if( $news->is_breakingNews == 0  )
                                                checked
                                                @endif>
                                                <label class="form-check-label"
                                                
                                                for="four">
                                                    No
                                                </label>
                                            </div>
                                        </div>


                            </div>
                            
                            <div class="form-group">
                                <label>Select Category</label>
                                <select name="category_id" class="form-control" required>
                                @foreach( App\Models\Backend\Category\Category::orderBy('id','desc')->where('is_delete',0)->get() as $category )
                                <option 
                                @if( $news->category_id == $category->id  )
                                selected
                                @endif
                                value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                                </select>
                            </div>

                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Upload News Image</label> <br>
                                        @if( $news->image == NULL )
                                        <p class="badge badge-danger">No image upload</p>
                                        @else
                                        <img src="{{ asset('images/news/'. $news->image) }}" width="100px" alt=""> <br> <br>
                                        @endif
                                        <input type="file" id="image" class="form-control-file" name="image">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Upload News Video</label>
                                        <input type="text" name="video"  class="form-control" value="{{ $news->video }}"> <br>
                                        @if( $news->video == NULL )
                                        <p class="badge badge-danger">No video upload</p>
                                        @else
                                        <iframe src="{{ $news->video }}" style="width: 100%" frameborder="0"></iframe>
                                        @endif
                                        
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Upload News Audio</label> <br>
                                        @if( $news->audio == NULL )
                                        <p class="badge badge-danger">No audio upload</p>
                                        @else
                                        <audio style="width: 100%" src="{{ asset('audio/' . $news->audio .'/'. $news->audio) }}" controls></audio>
                                        @endif
                                        <input type="file" name="audio" id="audio" class="form-control-file">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- main card end -->

</div>
<!-- container end-->

@endsection 