<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('images/favicon.ico')}}">


    <title>Wasfati Admin SignUp</title>
    @include('layouts.expert.head') ;

    <style>
        #map {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1000;
            border: 1px solid #ccc;
        }
    </style>
</head>

<body class="hold-transition theme-primary bg-img" style="background-image: url(../images/auth-bg/bg-2.jpg)">

<div class="container h-p100">
    <div class="row align-items-center justify-content-md-center h-p100">

        <div class="col-12">
            <div class="row justify-content-center g-0">
                <div class="col-lg-5 col-md-5 col-12">
                    <div class="bg-white rounded10 shadow-lg">
                        <div class="content-top-agile p-20 pb-0">
                            <h2 class="text-primary">Get started with Us</h2>
                            <p class="mb-0">Register a new membership</p>
                        </div>

                        <!-- ... [Previous HTML Code] ... -->

                        <div class="p-40">
                            <form action="{{ route('admin.register.save') }}" id="registerForm" method="post">
                            @csrf  <!-- CSRF token for security -->
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
                                        <input type="text" class="form-control ps-15 bg-transparent" placeholder="First Name" name="firstname">
                                        <input type="text" class="form-control ps-15 bg-transparent" placeholder="Last Name" name="lastname">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text bg-transparent"><i class="ti-email"></i></span>
                                        <input type="email" class="form-control ps-15 bg-transparent" placeholder="Email" name="email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text bg-transparent"><i class="ti-lock"></i></span>
                                        <input type="password" class="form-control ps-15 bg-transparent" placeholder="Password" name="password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text bg-transparent"><i class="ti-lock"></i></span>
                                        <input type="password" class="form-control ps-15 bg-transparent" placeholder="Retype Password" name="password_confirmation">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="checkbox">
                                            <input type="checkbox" id="basic_checkbox_1" name="terms">
                                            <label for="basic_checkbox_1">I agree to the <a href="#" class="text-warning"><b>Terms</b></a></label>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn btn-info margin-top-10">SIGN UP</button>
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </form>
                            <div class="text-center">
                                <p class="mt-15 mb-0">Already have an account?<a href="{{route('admin.login')}}" class="text-danger ms-5"> Sign In </a></p>
                            </div>
                        </div>
                        <!-- ... [Rest of the HTML Code] ... -->
                    </div>

                    <div class="text-center">
                        <p class="mt-20 text-white">- Register With -</p>
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

</body>
</html>
