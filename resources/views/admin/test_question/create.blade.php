@extends('layouts.admin.master')
@section('title')
    Add Test Question
@endsection

@section('route_dashboard')
    <a href="{{route('admin.dashboard')}}" class="logo">
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
                                    <form action="{{ route('admin.test_question.store' , $test_id) }}" method="POST"
                                          enctype="multipart/form-data">
                                        @csrf
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <div class="box-body">
                                            <div class="card mb-4">
                                                <div class="card-header">
                                                    <h2>Question</h2>
                                                </div>
                                                <div class="card-body">
                                                    <textarea name="question" id="question" class="form-control" required placeholder="Type your question here..."></textarea>
                                                </div>
                                                <div class="card-body">
                                                    <input type="number" name="xp" id="xp" class="form-control" required placeholder="XP">
                                                </div>
                                            </div>

                                            @foreach(['1', '2', '3', '4', '5'] as $num)
                                                <div class="card mb-3">
                                                    <div class="card-header bg-primary text-white">
                                                        <h3>Option {{ $num }}</h3>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="mb-3">
                                                            <label for="option{{ $num }}" class="form-label">Text:</label>
                                                            @if($num<=2)
                                                                <input type="text" name="option{{$num}}" id="option{{$num}}" class="form-control" required placeholder="Text Option">
                                                            @else
                                                                <input type="text" name="option{{$num}}" id="option{{$num}}" class="form-control"  placeholder="Text Option">
                                                            @endif

                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

                                            <div class="card mb-4">
                                                <div class="card-header bg-success text-white">
                                                    <h2>Select the Correct Option</h2>
                                                </div>
                                                <div class="card-body">
                                                    <select name="correct_option" id="correct_option" class="form-select" required>
                                                        <option value="1">Option 1</option>
                                                        <option value="2">Option 2</option>
                                                        <option value="3">Option 3</option>
                                                        <option value="4">Option 4</option>
                                                        <option value="5">Option 5</option>
                                                    </select>
                                                </div>
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
            <script src="{{ \Illuminate\Support\Facades\URL::asset('assets/vendor_components/bootstrap-select/dist/js/bootstrap-select.js')}}"></script>
@endsection
