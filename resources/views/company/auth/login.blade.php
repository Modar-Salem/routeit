<!DOCTYPE html>
<html lang="en">
<head>

    @section('title')
        Company Dashboard
    @endsection


    @include('layouts.expert.head')

</head>

<body class="hold-transition theme-primary bg-img" style="background-image: url(../images/auth-bg/bg-1.jpg)">

<div class="container h-p100">
    <div class="row align-items-center justify-content-md-center h-p100">

        <div class="col-12">
            <div class="row justify-content-center g-0">
                <div class="col-lg-5 col-md-5 col-12">
                    <div class="bg-white rounded10 shadow-lg">
                        <div class="content-top-agile p-20 pb-0">
                            <h2 class="text-primary">Company Dashboard</h2>
                            <p class="mb-0">Sign in to continue to Route IT.</p>
                        </div>
                        <div class="p-40">
                            <form action="{{ route('company.login.action') }}" method="post" >
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
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text bg-transparent"><i class="ti-user"></i></span>
                                        <input type="email" name="email" class="form-control ps-15 bg-transparent" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text  bg-transparent"><i class="ti-lock"></i></span>
                                        <input type="password"  name="password" class="form-control ps-15 bg-transparent" placeholder="Password" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="checkbox">
                                            <input type="checkbox" id="basic_checkbox_1" name="remember" checked >
                                            <label for="basic_checkbox_1">Remember Me</label>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn btn-danger mt-10">SIGN IN</button>
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </form>
                            <div class="text-center">
                                <p class="mt-15 mb-0">Don't have an account? <a href="{{route('company.register')}}" class="text-warning ms-5">Sign Up</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <p class="mt-20 text-white">- Sign With -</p>
                        <p class="gap-items-2 mb-20">
                            <a class="btn btn-social-icon btn-round btn-facebook" href="#"><i class="fa fa-facebook"></i></a>
                            <a class="btn btn-social-icon btn-round btn-twitter" href="#"><i class="fa fa-twitter"></i></a>
                            <a class="btn btn-social-icon btn-round btn-instagram" href="#"><i class="fa fa-instagram"></i></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Vendor JS -->
<script src={{asset("dashboard/js/vendors.min.js")}}></script>
<script src={{asset("dashboard/js/pages/chat-popup.js")}}></script>
<script src="{{asset("assets/icons/feather-icons/feather.min.js")}}"></script>

</body>
</html>
