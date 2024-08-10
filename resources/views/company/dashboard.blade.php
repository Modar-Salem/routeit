@extends('layouts.company.master')
@section('title')
    Company Dashboard
@endsection
@section('route_dashboard')
    <a href="{{route('company.dashboard')}}" class="logo">
        @endsection
        @section('style')
            <style>
                .icon-container {
                    display: flex;
                    justify-content: space-between;
                }

                .fa {
                    font-size: 20px;
                    margin-left: 10px;
                    transition: transform 0.3s;
                }

                .fa:hover {
                    transform: scale(1.1);
                }

                .fa.fa-file-pdf-o::after,
                .fa.fa-play-circle::after {
                    content: attr(data-info);
                    position: absolute;
                    background-color: rgba(0, 0, 0, 0.8);
                    color: #fff;
                    padding: 3px;
                    border-radius: 5px;
                    display: none;
                }

                .fa.fa-file-pdf-o:hover::after,
                .fa.fa-play-circle:hover::after {
                    display: block;
                }
            </style>
        @endsection
        @section('content')

            <div class="content-wrapper">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Your Road-Maps</h4>
                        <a href="{{route('company.competition.create')}}" class="btn btn-primary">Add Competition</a>
                    </div>
                </div>
                <div class="container-full">
                    <!-- Main content -->
                    <section class="content">
                        <div class="row">
                            <div class="row">
                                <div class="row">
                                    @foreach($competitions->get() as $competition)

                                        <div class="col-md-12 col-lg-4">
                                            <div class="card">
                                                <div class="card-header d-flex justify-content-between">
                                                    <span><i class="fa fa-user me-2"></i> <a href="#">{{\Illuminate\Support\Facades\Auth::guard('company')->user()->name}}</a></span>
                                                    <span class="text-muted">Added {{ $competition->created_at->diffForHumans() }}</span>
                                                </div>
                                                <img class="card-img-top bter-0 btsr-0" src="{{ asset('storage/'.$competition->image) }}" alt="Card image cap" style="max-width: 100%; max-height: 300px; width: auto; height: auto;">
                                                <div class="card-body">
                                                    <h4 class="card-title">{{$competition->name}}</h4>
                                                    <p class="card-text">{{$competition->description}}</p>
                                                </div>
                                                <div class="card-footer justify-content-between d-flex">
                                                    <ul class="list-inline mb-0 me-2">
                                                        <li class="list-inline-item">
                                                            <a href="#"><i class="fa fa-heart-o"></i></a>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <a href="#"><i class="fa fa-comment-o"></i></a>
                                                        </li>
                                                    </ul>
                                                    <div class="btn-group" role="group" aria-label="Competition Actions">
                                                        <!-- Show Competitors Button -->
                                                        <a href="{{ route('company.competition.index', $competition->id) }}" class="btn btn-info btn-sm" style="background-color: #00c0ef; border-color: #00c0ef;">
                                                            <i class="fa fa-users" aria-hidden="true"></i> Show Competitors
                                                        </a>

                                                        <!-- Edit Button -->
                                                        <a href="{{ route('company.competition.edit', $competition->id) }}" class="btn btn-warning btn-sm" style="background-color: #f39c12; border-color: #f39c12;">
                                                            <i class="fa fa-pencil" aria-hidden="true"></i> Edit
                                                        </a>

                                                        <!-- Delete Button -->
                                                        <form action="{{ route('company.competition.destroy', $competition->id) }}" method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm" style="background-color: #dd4b39; border-color: #dd4b39;" onclick="return confirm('Are you sure you want to delete this competition?');">
                                                                <i class="fa fa-trash" aria-hidden="true"></i> Delete
                                                            </button>
                                                        </form>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- /.content -->
                </div>
            </div>

@endsection
