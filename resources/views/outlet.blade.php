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
                                            <a href="#" class="btn btn-info my-2" id="addOutlet">Tambahkan Outlet</a>
                                        </div>
                                        <div class="table-responsive">
                                            <table id="key-act-button" class="display table nowrap table-striped table-hover" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>Id Outlet</th>
                                                        <th>Nama Outlet</th>
                                                        <th>Jam Buka</th>
                                                        <th>Jam Tutup</th>
                                                        <th>No HP</th>
                                                        <th>Instagram Link</th>
                                                        <th>Harga Per-Jam</th>
                                                        <th>Created At</th>
                                                        <th>Updated At</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Id Outlet</th>
                                                        <th>Nama Outlet</th>
                                                        <th>Jam Buka</th>
                                                        <th>Jam Tutup</th>
                                                        <th>No HP</th>
                                                        <th>Instagram Link</th>
                                                        <th>Harga Per-Jam</th>
                                                        <th>Created At</th>
                                                        <th>Updated At</th>
                                                        <th>Aksi</th>
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
<div class="modal fade" id="modalOutlet" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="formTitle">Form Outlet</h4>
                <button type="button" class="close" data-dismiss="modal" id="closeButton" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form id="formAddOutlet" method="POST">
                    <input type="hidden" name="id_outlet" id="id_outlet">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control mb-1" id="outlet_name" placeholder="Enter outlet_name" name="outlet_name">
                            <input type="text" class="form-control mb-1" id="opening_hours" placeholder="Enter Opening Hours" name="opening_hours">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control mb-1" id="closing_hours" placeholder="Enter Closing Hours" name="closing_hours">
                            <input type="text" class="form-control mb-1 mob_no" id="outlet_phone" placeholder="No HP: 0811-1111-1111" name="outlet_phone" data-mask="9999-9999-9999">
                            <input type="text" class="form-control mb-1" id="instagram_link" placeholder="Enter instagram Link" name="instagram_link">
                            <input type="text" class="form-control mb-1" id="price_outlet_per_hour" placeholder="Enter Price Per Hours" name="price_outlet_per_hour">
                        </div>
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
<script src="{{url('admin/assets/js/pages/outlet.js')}}"></script>
<script src="{{url('admin/assets/js/pages/outlet-crud.js')}}"></script>
<script src="{{url('admin/assets/plugins/data-tables/js/datatables.min.js')}}"></script>
@endpush