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
            <h4 class="page-title">Edit user</h4>
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
                            <!-- reset failed message -->
                            @if( session()->has('resetfailed') )
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Sorry!</strong> {{ session()->get('resetfailed') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                            
                             <!-- reset success message -->
                            @if( session()->has('reset') )
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Congratulations!</strong> {{ session()->get('reset') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ route('user.update', $user->id ) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="name" required value="{{ $user->name }}">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email" required value="{{ $user->email }}">
                        </div>
                        <div class="form-group">
                            <label>Please select user role</label>
                            @if( $roles->count() > 0 )
                            @foreach( $roles as $role )
                            @if( $role->id != 1 )
                                <div class="form-check">
                                    <input 
                                    type="radio"
                                    @foreach ($user->roles as $rol)
                                        @if ($rol->id == $role->id)
                                            checked
                                        @endif
                                        @if( $role->id == 1 )
                                        disabled
                                        @endif
                                    @endforeach
                                    name="roles[]" value="{{ $role->id }}">
                                    <label> {{ $role->name }}</label>
                                </div>
                            @endif
                            @endforeach
                            @else
                            <div class="alert alert-warning">Please add user role first</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                        </div>
                    </div>
                    
                    <!-- change password start -->
                    @can('superAdmin')
                    <div class="row changepass">
                        <div class="col-md-12">
                            <form action="{{ route('password.reset', $user->id) }}" method="post">
                                @csrf
    
                                <div class="form-group">
                                    <input type="password" placeholder="Enter New password" name="password" class="form-control" required="">
                                </div>
    
                                <div class="form-group">
                                    <input type="password" placeholder="Re-Enter New password" name="cpassword" class="form-control" required="">
                                </div>
    
                                <button type="submit" class="btn btn-success">Reset Password</button>
                            </form>
                        </div>
                    </div>
                    @endcan
                    <!-- change password end -->
                </div>
                
            </div>
        </div>
    </div>
    <!-- main card end -->

</div>
<!-- container end-->

@endsection 