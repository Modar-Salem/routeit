@extends('layouts.expert.master')
@section('title')
    Expert Dashboard
@endsection
@section('route_dashboard')
    <a href="{{route('expert.dashboard')}}" class="logo">
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
                        <a href="{{route('expert.roadmap.create')}}" class="btn btn-primary">Add RoadMap</a>
                    </div>
                </div>
                <div class="container-full">
                    <!-- Main content -->
                    <section class="content">
                        <div class="row">
                            <div class="row">
                                <div class="row">
                                    @foreach($roadmaps as $roadmap)
                                        <div class="col-md-12 col-lg-4">
                                            <div class="card">
                                                <a href="{{route('expert.skills.index', $roadmap->id)}}">
                                                    <img class="card-img-top" src="{{$roadmap->cover}}" alt="Card image cap">
                                                    <div class="card-body">
                                                        <h4 class="card-title">{{$roadmap->title}}</h4>
                                                        <p class="card-text">{{$roadmap->description}}</p>
                                                    </div>
                                                </a>
                                                <div class="card-footer justify-content-between d-flex">
                                                    <span class="text-muted">Last updated on: {{$roadmap->updated_at->format('Y-M-D')}}</span>
                                                    <span>
                                                <a href="{{asset('storage/'.$roadmap->target_cv)}}">
                                                    <i class="fa fa-file-pdf-o" aria-hidden="true" data-info="Target CV"></i>
                                                </a>
                                                <a href="{{asset('storage/'.$roadmap->introductory_video)}}">
                                                    <i class="fa fa-play-circle" aria-hidden="true" data-info="Intro Video"></i>
                                                </a>
                                                        <!-- Delete Button -->
                                                <form action="{{ route('expert.roadmap.destroy', $roadmap->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this roadmap?');">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </button>
                                                </form>
                                            </span>
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
