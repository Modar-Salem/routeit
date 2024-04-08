@extends('layouts.admin.master')
@section('title')
    Admin Dashboard
@endsection
    @section('route_dashboard')
        <a href="{{route('admin.dashboard')}}" class="logo">
    @endsection

@section('content')

    <div class="content-wrapper">
        <div class="container-full">
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xl-8 col-12">
                        <div class="row">
                            <div class="col-xl-3 col-md-6 col-6">
                                <div class="box">
                                    <div class="box-body text-center">
                                        <div class="bg-primary-light rounded10 p-20 mx-auto w-100 h-100">
                                            <img src="../images/svg-icon/medical/icon-1.svg" class="" alt="" />
                                        </div>
                                        <p class="text-fade mt-15 mb-5">Total Patients</p>
                                        <h2 class="mt-0">1,548</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 col-6">
                                <div class="box">
                                    <div class="box-body text-center">
                                        <div class="bg-danger-light rounded10 p-20 mx-auto w-100 h-100">
                                            <img src="../images/svg-icon/medical/icon-2.svg" class="" alt="" />
                                        </div>
                                        <p class="text-fade mt-15 mb-5">Consulation</p>
                                        <h2 class="mt-0">448</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 col-6">
                                <div class="box">
                                    <div class="box-body text-center">
                                        <div class="bg-warning-light rounded10 p-20 mx-auto w-100 h-100">
                                            <img src="../images/svg-icon/medical/icon-3.svg" class="" alt="" />
                                        </div>
                                        <p class="text-fade mt-15 mb-5">Staff</p>
                                        <h2 class="mt-0">848</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 col-6">
                                <div class="box">
                                    <div class="box-body text-center">
                                        <div class="bg-info-light rounded10 p-20 mx-auto w-100 h-100">
                                            <img src="../images/svg-icon/medical/icon-4.svg" class="" alt="" />
                                        </div>
                                        <p class="text-fade mt-15 mb-5">Total Rooms</p>
                                        <h2 class="mt-0">3,100</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
    </div>


@endsection
