<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href={{asset("images/favicon.ico")}}>


    @include('layouts.expert.head')

</head>

<body class="hold-transition light-skin sidebar-mini theme-success fixed">

<div class="wrapper">
    <div id="loader"></div>
    @include('layouts.expert.main-headbar')


    @include('layouts.expert.main-sidebar')

    <!-- Content Wrapper. Contains page content -->
    @yield('content')
<!-- Page Content overlay -->


</div>

<!-- Vendor JS -->
@include('layouts.expert.footer-scripts')

</body>

</html>
