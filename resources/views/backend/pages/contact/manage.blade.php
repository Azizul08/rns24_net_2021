@extends('backend.template.layout')
@section('per_page_css')
<link href="{{asset('backend/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet"/>
@endsection
@section('per_page_js')
<script src="{{ asset('backend/assets/extra-libs/DataTables/datatables.min.js')}}"></script>
<script>
    $("#contact").DataTable();
</script>
@endsection
@section('main_card_content')

<!-- container start -->
<div class="container-fluid">

    <!-- title row start -->
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Contact</h4>
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
                            @if( session()->has('message') )
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Congratulation!</strong> {{ session()->get('message') }}
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

                    <!-- manage row start -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table id="contact" class="table table-bordered table-hover text-center align-item-center">
                                    <thead class="text-center">
                                        <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Facebook</th>
                                        <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php 
                                            $i = 1 ;
                                        @endphp
                                        @foreach( $contacts as $contact )
                                        <tr class="text-center">
                                            <th scope="row">{{ $i }}</th>
                                            <td>{{ $contact->address }}</td>
                                            <td>{{ $contact->email }}</td>
                                            <td>{{ $contact->phone }}</td>
                                            <td>{{ Str::limit($contact->f_link,15) }}</td>
                                            <td>

                                                <!-- edit modal start -->
                                                <button class="btn btn-primary" data-toggle="modal" data-target="#editcontact{{ $contact->id }}">Edit</button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="editcontact{{ $contact->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit contact</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                        <form action="{{ route('contact.update', $contact->id) }}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                                <div class="form-group">
                                                                    <label>Contact Address</label>
                                                                    <input type="text" class="form-control" name="address" value="{{ $contact->address }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Email</label>
                                                                    <input type="text" class="form-control" name="email" value="{{ $contact->email }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Phone Number</label>
                                                                    <input type="text" class="form-control" name="phone" value="{{ $contact->phone }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Facebook Link</label>
                                                                    <input type="text" class="form-control" name="f_link" value="{{ $contact->f_link }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
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