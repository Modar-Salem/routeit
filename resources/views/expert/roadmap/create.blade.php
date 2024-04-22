@extends('layouts.expert.master')
@section('title')
    Expert Dashboard
@endsection
@section('route_dashboard')
    <a href="{{route('expert.dashboard')}}" class="logo">
@endsection

@section('content')
            <div class="content-wrapper">
                <div class="container-full">
                    <section class="content">
                        {{--Patient Information--}}
                        <div class="row">
                            <div class="col-12">
                                <div class="box">
                                    <div class="box-header with-border">
                                        <h4 class="box-title"> RoadMap Info </h4>
                                    </div>
                                        <!-- /.box-header -->
                                        <form action="{{ route('expert.roadmap.save') }}" method="POST"
                                              enctype="multipart/form-data">
                                            @csrf
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            <div class="box-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <h5 class="my-10">Select The Technology</h5>
                                                        <select name="technology_id" class="selectpicker">
                                                            @foreach($technologies as $technology)
                                                                <option value="{{$technology->id}}">{{$technology->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <h5 class="my-10">Select The Level</h5>
                                                        <select name="level" class="selectpicker">
                                                            <option value="junior">junior</option>
                                                            <option value="mid-level">mid-level</option>
                                                            <option value="senior">senior</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <hr class="my-15">

                                                <div class="row">
                                                    <div class="form-group">
                                                        <label class="form-label">Title</label>
                                                        <input type="text" name="title" class="form-control"
                                                               placeholder="RoadMap Title">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group">
                                                        <label class="form-label">Title (AR)</label>
                                                        <input type="text" name="title_ar" class="form-control"
                                                               placeholder="RoadMap Title(AR)">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group">
                                                        <label class="form-label">Description</label>
                                                        <textarea rows="5" class="form-control" name="description" placeholder="Description" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group">
                                                        <label class="form-label">Description (AR) </label>
                                                        <textarea rows="5" class="form-control" name="description_ar" placeholder="Description (AR)" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group">
                                                        <label class="form-label">Cover Image</label>
                                                        <input class="form-control" type="file" name="cover" id="formFile" required
                                                               accept="image/*">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group">
                                                        <label class="form-label">Introductory Video  </label>
                                                        <input class="form-control" type="file" name="introductory_video" id="formFile" required accept="video/*">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group">
                                                        <label class="form-label">Target CV (pdf)</label>
                                                        <input class="form-control" type="file" name="target_cv" id="formFile" required accept=".pdf">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="box-footer">
                                                <button type="button" class="btn btn-warning me-1">
                                                    <i class="ti-trash"></i> Cancel
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="ti-save-alt"></i> Save
                                                </button>
                                            </div>
                                        </form>

                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>

@endsection

@section('scripts')
            <script src="{{ \Illuminate\Support\Facades\URL::asset('assets/vendor_components/bootstrap-select/dist/js/bootstrap-select.js')}}"></script>

@endsection
