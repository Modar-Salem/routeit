@extends('layouts.expert.master')
@section('title')
    Skills Table
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
                                <h4 class="box-title">Skill Content Information</h4>
                                <a href="{{route('expert.skills_content.create' , $skill_id)}}" class="btn btn-primary" style="margin-right: 20px; width: 20%">Add Video or Blog</a>

                            </div>
                            <div class="box-body">
                                <div class="table-responsive">

                                    <table id="complex_header" class="table table-striped table-bordered display"
                                           style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Type</th>
                                                <th>Title</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($videos as $skill_content)
                                            <tr>
                                                <td>Video</td>
                                                <td>{{ $skill_content->title}}</td>
                                                <td>
                                                    <div class="d-flex flex-row">
                                                        <div class="btn-group">
                                                            <form action="{{ route('expert.skills_content.destroy', $skill_content) }}" method="POST" onsubmit="return confirm('Delete?')">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="waves-effect waves-light btn btn-danger-light  ml-3" style="width:100%; height: 100% ;">Delete</button>
                                                            </form>
                                                            <a href="{{ route('expert.skills_content.show-video', $skill_content) }}" type="button" class="btn btn-primary ml-3">Show Video &rarr;</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @foreach($blogs as $skill_content)
                                            <tr>
                                                <td>Blogs</td>
                                                <td>{{ $skill_content->title}}</td>
                                                <td>
                                                    <div class="d-flex flex-row">
                                                        <div class="btn-group">
                                                            <form action="{{ route('expert.skills_content.destroy', $skill_content ) }}" method="POST" onsubmit="return confirm('Delete?')">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="waves-effect waves-light btn btn-danger-light  ml-3" style="width:100%; height: 100% ;">Delete</button>
                                                            </form>
                                                            <a href="{{ route('expert.skills_content.show-blog', $skill_content) }}" type="button" class="btn btn-primary ml-3">Show  Blogs &rarr;</a>
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
