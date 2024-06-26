@extends('layouts.admin.master')
@section('title')
    Mobile User Table
@endsection

@section('route_dashboard')
    <a href="{{route('admin.dashboard')}}" class="logo"></a>
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="container-full">

            <section class="content">
                <div class="row">

                    <div class="col-12">
                        <div class="box">
                            <div class="box-header d-flex justify-content-between align-items-center">
                                <h4 class="box-title">Mobile User Information</h4>
                            </div>
                            <div class="box-body">
                                <div class="table-responsive">

                                    <table id="complex_header" class="table table-striped table-bordered display"
                                           style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>name</th>
                                                <th>email</th>
                                                <th>birth_date</th>
                                                <th>IS IT Student</th>
                                                <th>University</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($mobile_users as $mobile_user)
                                            <tr>
                                                <td>{{ $mobile_user->name}}</td>
                                                <td>{{ $mobile_user->email}}</td>
                                                <td>{{ $mobile_user->birth_date}}</td>
                                                <td>{{ $mobile_user->it_student}}</td>
                                                <td>{{ $mobile_user->university}}</td>
                                                <td>
                                                    <div class="d-flex flex-row">
                                                        <div class="btn-group">
                                                            @if($mobile_user->type=='normal')
                                                                <a href="{{route('admin.mobile_user.block',$mobile_user->id)}}" type="button" class="btn btn-danger ml-3">Blocked</a>
                                                            @elseif($mobile_user->type=='blocked')
                                                                <a href="{{route('admin.mobile_user.block',$mobile_user->id)}}" type="button" class="btn btn-success ml-3">UnBlocked</a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>


@endsection

@section('scripts')

    <script src="{{ \Illuminate\Support\Facades\URL::asset('assets/vendor_components/datatable/datatables.min.js')}}"></script>
    <script src="{{ \Illuminate\Support\Facades\URL::asset('dashboard/js/pages/data-table.js')}}"></script>

@endsection
