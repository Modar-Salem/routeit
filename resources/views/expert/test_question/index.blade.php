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
                                <a href="{{route('expert.test_question.create',$test_id)}}" class="btn btn-primary" style="margin-right: 20px; width: 20%">Add new Test Question </a>

                            </div>
                            <div class="box-body">
                                <div class="table-responsive">

                                    <table id="complex_header" class="table table-striped table-bordered display"
                                           style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Question</th>
                                                <th>XP</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($test_questions as $test_question)
                                            <tr>
                                                <td>{{ $test_question->question}}</td>
                                                <td>{{ $test_question->xp}}</td>
                                                <td>
                                                    <div class="d-flex flex-row">
                                                        <div class="btn-group">
                                                            <a href="{{ route('expert.test_question.show', $test_question->id) }}" type="button" class="btn btn-primary ml-3">View &rarr;</a>
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
