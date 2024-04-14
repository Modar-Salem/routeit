@extends('layouts.admin.master')
@section('title')
    Technology Category
@endsection

@section('route_dashboard')
    <a href="{{route('admin.dashboard')}}" class="logo">
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
                                        <h4 class="box-title">View Technology Category</h4>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <hr class="my-15">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Name</label>
                                                    <p>{{ $technology_category->name }}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Name AR</label>
                                                    <p>{{ $technology_category->name_ar }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Description</label>
                                                    <p>{{ $technology_category->description }}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Description AR</label>
                                                    <p>{{ $technology_category->description_ar }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">image</label>
                                            <hr/>
                                                <img src="{{ asset('storage/' . $technology_category->image) }}"  class="file-thumbnail">
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
