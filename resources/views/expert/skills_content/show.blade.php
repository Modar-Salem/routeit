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
                                    <div class="box-header with-border">
                                        <h4 class="box-title">View {{$skillContent->type}} {{$skillContent->title}} </h4>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <hr class="my-15">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    @if($skillContent->videos)
                                                        @foreach($skillContent->videos as $video)
                                                            <label class="form-label">Video Title</label>
                                                            <p>{{ $video->title }}</p>

                                                            <label class="form-label">Video</label>
                                                            <hr/>
                                                            <video controls width="200px" height="200px">
                                                                <source src="{{ asset('storage/'.$video->video) }}" type="video/mp4" >
                                                                Your browser does not support the video tag.
                                                            </video>
                                                        @endforeach
                                                    @endif
                                                    <hr/>
                                                    @if($skillContent->articles)
                                                        <!-- Display blog content -->
                                                            <h3>Article Sections</h3>
                                                        @foreach($skillContent->articles as $article)
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
                                                                <hr/>
                                                        @endforeach
                                                    @endif

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
