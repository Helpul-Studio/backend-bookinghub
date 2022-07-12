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
                                        <h5>Ruangan</h5>
                                    </div>
                                    <div class="card-block">                                        
                                        <div class="text-right">
                                            <a href="#" class="btn btn-info my-2" id="addOutletRoom">Tambahkan Ruangan</a>
                                        </div>
                                        <div class="table-responsive">
                                            <table id="key-act-button" class="display table nowrap table-striped table-hover" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>Id Ruangan</th>
                                                        <th>Id Outlet</th>
                                                        <th>Nomor Ruang Outlet</th>
                                                        <th>Nama Ruang Outlet</th>
                                                        <th>Status Ruang Outlet</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Id Ruang Outlet</th>
                                                        <th>Id Outlet</th>
                                                        <th>Nomor Ruang Outlet</th>
                                                        <th>Nama Ruang Outlet</th>
                                                        <th>Status Ruang Outlet</th>
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
<div class="modal fade" id="modalOutletRoom" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="formTitle">Form Ruangan</h4>
                <button type="button" class="close" data-dismiss="modal" id="closeButton" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form id="formAddOutletRoom" method="POST">
                    <input type="hidden" name="id_outlet_room" id="id_outlet_room">
                    <div class="form-group">
                        <select name="id_outlet" id="id_outlet" class="form-control mb-1">
                            @foreach ($data as $outlet)
                                <option value="{{ $outlet->id_outlet}}">{{$outlet->outlet_name}}</option>
                            @endforeach
                        </select>
                        <input type="text" class="form-control mb-1" id="outlet_room_number" placeholder="Enter OutletRoomNumber" name="outlet_room_number">
                        <input type="text" class="form-control mb-1" id="outlet_room_name" placeholder="Enter OutletRoomName" name="outlet_room_name">
                        <select name="outlet_room_status" id="outlet_room_status" class="form-control">
                            <option value="available">Tersedia</option>
                            <option value="booked">Sudah di booking</option>
                        </select>
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
<script src="{{url('admin/assets/js/pages/outlet-room-crud.js')}}"></script>
<script src="{{url('admin/assets/plugins/data-tables/js/datatables.min.js')}}"></script>
@endpush