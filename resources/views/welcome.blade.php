@extends('layouts.default')
@section('content')
    <!-- Interactive Slider v2 -->
    <div class="interactive-slider-v2 interactive-slider-v2-md img-v3">
        <div class="container">
            <h1 class="cd-headline letters type">
                <span>We are</span>
                <span class="cd-words-wrapper">
						<b class="is-visible">Notiifii</b>
						<b>Awesome</b>
						<b>Engaging</b>
                        <b>Ready</b>
					</span>
            </h1>
            <p>Customer outreach solution for the modern day.</p>
        </div>
    </div>
    <!-- End Interactive Slider v2 -->

    <!--=== About Us ===-->
    <div class="container content-md">
        <div class="row">
            <div class="col-md-6 md-margin-bottom-40">
                <h2 class="title-v2">ABOUT US</h2>
                <p>There are many customer outreach & engagement solutions out there. Welcome to the last one you will ever need. Here at Notiifii we are relentless in ensuring we stay in constant communication with your customers and are able to reach them in a meaningful, effective way.</p>
                <p>Whether you need to remind a patient of an upcoming appointment, build a customer outreach campaign or just send out the occasional blast to hundreds of individuals, we've got your back.</p><br>
                <a href="/about" class="btn-u btn-brd btn-brd-hover btn-u-dark">Read More</a>
                <a href="/register" class="btn-u">Get Started</a>
            </div>
            <div class="col-md-6 overflow-h">
                <img class="img-responsive wow animated fadeInUp" data-wow-duration="1.5s" src="/img/10891456256_0b557c1564_b2.jpg" alt="">
            </div>
        </div>
    </div>
    <!--=== End About Us ===-->

    <!--=== Full Width Blocks ===-->
    <div class="container-fluid bg-color-darker">
        <div class="row equal-height-columns no-gutter">
            <div class="col-md-6">
                <img class="img-responsive full-width equal-height-column" src="/img/10891456256_0b557c1564_b3.jpg" alt="">
            </div>

            <div class="col-md-6 equal-height-column text-center dp-table">
                <div class="content-boxes-v3 dp-table-cell quote-v1 parallaxBg">
                    <p>Everyone knows that debugging is twice as hard as writing a program in the first place. So if you're as clever as you can be when you write it, how will you ever debug it.</p>
                    <span>Jimmy Howell, <a href="#">CEO, Director</a></span>
                </div>
            </div>
        </div>
    </div>
    <!--=== End Full Width Blocks ===-->

    <!--=== Colorfull Blocks ===-->
    <div class="container-fluid">
        <div class="row no-gutter equal-height-columns">
            <div class="col-sm-4">
                <div class="service-block service-block-purple no-margin-bottom content equal-height-column">
                    <i class="icon-custom icon-md rounded icon-color-light icon-line icon-badge"></i>
                    <h2 class="font-light">Best Solutions</h2>
                    <p class="no-margin-bottom font-light">Provide; shifting landscape reduce carbon emissions human potential sustainability Jane Addams solve. Global network; care Rockefeller, vaccines equal opportunity human being.</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="service-block service-block-red no-margin-bottom content equal-height-column">
                    <i class="icon-custom icon-md rounded icon-color-light icon-line icon-layers"></i>
                    <h2 class="font-light">Excellent Features</h2>
                    <p class="no-margin-bottom font-light">Provide; shifting landscape reduce carbon emissions human potential sustainability Jane Addams solve. Global network; care Rockefeller, vaccines equal opportunity human being.</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="service-block service-block-blue no-margin-bottom content equal-height-column">
                    <i class="icon-custom icon-md rounded icon-color-light icon-line icon-support"></i>
                    <h2 class="font-light">Stunning Support</h2>
                    <p class="no-margin-bottom font-light">Provide; shifting landscape reduce carbon emissions human potential sustainability Jane Addams solve. Global network; care Rockefeller, vaccines equal opportunity human being.</p>
                </div>
            </div>
        </div>
    </div>
    <!--=== End Colorfull Blocks ===-->

    <!--=== Hire Block ===-->
    <div class="bg-color-light">
        <div class="container content-sm">
            <div class="headline-center">
                <h2>WE ARE HIRING!</h2>
                <p class="space-lg-hor">Lorem ipsum dolor <span class="color-green">sit amet consectetur</span> adipiscing elit. Nam eget varius leo, at elementum eros. Fusce tristique, ipsum egestas fermentum imperdiet, ex nunc iaculis sem, a semper augue turpis ut nulla. Nam condimentum arcu eu diam <span class="color-green">gravida cursus</span> morbi ante eros.</p><br>
            </div>
            <img class="img-responsive img-center wow animated fadeInUp" src="/vendor/unify/assets/img/map-img-v1.png" alt="">
        </div>
    </div>
    <!--=== End Hire Block ===-->

    <!--=== Subscribe Form ===-->
    <div class="shop-subscribe bg-color-red">
        <div class="container">
            <div class="row">
                <div class="col-md-8 md-margin-bottom-20">
                    <h2>subscribe for upcoming <strong>updates</strong></h2>
                </div>
                <div class="col-md-4">
                    <form action="http://notiifii.createsend.com/t/d/s/nukktt/" method="post" id="subForm">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Email your email..." id="fieldEmail" name="cm-nukktt-nukktt">
                            <span class="input-group-btn">
                                <button class="btn" type="submit"><i class="fa fa-envelope-o"></i></button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div><!--/end container-->
    </div>
    <!--=== Subscribe Form ===-->
@endsection