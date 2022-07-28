@extends('layouts.admin')

@section('content')
<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <!-- [ breadcrumb ] start -->
                <div class="page-header">
                    <div class="page-block">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="page-header-title">
                                    <h5 class="m-b-10">Dashboard</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- [ breadcrumb ] end -->
                <div class="main-body">
                    <div class="page-wrapper">
                        <!-- [ Main Content ] start -->
                        <div class="row">
                            <!-- [Register-user section] start -->
                            <div class="col-md-12 col-xl-4">
                                <div class="card user-card">
                                    <div class="card-block">
                                        <h5 class="m-b-15">Register User</h5>
                                        <h4 class="f-w-300 mb-3">1205</h4>
                                        <span class="text-muted"><label class="label theme-bg text-white f-12 f-w-400">20%</label>Monthly Increase</span>
                                    </div>
                                </div>
                            </div>
                            <!-- [Register-user section] end -->

                            <!-- [Daily-user section] start -->
                            <div class="col-md-6 col-xl-4">
                                <div class="card user-card">
                                    <div class="card-block">
                                        <h5 class="f-w-400 m-b-15">Daily User</h5>
                                        <h4 class="f-w-300 mb-3">467</h4>
                                        <span class="text-muted"><label class="label theme-bg text-white f-12 f-w-400">10%</label>Weekly Increase</span>
                                    </div>
                                </div>
                            </div>
                            <!-- [Daily-user section] end -->

                            <!-- [Premium-user section] start -->
                            <div class="col-md-6 col-xl-4">
                                <div class="card user-card">
                                    <div class="card-block">
                                        <h5 class="f-w-400 m-b-15">Premium User</h5>
                                        <h4 class="f-w-300 mb-3">346</h4>
                                        <span class="text-muted"><label class="label theme-bg text-white f-12 f-w-400">50%</label>Yearly Increase</span>
                                    </div>
                                </div>
                            </div>
                            <!-- [Premium-user section] end -->

                            <!-- [ Transactions chart ] end -->
                        </div>
                        <!-- [ Main Content ] end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection