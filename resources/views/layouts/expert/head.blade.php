<title>
    @yield('title')
</title>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<!-- Vendors Style-->
<link rel="stylesheet" href="{{ \Illuminate\Support\Facades\URL::asset('dashboard/css/vendors_css.css')}}" >

<!-- Style-->
<link rel="stylesheet" href="{{ \Illuminate\Support\Facades\URL::asset('dashboard/css/style.css')}}">
<link rel="stylesheet" href="{{ \Illuminate\Support\Facades\URL::asset('dashboard/css/skin_color.css')}}">

@yield('css')
