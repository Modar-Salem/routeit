@extends('layouts.expert.master')
@section('title')
    Blogs Viewer
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
                                    <div class="box-body">
                                        <hr class="my-15">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                            <div>
                                                                @foreach($article->sections as $section)
                                                                    <div>
                                                                        <h4>{{ $section->title }}</h4>
                                                                        <p>{{ $section->content }}</p>
                                                                        @if($section->image)
                                                                            <img src="{{ asset('storage/'.$section->image) }}" alt="{{ $section->title }}" width="200px" height="200px">
                                                                        @endif
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                </div>
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
