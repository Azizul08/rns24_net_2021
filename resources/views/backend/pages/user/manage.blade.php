@extends('backend.template.layout')
@section('per_page_css')
<link href="{{asset('backend/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet"/>
@endsection
@section('per_page_js')
<script src="{{ asset('backend/assets/extra-libs/DataTables/datatables.min.js')}}"></script>
<script>
    $("#user").DataTable();
</script>
@endsection
@section('main_card_content')

<!-- container start -->
<div class="container-fluid">

    <!-- title row start -->
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Manage user</h4>
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

                    <!-- add row start -->
                    <div class="row">
                        <div class="col-md-12 text-right">
                            @can('superAdmin')
                            <button class="btn btn-warning" data-toggle="modal" data-target="#adduser">Add user</button>
                            @endcan
                            <!-- Modal -->
                            <div class="modal fade" id="adduser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add New user</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('user.create') }}" method="POST" >
                                            @csrf
                                                <div class="form-group">
                                                    <label>Username</label>
                                                    <input type="text" class="form-control" name="name" required >
                                                </div>
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" class="form-control" name="email" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input type="text" class="form-control" name="password" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Confirm Password</label>
                                                    <input type="password" class="form-control" name="cpassword" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Please select user role</label>
                                                    @if( $roles->count() > 0 )
                                                    @foreach( $roles as $role )
                                                        <div class="form-check">
                                                            <input 
                                                            @if( $role->id == 1 )
                                                            disabled
                                                            @endif
                                                            type="radio" name="roles[]" value="{{ $role->id }}">
                                                            <label> {{ $role->name }}</label>
                                                        </div>
                                                    @endforeach
                                                    @else
                                                    <div class="alert alert-warning">Please add user role first</div>
                                                    @endif
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
                                <table id="user" class="table table-bordered table-hover text-center align-item-center">
                                    <thead class="text-center">
                                        <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Role</th>
                                        @can('superAdmin')
                                        <th scope="col">Action</th>
                                        @endcan
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php 
                                            $i = 1 ;
                                        @endphp
                                        @foreach( $users as $user )
                                        <tr class="text-center">
                                            <th scope="row">{{ $i }}</th>
                                            <th scope="row">{{ $user->name }}</th>
                                            <th scope="row">{{ $user->email }}</th>
                                            <th scope="row">{{ implode(',', $user->roles()->get()->pluck('name')->toArray() ) }}</th>

                                            @can('superAdmin')
                                            <td>

                                                <!-- edit modal start -->
                                                @can('superAdmin')
                                                    <a class="btn btn-primary" href="{{ route('user.edit', $user->id) }}">Edit</a>
                                                @endcan
                                                

                                                @can('superAdmin')
                                                @foreach( $user->roles as $rol )
                                                @if( $rol->id == 1 )
                                                @else
                                                <button class="btn btn-danger" data-toggle="modal" data-target="#deleteuser{{ $user->id }}">Delete</button>
                                                @endif
                                                @endforeach
                                                @endcan
                                                <!-- Modal -->
                                                <div class="modal fade" id="deleteuser{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Are you sure want to delete "{{ $user->name }}" ?</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="{{ route('user.delete', $user->id) }}" method="POST">
                                                                @csrf
                                                                <button type="submit" class="btn btn-success">Yes</button>
                                                            </form>
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
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