@extends('layouts.admin.master')
@section('title')
    Add technology category
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
                                        <h4 class="box-title">technology category </h4>
                                    </div>
                                    <!-- /.box-header -->
                                    <form action="{{ route('admin.technology_category.store') }}" method="POST"
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
                                                    <label class="form-label">Name</label>
                                                    <input type="text" name="name" class="form-control"
                                                           placeholder="Name" required maxlength="255"
                                                           value="{{ old('name') }}">
                                                    @error('name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                    <label class="form-label">Name(AR)</label>
                                                    <input type="text" name="name_ar" class="form-control"
                                                           placeholder="Name (AR)" required maxlength="255"
                                                           value="{{ old('name_ar') }}">
                                                    @error('name_ar')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="form-group">
                                                    <label class="form-label">Description</label>
                                                    <input type="text" name="description" class="form-control"
                                                           placeholder="Description" required maxlength="255"
                                                           value="{{ old('description') }}">
                                                    @error('description')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                    <label class="form-label">Description(AR)</label>
                                                    <input type="text" name="description_ar" class="form-control"
                                                           placeholder="Description (AR)" required maxlength="255"
                                                           value="{{ old('description_ar') }}">
                                                    @error('description_ar')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
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

