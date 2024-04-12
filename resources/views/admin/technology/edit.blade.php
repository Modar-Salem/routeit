@extends('layouts.admin.master')

@section('title')
    Edit Technology Category
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
                                        <h4 class="box-title">Edit Technology Details</h4>
                                    </div>
                                    <!-- /.box-header -->
                                    <form action="{{ route('admin.technology.update', $technology) }}" method="POST"
                                          enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
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
                                            <hr class="my-15">
                                            <div class="form-group">
                                                <label class="form-label">Name</label>
                                                <input type="text" name="name" placeholder="name"
                                                       class="form-control" required maxlength="255"
                                                       value="{{ old('name', $technology->name) }}">
                                                @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Name AR</label>
                                                <input type="text" name="name_ar" placeholder="Name (AR)"
                                                       class="form-control" required maxlength="255"
                                                       value="{{ old('name_ar', $technology->name_ar) }}">
                                                @error('name_ar')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <!-- Additional Location Description Section -->
                                            <div class="row">
                                                <div class="form-group">
                                                    <label class="form-label">Description</label>
                                                    <input type="text" class="form-control"
                                                           placeholder="Description"
                                                           name="description"
                                                           value="{{ old('description', $technology->description) }}"
                                                           required>
                                                    @error('description')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                    <label class="form-label">Description (AR)</label>
                                                    <input type="text" class="form-control"
                                                           placeholder="Description (AR)"
                                                           name="description_ar"
                                                           value="{{ old('description_ar', $technology->description_ar) }}"
                                                           required>
                                                    @error('description_ar')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>                                        <!-- /.box-body -->
                                        <div class="box-footer">
                                            <button type="button" class="btn btn-warning me-1">
                                                <i class="ti-trash"></i> Cancel
                                            </button>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="ti-save-alt"></i> Update
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


