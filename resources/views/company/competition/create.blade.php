@extends('layouts.company.master')
@section('title')
    Add Competition
@endsection

@section('route_dashboard')
    <a href="{{route('company.dashboard')}}" class="logo">
        @endsection

        @section('content')
            <div class="content-wrapper">
                <div class="container-full">

                    <section class="content">
                        <div class="row">

                            <div class="col-12">

                                <div class="box">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">Add Competition</h4>
                                    </div>
                                    <!-- /.box-header -->
                                    <form action="{{ route('company.competition.store') }}" method="POST"
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
                                                <div class="form-group">
                                                    <label class="form-label">Title</label>
                                                    <input type="text" name="name" class="form-control"
                                                           placeholder="Title" required maxlength="255"
                                                           value="{{ old('name') }}">
                                                    @error('name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                    <label class="form-label">Description</label>
                                                    <textarea rows="5" class="form-control" name="description"
                                                              placeholder="Description" required></textarea>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                    <label class="form-label">Cover Image</label>
                                                    <input class="form-control" type="file" name="image" id="formFile"
                                                           required
                                                           accept="image/*">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Start Date:</label>

                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-clock-o"></i>
                                                    </div>
                                                    <input type="datetime-local" required class="form-control pull-right" id="reservationtime" name="start_date">
                                                </div>
                                                <!-- /.input group -->
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">End Date:</label>

                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-clock-o"></i>
                                                    </div>
                                                    <input type="datetime-local"  required class="form-control pull-right" id="reservationtime" name="end_date">
                                                </div>
                                                <!-- /.input group -->
                                            </div>
                                        </div>
                                        <!-- /.box-body -->
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
            <script
                src="{{ \Illuminate\Support\Facades\URL::asset('assets/vendor_components/bootstrap-select/dist/js/bootstrap-select.js') }}"></script>

            <script src="{{asset('assets/vendor_components/bootstrap-select/dist/js/bootstrap-select.js')}}"></script>
            <script
                src="{{asset('assets/vendor_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.js')}}"></script>
            <script
                src="{{asset('assets/vendor_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js')}}"></script>
            <script src="{{asset('assets/vendor_components/select2/dist/js/select2.full.js')}}"></script>
            <script src="{{asset('assets/vendor_plugins/input-mask/jquery.inputmask.js')}}"></script>
            <script src="{{asset('assets/vendor_plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
            <script src="{{asset('assets/vendor_plugins/input-mask/jquery.inputmask.extensions.js')}}"></script>

            <script src="{{asset('assets/vendor_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

            <script
                src="{{asset('assets/vendor_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')}}"></script>
            <script src="{{asset('assets/vendor_plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
            <script src="{{asset('assets/vendor_plugins/iCheck/icheck.min.js')}}"></script>


@endsection

