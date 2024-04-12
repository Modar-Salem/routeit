@extends('layouts.admin.master')
@section('title')
    Technology Category Table
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
                                <h4 class="box-title">Technology Category Information</h4>
                                <a href="{{route('admin.technology_category.create')}}" class="btn btn-primary" style="margin-right: 20px; width: 20%">Add Technology Category</a>

                            </div>
                            <div class="box-body">
                                <div class="table-responsive">

                                    <table id="complex_header" class="table table-striped table-bordered display"
                                           style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Name (AR)</th>
                                                <th>Description</th>
                                                <th>Description (AR)</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($technology_categories as $technology_category)
                                            <tr>
                                                <td>{{ $technology_category->name}}</td>
                                                <td>{{ $technology_category->name_ar}}</td>
                                                <td>{{ $technology_category->description}}</td>
                                                <td>{{ $technology_category->description_ar}}</td>
                                                <td>
                                                    <div class="d-flex flex-row">
                                                        <div class="btn-group">
                                                            <form action="{{ route('admin.technology_category.destroy', $technology_category) }}" method="POST" onsubmit="return confirm('Delete?')">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="waves-effect waves-light btn btn-danger-light  ml-3" style="width:100%; height: 100% ;">Delete</button>
                                                            </form>
                                                            <a href="{{ route('admin.technology_category.edit', $technology_category) }}" type="button" class="waves-effect waves-light btn btn-warning-light  ml-3">Edit</a>
                                                            <a href="{{ route('admin.technology_category.show', $technology_category) }}" type="button" class="btn btn-primary ml-3">View &rarr;</a>
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
