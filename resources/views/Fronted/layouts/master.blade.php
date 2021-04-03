<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Coach Wafaa ZAMMAM</title>
    <!-- =================== META =================== -->
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="/Fronted/img/favicon.png">
    <!-- =================== STYLE =================== -->
    <link rel="stylesheet" href="/Fronted/css/slick.min.css">
    <link rel="stylesheet" href="/Fronted/css/bootstrap-grid.css">
    <link rel="stylesheet" href="/Fronted/css/font-awesome.min.css">
    <link rel="stylesheet" href="/Fronted/css/jquery.fancybox.css">
    <link rel="stylesheet" href="/Fronted/css/style.css">
    <script src="https://kit.fontawesome.com/e0387e9a75.js"></script>

</head>
<body>

@include('Fronted.layouts.header')

@yield('content')

@include('Fronted.layouts.footer')

<a class="to-top" href="/">
    <i class="fa fa-chevron-up" aria-hidden="true"></i>
</a>

@yield('script')

<!--Common JS Plugin-->
<script src="/Fronted/js/jquery-2.2.4.min.js"></script>
<script src="/Fronted/js/slick.min.js"></script>
<script src="/Fronted/js/isotope.pkgd.js"></script>
<script src="/Fronted/js/jquery.fancybox.js"></script>
<script src="/Fronted/js/rx-lazy.js"></script>
<script src="/Fronted/js/parallax.min.js"></script>
<script src="/Fronted/js/scripts.js"></script>
@yield('script')
</body>
</html>


