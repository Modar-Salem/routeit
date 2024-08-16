@extends('layouts.expert.master')
@section('title')
    Test Question Info
@endsection

@section('route_dashboard')
    <a href="{{route('expert.dashboard')}}" class="logo">
        @endsection

        @section('content')
            <div class="content-wrapper">
                <div class="container-full">
                    <!-- Content -->
                    <section class="content">
                        <div class="row">
                            <div class="col-12">
                                <div class="box">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">View Test Question</h4>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <hr class="my-15">
                                        <div class="row mb-3">
                                            <div class="col">
                                                <label for="question">Question:</label>
                                                <div class="border p-2">{{ $test_question->question }}</div>
                                            </div>
                                        </div>

                                        @foreach(['1', '2', '3', '4', '5'] as $num)
                                            <div class="row mb-3">
                                                <div class="col">
                                                    <label>Option {{ $num }}:</label>
                                                    <div class="border p-2">
                                                        @if(isset($test_question->{'option'.$num}))
                                                            {{ $test_question->{'option'.$num} }}
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                        <div class="row mb-3">
                                            <div class="col">
                                                <label>Correct Answer:</label>
                                                <div class="border p-2">option_{{ $test_question->correct_option }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- /.content -->
                </div>
            </div>
@endsection
<style>
        .file-list {
        list-style-type: none;
        padding: 0;
        }

        .file-list li {
        margin-bottom: 10px;
        }

        .file-thumbnail {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 5px;
        margin-right: 10px;
        }

        .file-link {
        display: inline-flex;
        align-items: center;
        text-decoration: none;
        color: #333;
        }

        .file-link i {
        font-size: 20px;
        margin-right: 5px;
        }

        .pdf-viewer{
            width: 60%; /* Set the width as per your requirement */
        }

        .pdf-viewer iframe {
        width: 50%;
        height: 500px;
        }

</style>
@section('scripts')

@endsection
