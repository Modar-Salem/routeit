@extends('layouts.expert.master')
@section('title')
    Add Test
@endsection

@section('route_dashboard')
    <a href="{{route('expert.dashboard')}}" class="logo">
        @endsection

        @section('content')
            <div class="content-wrapper">
                <div class="container-full">

                    <section class="content">
                        <div class="row">

                            <div class="col-12">

                                <div class="box">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">Sample form 1</h4>
                                    </div>
                                    <!-- /.box-header -->
                                    <form action="{{ route('expert.test.store' , $skill_id) }}" method="POST"
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
                                                    <h5 class="my-10">Total Xp</h5>
                                                    <input type="number" name="total_xp" required>
                                                </div>
                                            </div>
                                            <hr/>
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
            <script src="{{ \Illuminate\Support\Facades\URL::asset('assets/vendor_components/bootstrap-select/dist/js/bootstrap-select.js')}}"></script>
@endsection
