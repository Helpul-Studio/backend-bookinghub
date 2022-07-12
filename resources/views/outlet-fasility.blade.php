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
                                        <h5>Fasilitas Outlet</h5>
                                    </div>
                                    <div class="card-block">
                                        <div class="text-right">
                                            <a href="#" class="btn btn-info my-2" id="addOutletFacility">Tambahkan Fasilitas</a>
                                        </div>
                                        <div class="table-responsive">
                                            <table id="key-act-button" class="display table nowrap table-striped table-hover" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>Id Fasilitas</th>
                                                        <th>Id Outlet</th>
                                                        <th>Icon Fasilitas</th>
                                                        <th>Deskripsi Facility</th>
                                                        <th>Created At</th>
                                                        <th>Updated At</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Id Outlet Fasilitas</th>
                                                        <th>Id Outlet</th>
                                                        <th>Icon Fasilitas</th>
                                                        <th>Deskripsi Facility</th>
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
<div class="modal fade" id="modalOutletFacility" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="formTitle">Form Fasilitas</h4>
                <button type="button" class="close" data-dismiss="modal" id="closeButton" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form id="formAddOutletFasility" method="POST">
                    <input type="hidden" name="id_outlet_facility" id="id_outlet_facility">
                    <div class="form-group">
                        <select name="id_outlet" id="id_outlet" class="form-control mb-1">
                            @foreach ($data as $outletFacility)
                                <option value="{{$outletFacility->id_outlet}}">{{$outletFacility->outlet_name}}</option>
                            @endforeach
                        </select>
                        <input type="file" class="form-control mb-1" id="icon_outlet_facility" placeholder="Enter icon Outlet Facility" name="icon_outlet_facility" required> 
                        <input type="text" class="form-control mb-1" id="description_outlet_facility" placeholder="Enter description Outlet Facility" name="description_outlet_facility" required>
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

@push('outlet-fasility')
    <script src="{{url('admin/assets/js/pages/outlet-fasility.js')}}"></script>
    <script src="{{url('admin/assets/js/pages/outlet-facility-crud.js')}}"></script>
    
    <script src="{{url('admin/assets/plugins/data-tables/js/datatables.min.js')}}"></script>
@endpush