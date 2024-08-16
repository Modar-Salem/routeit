@extends('layouts.expert.master')
@section('title')
    Skill Content Table
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
                                <h4 class="box-title">RoadMap Skills Content Information</h4>
                                <a href="{{route('expert.skills.create' , $roadmap_id)}}" class="btn btn-primary" style="margin-right: 20px; width: 20%">Add Skill</a>
                            </div>
                            <div class="box-body">
                                <div class="table-responsive">

                                    <table id="complex_header" class="table table-striped table-bordered display"
                                           style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($skills as $skill)
                                            <tr>
                                                <td>{{ $skill->title}}</td>
                                                <td>
                                                    <div class="d-flex flex-row">
                                                        <div class="btn-group">
                                                            <form action="{{ route('expert.skills.destroy', $skill) }}" method="POST" onsubmit="return confirm('Delete?')">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="waves-effect waves-light btn btn-danger-light  ml-3" style="width:100%; height: 100% ;">Delete</button>
                                                            </form>
                                                            <a href="{{ route('expert.skills.edit', $skill) }}" type="button" class="waves-effect waves-light btn btn-warning-light  ml-3">Edit</a>
                                                            <a href="{{ route('expert.test.index', $skill) }}" type="button" class="waves-effect waves-light btn btn-success-light  ml-3">Add Test</a>
                                                            <a href="{{ route('expert.skills_content.index', $skill) }}" type="button" class="btn btn-primary ml-3">Add Video OR Blogs &rarr;</a>
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
