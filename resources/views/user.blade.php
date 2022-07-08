@extends('layouts.admin')

@section('content')
<!-- [ Main Content ] start -->
<section class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <!-- [ breadcrumb ] start -->
                <div class="page-header">
                    <div class="page-block">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="page-header-title">
                                    <h5 class="m-b-10">Data Tables</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="#!">Table</a></li>
                                    <li class="breadcrumb-item"><a href="#!">Data Tables</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- [ breadcrumb ] end -->
                <div class="main-body">
                    <div class="page-wrapper">
                        <!-- [ Main Content ] start -->
                        <div class="row">
                            <!-- [ HTML5 Export button ] start -->
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Outlet</h5>
                                    </div>
                                    <div class="card-block">
                                        <div class="text-right">
                                            <a href="#" class="btn btn-info my-2" id="addUser">Add Outlet</a>
                                        </div>
                                        <div class="table-responsive">
                                            <table id="key-act-button" class="display table nowrap table-striped table-hover" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>Id User</th>
                                                        <th>Nama</th>
                                                        <th>Email</th>
                                                        <th>Gender</th>
                                                        <th>Tahun Lahir</th>
                                                        <th>Role</th>
                                                        <th>Nomor HP</th>
                                                        <th>Foto Profile</th>
                                                        <th>Created At</th>
                                                        <th>Updated At</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Id User</th>
                                                        <th>Nama</th>
                                                        <th>Email</th>
                                                        <th>Gender</th>
                                                        <th>Tahun Lahir</th>
                                                        <th>Role</th>
                                                        <th>Nomor HP</th>
                                                        <th>Foto Profile</th>
                                                        <th>Created At</th>
                                                        <th>Updated At</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- [ HTML5 Export button ] end -->
                        </div>
                        <!-- [ Main Content ] end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="modalUser" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="formTitle">Form Input</h4>
                <button type="button" class="close" data-dismiss="modal" id="closeButton"
                    aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form id="formAddUser" method="POST">
                    <input type="hidden" name="id_user" id="id_user">
                    <div class="form-group">
                        <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
                        <input type="text" class="form-control" id="email" placeholder="Enter Email" name="email">
                        <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
                        <input type="text" class="form-control" id="gender" placeholder="Enter Gender" name="gender">
                        <input type="text" class="form-control" id="date_of_birth" placeholder="Enter Tanggal Lahir" name="date_of_birth">
                        <input type="text" class="form-control" id="role" placeholder="Enter Role" name="role">
                        <input type="text" class="form-control" id="phone_number" placeholder="Enter Phone Number" name="phone_number">
                        <input type="text" class="form-control" id="photo_profile" placeholder="Enter Foto Profile" name="photo_profile">
                    </div>
                    <div class="text-right">
                        <button type="submit" id="submitButton" class="btn btn-success waves-effect waves-light mr-2">Submit</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
@endsection

@push('outlet')
    <script src="{{url('admin/assets/js/pages/user.js')}}"></script>
    <!-- <script src="{{url('admin/assets/js/pages/user-crud.js')}}"></script> -->
    <script src="{{url('admin/assets/js/pages/user-crud.js')}}"></script>
    <script src="{{url('admin/assets/plugins/data-tables/js/datatables.min.js')}}"></script>
@endpush