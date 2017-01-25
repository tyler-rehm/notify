<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
    <title>Coming Soon | Unify - Responsive Website Template</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">

    <!-- Web Fonts -->
    <link rel='stylesheet' type='text/css' href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin'>

    <!-- CSS Global Compulsory-->
    <link rel="stylesheet" href="/vendor/unify/assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/vendor/unify/assets/css/style.css">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="/vendor/unify/assets/plugins/animate.css">
    <link rel="stylesheet" href="/vendor/unify/assets/plugins/line-icons/line-icons.css">
    <link rel="stylesheet" href="/vendor/unify/assets/plugins/font-awesome/css/font-awesome.css">

    <!-- CSS Page Style -->
    <link rel="stylesheet" href="/vendor/unify/assets/css/pages/page_coming_soon.css">

    <!-- CSS Theme -->
    <link rel="stylesheet" href="/vendor/unify/assets/css/theme-colors/default.css" id="style_color">
</head>

<body class="coming-soon-page">
<div class="coming-soon-wrapper coming-soon-border">

    <!--=== Content Part ===-->
    <div class="container cooming-soon-content g-block-middle">
        <!-- Coming Soon Content -->
        <div class="row">
            <div class="col-md-12 coming-soon">
                <h1>Coming Soon</h1>
                <p>We are just as excited for launch day as you are. We are so close! Please provide your email below and you will be the first to know.</p><br>
                <form>
                    <div class="input-group col-md-4 col-md-offset-4">

                        <form action="http://notiifii.createsend.com/t/d/s/nukktt/" method="post" id="subForm">
                            <p>
                                <input id="fieldName" name="cm-name" type="text" class="form-control" placeholder="Your Name"/>
                            </p>
                            <br/><br/>
                            <p>
                                <input id="fieldEmail" name="cm-nukktt-nukktt" type="email" required class="form-control" placeholder="Your Email"/>
                            </p>
                            <br/>
                            <br/>
                            <p>
                                <span class="input-group-btn">
                                    <button type="submit" class="btn-u">Subscribe</button>
                                </span>
                            </p>
                        </form>
                    </div><!-- /input-group -->
                </form>
            </div>
        </div>

        <!-- Coming Soon Plugn -->
        <div class="coming-soon-plugin" style="height: 200px;">
            <div id="defaultCountdown"></div>
        </div>
    </div><!--/container-->
    <!--=== End Content Part ===-->

    <!--=== Sticky Footer ===-->
    <div class="sticky-footer">
        <p class="copyright-space">
            2016 &copy; Notiifii. ALL Rights Reserved.
        </p>
    </div>
    <!--=== End Sticky-Footer ===-->
</div>

<!-- JS Global Compulsory -->
<script type="text/javascript" src="/vendor/unify/assets/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/vendor/unify/assets/plugins/jquery/jquery-migrate.min.js"></script>
<script type="text/javascript" src="/vendor/unify/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- JS Implementing Plugins -->
<script type="text/javascript" src="/vendor/unify/assets/plugins/back-to-top.js"></script>
<script type="text/javascript" src="/vendor/unify/assets/plugins/smoothScroll.js"></script>
<script type="text/javascript" src="/vendor/unify/assets/plugins/countdown/jquery.plugin.js"></script>
<script type="text/javascript" src="/vendor/unify/assets/plugins/countdown/jquery.countdown.js"></script>
<script type="text/javascript" src="/vendor/unify/assets/plugins/backstretch/jquery.backstretch.min.js"></script>
<!-- JS Customization -->
<script type="text/javascript" src="/vendor/unify/assets/js/custom.js"></script>
<!-- JS Page Level -->
<script type="text/javascript" src="/vendor/unify/assets/js/app.js"></script>
<script type="text/javascript" src="/vendor/unify/assets/js/pages/page_coming_soon.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        App.init();
        PageComingSoon.initPageComingSoon();
    });
</script>

<!-- Background Slider (Backstretch) -->
<script>
    $.backstretch([
        "/vendor/unify/assets/img/bg/14.jpg",
        "/vendor/unify/assets/img/bg/17.jpg",
        "/vendor/unify/assets/img/bg/2.jpg"
    ], {
        fade: 1000,
        duration: 7000
    });
</script>
<!--[if lt IE 9]>
<script src="/vendor/unify/assets/plugins/respond.js"></script>
<script src="/vendor/unify/assets/plugins/html5shiv.js"></script>
<script src="/vendor/unify/assets/plugins/placeholder-IE-fixes.js"></script>
<![endif]-->
</body>
</html>
