@extends('layouts.admin')

@push('scripts')
    <script src="{{url('admin/assets/js/pages/tbl-datatable-custom.js')}}"></script>
@endpush

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
                                        <h5>HTML5 Export Button</h5>
                                    </div>
                                    <div class="card-block">
                                        <p>This example demonstrates these four button types with their default options. The other examples in this section demonstrate some of the options available.</p>
                                        <div class="text-right">
                                            <a href="#" class="btn btn-info my-2" id="addOutlet">Add Outlet</a>
                                        </div>
                                        <div class="table-responsive">
                                            <table id="key-act-button" class="display table nowrap table-striped table-hover" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>Id Outlet Room</th>
                                                        <th>Id Outlet</th>
                                                        <th>Outlet Room Number</th>
                                                        <th>Outlet Room Name</th>
                                                        <th>Outlet Room Status</th>
                                                        <th>Created At</th>
                                                        <th>Updated At</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                    <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Id Outlet Room</th>
                                                        <th>Id Outlet</th>
                                                        <th>Outlet Room Number</th>
                                                        <th>Outlet Room Name</th>
                                                        <th>Outlet Room Status</th>
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
<div class="modal fade" id="modalOutletFacility" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="formTitle">Form Input</h4>
                <button type="button" class="close" data-dismiss="modal" id="closeButton" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form id="formAddOutlet" method="POST">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <input type="text" class="form-control" id="IdOutlet" placeholder="Enter IdOutlet" name="IdOutlet">
                        <input type="text" class="form-control" id="OutletRoomNumber" placeholder="Enter OutletRoomNumber" name="OutletRoomNumber"> 
                        <input type="text" class="form-control" id="OutletRoomName" placeholder="Enter OutletRoomName" name="OutletRoomName"> 
                        <input type="text" class="form-control" id="Status" placeholder="Enter Status" name="Status">                        
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

@push('outlet-room')
    <script src="{{url('admin/assets/js/pages/outlet-room.js')}}"></script>
    <script src="{{url('admin/assets/plugins/data-tables/js/datatables.min.js')}}"></script>
@endpush