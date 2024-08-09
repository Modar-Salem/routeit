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
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <hr class="my-15">
                                        <div class="row">
                                            <div class="col-md-12"> <!-- Changed from col-md-6 to col-md-12 for full width -->
                                                <div class="form-group">
                                                    <label class="form-label">Video Title</label>
                                                    <p>{{ $video->title }}</p>

                                                    <label class="form-label">Video</label>
                                                    <hr/>
                                                    <video class="video-js vjs-default-skin" controls preload="auto" style="width: 100%; height: 600px;"> <!-- Increased height -->
                                                        <source src="{{ $video->video }}" type="application/x-mpegURL">
                                                    </video>
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

            .pdf-viewer {
                width: 60%; /* Set the width as per your requirement */
            }

            .pdf-viewer iframe {
                width: 50%;
                height: 500px;
            }
        </style>

        @section('scripts')
            <script src="https://unpkg.com/video.js/dist/video.js"></script>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    // Query all video-js elements and initialize Video.js on each
                    document.querySelectorAll('.vjs-default-skin').forEach(function(element) {
                        videojs(element);
                    });
                });
            </script>
@endsection
