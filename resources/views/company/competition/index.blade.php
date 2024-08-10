@extends('layouts.company.master')
@section('title')
    Competitors
@endsection

@section('route_dashboard')
    <a href="{{route('company.dashboard')}}" class="logo"></a>
@endsection

@section('content')

    <div class="content-wrapper">
        <div class="container-full">
            <section class="content">
                <!-- Display Success or Error Messages -->
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="row">
                    <div class="col-12">
                        <div class="box">
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="complex_header" class="table table-striped table-bordered display"
                                           style="width:100%">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Project Link</th>
                                            <th>University</th>
                                            <th>User XP</th>
                                            <th>Rank</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($competitors->sortby('rank') as $competitor)
                                            <tr>
                                                <td>{{ $competitor->mobileUser->name }}</td>
                                                <td>{{ $competitor->mobileUser->email }}</td>
                                                <td>
                                                    <a href="{{ $competitor->project_link }}" target="_blank"
                                                       style="display: block; width: 100%; height: 100%; text-decoration: none; color: inherit;">
                                                        {{ $competitor->project_link }}
                                                    </a>
                                                </td>
                                                <td>{{ $competitor->mobileUser->university }}</td>
                                                <td>{{ $competitor->mobileUser->userXP ?? '0' }}</td>
                                                <td>{{ $competitor->rank ?? 'N/A' }}</td>
                                                <td>
                                                    <form
                                                        action="{{ route('competition.assign-winner', $competitor->competition_id) }}"
                                                        method="POST" class="d-flex">
                                                        @csrf
                                                        <input type="hidden" name="competitor_id"
                                                               value="{{ $competitor->id }}">
                                                        <div class="input-group" style="max-width: 120px;">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    <i class="fa fa-hashtag" aria-hidden="true"></i>
                                                                </span>
                                                            </div>
                                                            <input type="number" name="rank" class="form-control"
                                                                   placeholder="Rank" min="1" required
                                                                   value="{{ $competitor->rank }}"
                                                                   style="border-radius: 0 4px 4px 0;">
                                                        </div>
                                                        <button type="submit" class="btn btn-success ms-2">
                                                            <i class="fa fa-trophy" aria-hidden="true"></i> Assign
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

@endsection

@section('scripts')
    <script
        src="{{ \Illuminate\Support\Facades\URL::asset('assets/vendor_components/datatable/datatables.min.js')}}"></script>
    <script src="{{ \Illuminate\Support\Facades\URL::asset('dashboard/js/pages/data-table.js')}}"></script>
@endsection
