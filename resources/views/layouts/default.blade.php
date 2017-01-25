<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
    <title>Notiifii</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">

    @include('partials.headers.default')
</head>

<body class="header-fixed">
<div class="wrapper">
    <!--=== Header v6 ===-->
    <div class="header-v6 header-dark-transparent header-sticky">
        @include('partials.navs.default')

    </div>
    <!--=== End Header v6 ===-->

    @yield('content')
    @include('partials.footers.default')
</div>
@include('partials.js.default')
</body>
</html>
