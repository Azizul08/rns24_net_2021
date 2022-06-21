@extends('backend.template.layout')
@section('per_page_css')
<link href="{{asset('backend/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet"/>
@endsection
@section('per_page_js')
<script src="{{ asset('backend/assets/extra-libs/DataTables/datatables.min.js')}}"></script>
<script>
    $("#about").DataTable();
    $("#team").DataTable();
</script>
@endsection
@section('main_card_content')

<!-- container start -->
<div class="container-fluid">

    <!-- title row start -->
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">About Page</h4>
        </div>
    </div>
    <!-- title row end -->

    <!-- about information card card start -->
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

                    <div class="row">
                        <div class="col-md-12">
                            <h5>Manage about information</h5>
                        </div>
                    </div>

                    <!-- manage row start -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table id="about" class="table table-bordered table-hover text-center align-item-center">
                                    <thead class="text-center">
                                        <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Information</th>
                                        <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php 
                                            $i = 1 ;
                                        @endphp
                                        @foreach( $abouts as $about )
                                        <tr class="text-center">
                                            <th scope="row">{{ $i }}</th>
                                            <td>
                                                <img src="{{ asset('images/about/' . $about->image ) }}" class="img-fluid" width="50px"  alt="">
                                            </td>
                                            <td>{!! Str::limit($about->info,100) !!}</td>
                                            <td>

                                                <!-- edit modal start -->
                                                <a class="btn btn-primary" href="{{ route('about.edit', $about->id ) }}">Edit</a>

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
    <!-- about information card card end -->














    <!-- team member card start -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-12">
                            <h5>Manage Team Member</h5>
                        </div>
                    </div>

                    <!-- add row start -->
                    <div class="row">
                        <div class="col-md-12 text-right">
                            @can('superAdmin')
                            <button class="btn btn-warning" data-toggle="modal" data-target="#addteam">Add Team Member</button>
                            @endcan
                            @can('admin')
                            <button class="btn btn-warning" data-toggle="modal" data-target="#addteam">Add Team Member</button>
                            @endcan
                            <!-- Modal -->
                            <div class="modal fade" id="addteam" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add New Team Member</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('team.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                            <div class="form-group">
                                                <label >Name*</label>
                                                <input type="text" class="form-control" name="name" required>
                                            </div>
                                            <div class="form-group">
                                                <label >Designation*</label>
                                                <input type="text" class="form-control" name="designation">
                                            </div>
                                            <div class="form-group">
                                                <label >Description</label>
                                                <textarea name="description" rows="3" class="form-control"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Upload Image </label> <br>
                                                <img src="{{ asset('images/image-preview.png') }}" id="image_preview_container" width="100px" alt=""> <br> <br>
                                                <input type="file" id="image" class="form-control-file" name="image" required>
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
                        </div>
                    </div>
                    <!-- add row end -->

                    <!-- manage row start -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table id="team" class="table table-bordered table-hover text-center align-item-center">
                                    <thead class="text-center">
                                        <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Designation</th>
                                        <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php 
                                            $i = 1 ;
                                        @endphp
                                        @foreach( $teams as $team )
                                        <tr class="text-center">
                                            <th scope="row">{{ $i }}</th>
                                            <td>
                                                <img src="{{ asset('images/team/' . $team->image ) }}" class="img-fluid" width="50px"  alt="">
                                            </td>
                                            <td>{{ $team->name }}</td>
                                            <td>{{ $team->designation }}</td>
                                            <td>

                                                <button class="btn btn-primary" data-toggle="modal" data-target="#editteam{{ $team->id }}">Edit</button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="editteam{{ $team->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit Team Member</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('team.update', $team->id) }}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                                <div class="form-group">
                                                                    <label >Name*</label>
                                                                    <input type="text" class="form-control" name="name" required value="{{ $team->name }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label >Designation*</label>
                                                                    <input type="text" class="form-control" name="designation" value="{{ $team->designation }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label >Description</label>
                                                                    <textarea name="description" rows="3" class="form-control">{{ $team->description }}</textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Upload Image </label> <br>
                                                                    <img src="{{ asset('images/team/'. $team->image ) }}"  width="150px" alt=""> <br> <br>
                                                                    <input type="file" id="image" class="form-control-file" name="image">
                                                                </div>
                                                                <div class="form-group">
                                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- delete modal -->
                                                @can('superAdmin')
                                                <button class="btn btn-warning" data-toggle="modal" data-target="#deleteteam{{ $team->id }}">Delete</button>
                                                @endcan
                                                <!-- Modal -->
                                                <div class="modal fade" id="deleteteam{{ $team->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Delete Team Member</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="{{ route('team.delete', $team->id) }}" method="post">
                                                                @csrf
                                                            <button type="submit" class="btn btn-success" >Yes</button>
                                                            </form>
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
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
    <!-- team member card end -->

</div>
<!-- container end-->

@endsection 