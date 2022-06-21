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
                            @if( session()->has('restored') )
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Congratulation!</strong> {{ session()->get('restored') }}
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
                            @can('superAdmin')
                            <button class="btn btn-danger" data-toggle="modal" data-target="#restore_all">Restore All News</button>
                            @endcan
                            <!-- Modal -->
                            <div class="modal fade" id="restore_all" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Are you sure want to Restore All news ?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="{{ route('news.restore.all') }}" class="btn btn-success">Yes</a>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                                <button class="btn btn-danger" data-toggle="modal" data-target="#deletenews{{ $news->id }}">Restore</button>
                                                @endcan
                                                <!-- Modal -->
                                                <div class="modal fade" id="deletenews{{ $news->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Are you sure want to Restore this news ?</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="{{ route('news.restore', $news->id) }}" method="POST">
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