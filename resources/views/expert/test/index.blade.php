@extends('layouts.expert.master')
@section('title')
    Test Table
@endsection

@section('route_dashboard')
    <a href="{{route('expert.dashboard')}}" class="logo"></a>
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="container-full">

            <section class="content">
                <div class="row">

                    <div class="col-12">
                        <div class="box">
                            <div class="box-header d-flex justify-content-between align-items-center">
                                <h4 class="box-title">Test  Information</h4>
                                <a href="{{route('expert.test.create' , $skill_id)}}" class="btn btn-primary" style="margin-right: 20px; width: 20%">Add test </a>

                            </div>
                            <div class="box-body">
                                <div class="table-responsive">

                                    <table id="complex_header" class="table table-striped table-bordered display"
                                           style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>XP</th>
                                                <th>Question Count</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($tests as $test)
                                            <tr>
                                                <td>{{ $test->total_xp}}</td>
                                                <td>{{ $test->questions()->count()}}</td>
                                                <td>
                                                    <div class="d-flex flex-row">
                                                        <div class="btn-group">
                                                            <a href="{{ route('expert.test_question.index', $test->id) }}" type="button" class="btn btn-primary ml-3">View &rarr;</a>
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
