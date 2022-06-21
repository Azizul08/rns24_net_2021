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

                    <!-- manage row start -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table id="a" class="table table-bordered table-hover text-center align-item-center" >
                                    <thead class="text-center">
                                        <tr>
                                            <th scope="col">SI</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">Title</th>
                                            @can('superAdmin')
                                            <th scope="col">Action</th>
                                            @endcan
                                            @can('admin')
                                            <th scope="col">Action</th>
                                            @endcan
                                            @can('editor')
                                            <th scope="col">Action</th>
                                            @endcan
                                        </tr>
                                    </thead>
                                    <tbody id="adTable">
                                        @php 
                                            $i = 1 ;
                                        @endphp
                                        @foreach( $pnewses as $news )
                                        <tr class="text-center" data-id="{{ $news->id }}">
                                            <th scope="row">{{ $i }}</th>
                                            <th scope="row">
                                            @foreach( App\Models\Backend\Category\Category::orderBy('id','desc')->get() as $category )
                                            @if( $category->id == $news->category_id )
                                            <p class="badge badge-danger">{{ $category->name }}</p>
                                            @endif
                                            @endforeach
                                            </th>
                                            <th scope="row">{{ $news->title }}</th>
                                            
                                            @can('superAdmin')
                                            <td>
                                                 
                                                <button class="btn btn-primary edit" data-toggle="modal" data-target="#viewnews{{ $news->id }}">View</button>
                                                <!-- Modal -->
                                                <div class="modal fade bd-example-modal-lg" id="viewnews{{ $news->id }}" data-id="{{ $news->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">{{ $news->title }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body text-left">
                                                            <div class="row">
                                                                @if( $news->image == NULL )
                                                                <p class="badge badge-danger">No image uploaded</p>
                                                                @else
                                                                <div class="col-md-6">
                                                                    <div class="news-item">
                                                                        <h5>Image</h5>
                                                                        <img src="{{ asset('images/news/'. $news->image) }}" width="100%" alt="">
                                                                    </div>
                                                                </div>
                                                                @endif
                                                                
                                                                <div class="col-md-6">
                                                                    @if( $news->video == NULL )
                                                                    <p class="badge badge-danger">No video upload</p>
                                                                    @else
                                                                    <iframe src="{{ $news->video }}" frameborder="0"></iframe>
                                                                    @endif
                                                                    @if( $news->audio == NULL )
                                                                    <p class="badge badge-danger">No audio upload</p>
                                                                    @else
                                                                    <div class="news-item">
                                                                        <h5>News audio</h5>
                                                                        <audio src="{{ asset('audio/'.$news->audio .'/'. $news->audio) }}" controls></audio>
                                                                    </div>
                                                                    @endif
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="news-item">
                                                                <h5>Time : {{$news->created_at->diffForHumans()}}  </h5>
                                                            </div>
                                                            <div class="news-item">
                                                                <h5>Category</h5>
                                                                <p>
                                                                @foreach( App\Models\Backend\Category\Category::orderBy('id','desc')->get() as $category )
                                                                @if( $category->id == $news->category_id )
                                                                <p class="badge badge-success">{{ $category->name }}</p>
                                                                @endif
                                                                @endforeach
                                                                </p>
                                                            </div>
                                                            <div class="news-item">
                                                                <h5>Author</h5>
                                                                @foreach( App\User::orderBy('id','desc')->get() as $user )
                                                                @if( $user->id == $news->author_id )
                                                                <p class="badge badge-success">{{ $user->name }}</p>
                                                                @endif
                                                                @endforeach
                                                            </div>
                                                            <div class="news-item">
                                                                <h5>Title</h5>
                                                                <p>{{ $news->title }}</p>
                                                            </div>
                                                            <div class="news-item">
                                                                <h5>Description</h5>
                                                                <p>{!! $news->description !!}</p>
                                                            </div>
                                                            
                                                            <div class="row">

                                                                <div class="col-md-2">
                                                                    <h5>Status</h5>
                                                                    @if( $news->status == 0 )
                                                                    <p class="badge badge-danger">Inactive</p>
                                                                    @else
                                                                    <p class="badge badge-success">Active</p>
                                                                    @endif
                                                                </div>

                                                                <div class="col-md-2">
                                                                    <h5>Featured?</h5>
                                                                    @if( $news->is_featured == 0 )
                                                                    <p class="badge badge-danger">No</p>
                                                                    @else
                                                                    <p class="badge badge-success">Yes</p>
                                                                    @endif
                                                                </div>

                                                                <div class="col-md-2">
                                                                <h5>Trend?</h5>
                                                                    @if( $news->is_trend == 0 )
                                                                    <p class="badge badge-danger">No</p>
                                                                    @else
                                                                    <p class="badge badge-success">Yes</p>
                                                                    @endif
                                                                </div>

                                                                <div class="col-md-2">
                                                                <h5>Pending?</h5>
                                                                    @if( $news->is_pending == 0 )
                                                                    <p class="badge badge-danger">No</p>
                                                                    @else
                                                                    <p class="badge badge-success">Yes</p>
                                                                    @endif
                                                                </div>

                                                                
                                                                <div class="col-md-3">
                                                                <h5>Running news?</h5>
                                                                    @if( $news->is_running == 0 )
                                                                    <p class="badge badge-danger">No</p>
                                                                    @else
                                                                    <p class="badge badge-success">Yes</p>
                                                                    @endif
                                                                </div>
                                                                
                                                                <div class="col-md-3">
                                                                <h5>Breaking news?</h5>
                                                                    @if( $news->is_breakingNews == 0 )
                                                                    <p class="badge badge-danger">No</p>
                                                                    @else
                                                                    <p class="badge badge-success">Yes</p>
                                                                    @endif
                                                                </div>
                                                                

                                                            </div>
                                                            
                                                        </div>
                                                        <div class="modal-footer">
                                                        <form  action="{{ route('pendingnews.delete', $news->id ) }}" method="post">
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger " style="margin-left: 10px" >  Delete</button>
                                                        </form>
                                                        <form id="editnews" action="{{ route('pendingnews.update', $news->id ) }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="is_pending" value="0">
                                                            <button type="submit" class="btn btn-success " style="margin-left: 10px" >  approve</button>
                                                        </form>
                                                            <button type="button" class="btn btn-primary" data-dismiss="modal"> No</button>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div> 

                                                <a class="btn btn-success" href="{{ route('pendingnews.edit', $news->id) }}">Edit</a>
                                            </td>
                                            @endcan

                                            @can('admin')
                                            <td>
                                            
                                                <button class="btn btn-primary edit" data-toggle="modal" data-target="#viewnews{{ $news->id }}">View</button>
                                                <!-- Modal -->
                                                <div class="modal fade bd-example-modal-lg" id="viewnews{{ $news->id }}" data-id="{{ $news->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">{{ $news->title }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body text-left">
                                                            <div class="row">
                                                                @if( $news->image == NULL )
                                                                @else
                                                                <div class="col-md-6">
                                                                    <div class="news-item">
                                                                        <h5>Image</h5>
                                                                        <img src="{{ asset('images/news/'. $news->image) }}" width="100%" alt="">
                                                                    </div>
                                                                </div>
                                                                @endif
                                                                
                                                                <div class="col-md-6">
                                                                   @if( $news->video == NULL )
                                                                    <p class="badge badge-danger">No video upload</p>
                                                                    @else
                                                                    <iframe src="{{ $news->video }}" frameborder="0"></iframe>
                                                                    @endif
                                                                    @if( $news->audio == NULL )
                                                                    @else
                                                                    <div class="news-item">
                                                                        <h5>News audio</h5>
                                                                        <audio src="{{ asset('audio/'.$news->audio .'/'. $news->audio) }}" controls></audio>
                                                                    </div>
                                                                    @endif
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="news-item">
                                                                <h5>Time : {{$news->created_at->diffForHumans()}}  </h5>
                                                            </div>
                                                            <div class="news-item">
                                                                <h5>Category</h5>
                                                                <p>
                                                                @foreach( App\Models\Backend\Category\Category::orderBy('id','desc')->get() as $category )
                                                                @if( $category->id == $news->category_id )
                                                                <p class="badge badge-success">{{ $category->name }}</p>
                                                                @endif
                                                                @endforeach
                                                                </p>
                                                            </div>
                                                            <div class="news-item">
                                                                <h5>Author</h5>
                                                                @foreach( App\User::orderBy('id','desc')->get() as $user )
                                                                @if( $user->id == $news->author_id )
                                                                <p class="badge badge-success">{{ $user->name }}</p>
                                                                @endif
                                                                @endforeach
                                                            </div>
                                                            <div class="news-item">
                                                                <h5>Title</h5>
                                                                <p>{{ $news->title }}</p>
                                                            </div>
                                                            <div class="news-item">
                                                                <h5>Description</h5>
                                                                <p>{!! $news->description !!}</p>
                                                            </div>
                                                            
                                                            <div class="row">

                                                                <div class="col-md-2">
                                                                    <h5>Status</h5>
                                                                    @if( $news->status == 0 )
                                                                    <p class="badge badge-danger">Inactive</p>
                                                                    @else
                                                                    <p class="badge badge-success">Active</p>
                                                                    @endif
                                                                </div>

                                                                <div class="col-md-2">
                                                                    <h5>Featured?</h5>
                                                                    @if( $news->is_featured == 0 )
                                                                    <p class="badge badge-danger">No</p>
                                                                    @else
                                                                    <p class="badge badge-success">Yes</p>
                                                                    @endif
                                                                </div>

                                                                <div class="col-md-2">
                                                                <h5>Trend?</h5>
                                                                    @if( $news->is_trend == 0 )
                                                                    <p class="badge badge-danger">No</p>
                                                                    @else
                                                                    <p class="badge badge-success">Yes</p>
                                                                    @endif
                                                                </div>

                                                                <div class="col-md-2">
                                                                <h5>Pending?</h5>
                                                                    @if( $news->is_pending == 0 )
                                                                    <p class="badge badge-danger">No</p>
                                                                    @else
                                                                    <p class="badge badge-success">Yes</p>
                                                                    @endif
                                                                </div>

                                                                <div class="col-md-3">
                                                                <h5>Running news?</h5>
                                                                    @if( $news->is_running == 0 )
                                                                    <p class="badge badge-danger">No</p>
                                                                    @else
                                                                    <p class="badge badge-success">Yes</p>
                                                                    @endif
                                                                </div>
                                                                
                                                                <div class="col-md-3">
                                                                <h5>Breaking news?</h5>
                                                                    @if( $news->is_breakingNews == 0 )
                                                                    <p class="badge badge-danger">No</p>
                                                                    @else
                                                                    <p class="badge badge-success">Yes</p>
                                                                    @endif
                                                                </div>

                                                            </div>
                                                            
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form  action="{{ route('pendingnews.delete', $news->id ) }}" method="post">
                                                                @csrf
                                                                <button type="submit" class="btn btn-danger " style="margin-left: 10px" >  Delete</button>
                                                            </form>
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal"> Close</button>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div> 

                                                <a class="btn btn-success" href="{{ route('pendingnews.edit', $news->id) }}">Edit</a>
                                                
                                                
                                            </td>
                                            @endcan

                                            @can('editor')
                                            <td>
                                            
                                                <button class="btn btn-primary edit" data-toggle="modal" data-target="#viewnews{{ $news->id }}">View</button>
                                                <!-- Modal -->
                                                <div class="modal fade bd-example-modal-lg" id="viewnews{{ $news->id }}" data-id="{{ $news->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">{{ $news->title }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body text-left">
                                                            <div class="row">
                                                                @if( $news->image == NULL )
                                                                @else
                                                                <div class="col-md-6">
                                                                    <div class="news-item">
                                                                        <h5>Image</h5>
                                                                        <img src="{{ asset('images/news/'. $news->image) }}" width="100%" alt="">
                                                                    </div>
                                                                </div>
                                                                @endif
                                                                
                                                                <div class="col-md-6">
                                                                   @if( $news->video == NULL )
                                                                    <p class="badge badge-danger">No video upload</p>
                                                                    @else
                                                                    <iframe src="{{ $news->video }}" frameborder="0"></iframe>
                                                                    @endif
                                                                    @if( $news->audio == NULL )
                                                                    @else
                                                                    <div class="news-item">
                                                                        <h5>News audio</h5>
                                                                        <audio src="{{ asset('audio/'.$news->audio .'/'. $news->audio) }}" controls></audio>
                                                                    </div>
                                                                    @endif
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="news-item">
                                                                <h5>Time : {{$news->created_at->diffForHumans()}}  </h5>
                                                            </div>
                                                            <div class="news-item">
                                                                <h5>Category</h5>
                                                                <p>
                                                                @foreach( App\Models\Backend\Category\Category::orderBy('id','desc')->get() as $category )
                                                                @if( $category->id == $news->category_id )
                                                                <p class="badge badge-success">{{ $category->name }}</p>
                                                                @endif
                                                                @endforeach
                                                                </p>
                                                            </div>
                                                            <div class="news-item">
                                                                <h5>Author</h5>
                                                                @foreach( App\User::orderBy('id','desc')->get() as $user )
                                                                @if( $user->id == $news->author_id )
                                                                <p class="badge badge-success">{{ $user->name }}</p>
                                                                @endif
                                                                @endforeach
                                                            </div>
                                                            <div class="news-item">
                                                                <h5>Title</h5>
                                                                <p>{{ $news->title }}</p>
                                                            </div>
                                                            <div class="news-item">
                                                                <h5>Description</h5>
                                                                <p>{!! $news->description !!}</p>
                                                            </div>
                                                            
                                                            <div class="row">

                                                                <div class="col-md-2">
                                                                    <h5>Status</h5>
                                                                    @if( $news->status == 0 )
                                                                    <p class="badge badge-danger">Inactive</p>
                                                                    @else
                                                                    <p class="badge badge-success">Active</p>
                                                                    @endif
                                                                </div>

                                                                <div class="col-md-2">
                                                                    <h5>Featured?</h5>
                                                                    @if( $news->is_featured == 0 )
                                                                    <p class="badge badge-danger">No</p>
                                                                    @else
                                                                    <p class="badge badge-success">Yes</p>
                                                                    @endif
                                                                </div>

                                                                <div class="col-md-2">
                                                                <h5>Trend?</h5>
                                                                    @if( $news->is_trend == 0 )
                                                                    <p class="badge badge-danger">No</p>
                                                                    @else
                                                                    <p class="badge badge-success">Yes</p>
                                                                    @endif
                                                                </div>

                                                                <div class="col-md-2">
                                                                <h5>Pending?</h5>
                                                                    @if( $news->is_pending == 0 )
                                                                    <p class="badge badge-danger">No</p>
                                                                    @else
                                                                    <p class="badge badge-success">Yes</p>
                                                                    @endif
                                                                </div>

                                                                <div class="col-md-3">
                                                                <h5>Running news?</h5>
                                                                    @if( $news->is_running == 0 )
                                                                    <p class="badge badge-danger">No</p>
                                                                    @else
                                                                    <p class="badge badge-success">Yes</p>
                                                                    @endif
                                                                </div>

                                                            </div>
                                                            
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal"> Close</button>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div> 
                                                
                                                
                                            </td>
                                            @endcan
                                           
                                            
                                            
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