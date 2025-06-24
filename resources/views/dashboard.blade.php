@extends('layouts.admin.master')
@section('title')
    Dashboard
@endsection
@section('content')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <!-- Sales Overview -->
            <div class="col-lg-3 col-sm-6 mb-4">
                <div class="card bg-success text-white">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div class="btn bg-label-white p-2 rounded">
                                <i class="fa fa-users fa-3x text-white"></i>
                            </div>
                            <div class="text-end">
                                <small class="d-block mb-1 text-white h5">Total Users</small>
                                <h4 class=" text-white mb-1">100</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 mb-4">
                <a href="/admin/category" class="card bg-danger text-white">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div class="btn bg-label-white p-2 rounded">
                                <i class="fa fa-sitemap fa-3x text-white"></i>
                            </div>
                            <div class="text-end">
                                <small class="d-block mb-1 text-white h5">Total Category</small>
                                <h4 class=" text-white mb-1">{{$total_category}}</h4>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-sm-6 mb-4">
                <a href="/admin/festival" class="card bg-info text-white">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div class="btn bg-label-white p-2 rounded">
                                <i class="fa fa-gift fa-3x text-white"></i>
                            </div>
                            <div class="text-end">
                                <small class="d-block mb-1 text-white h5">Total Festival</small>
                                <h4 class=" text-white mb-1">{{$total_festival}}</h4>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-sm-6 mb-4">
                <a href="/admin/business_category" class="card bg-warning text-white">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div class="btn bg-label-white p-2 rounded">
                                <i class="fa fa-building fa-3x text-white"></i>
                            </div>
                            <div class="text-end">
                                <small class="d-block mb-1 text-white h5">Total Business</small>
                                <h4 class=" text-white mb-1">{{$total_business}}</h4>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-sm-6 mb-4">
                <div class="card ">
                    <div class="card-body p-2">
                        <div class="d-flex justify-content-">
                            <div class="bg-info p-3 rounded">
                                <i class="fa fa-calendar-day fa-2x text-white"></i>
                            </div>
                            <div class="ms-3 text-info">
                                <div class="h5 text-info fw-bold mb-1">
                                  Today Payment
                                </div>
                                <div class="h4 text-info fw-bold mb-1">
                                  INR  399.0
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 mb-4">
                <div class="card ">
                    <div class="card-body p-2">
                        <div class="d-flex justify-content-">
                            <div class="bg-success p-3 rounded">
                                <i class="fa fa-calendar-week fa-2x text-white"></i>
                            </div>
                            <div class="ms-3 text-success">
                                <div class="h5 text-success fw-bold mb-1">
                                  Weekly Payment
                                </div>
                                <div class="h4 text-success fw-bold mb-1">
                                  INR  399.0
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 mb-4">
                <div class="card ">
                    <div class="card-body p-2">
                        <div class="d-flex justify-content-">
                            <div class="bg-primary p-3 rounded">
                                <i class="fa fa-calendar-alt fa-2x text-white"></i>
                            </div>
                            <div class="ms-3 text-primary">
                                <div class="h5 text-primary fw-bold mb-1">
                                  Monthly Payment
                                </div>
                                <div class="h4 text-primary fw-bold mb-1">
                                  INR  399.0
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 mb-4">
                <div class="card ">
                    <div class="card-body p-2">
                        <div class="d-flex justify-content-">
                            <div class="bg-danger p-3 rounded">
                                <i class="fa fa-wallet fa-2x text-white"></i>
                            </div>
                            <div class="ms-3 text-danger">
                                <div class="h5 text-danger fw-bold mb-1">
                                  Total Payment
                                </div>
                                <div class="h4 text-danger fw-bold mb-1">
                                  INR  399.0
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Sales Overview -->





        </div>
    </div>
    <!-- / Content -->
@endsection
