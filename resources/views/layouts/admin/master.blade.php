<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href={{asset("images/favicon.ico")}}>


    @include('layouts.admin.head')

</head>

<body class="hold-transition light-skin sidebar-mini theme-success fixed">

<div class="wrapper">
    <div id="loader"></div>
    @include('layouts.admin.main-headbar')


    @include('layouts.admin.main-sidebar')

    <!-- Content Wrapper. Contains page content -->
    @yield('content')
<!-- Page Content overlay -->


</div>

<!-- Vendor JS -->
@include('layouts.admin.footer-scripts')

</body>

</html>
