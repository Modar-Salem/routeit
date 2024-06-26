@extends('layouts.admin.master')
@section('title')
    Experts Table
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
                                <h4 class="box-title">Expert Information</h4>
                            </div>
                            <div class="box-body">
                                <div class="table-responsive">

                                    <table id="complex_header" class="table table-striped table-bordered display"
                                           style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>name</th>
                                                <th>email</th>
                                                <th>Bio</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($experts as $expert)
                                            <tr>
                                                <td>{{ $expert->name}}</td>
                                                <td>{{ $expert->email}}</td>
                                                <td>{{ $expert->bio}}</td>
                                                <td>
                                                    <div class="d-flex flex-row">
                                                        <div class="btn-group">
                                                            @if($expert->type=='normal')
                                                                <a href="{{route('admin.expert.block',$expert->id)}}" type="button" class="btn btn-danger ml-3">Blocked</a>
                                                            @elseif($expert->type=='blocked')
                                                                <a href="{{route('admin.expert.block',$expert->id)}}" type="button" class="btn btn-success ml-3">UnBlocked</a>
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
