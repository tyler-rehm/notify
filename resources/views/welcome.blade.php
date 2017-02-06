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
                    <p>You have a business to worry about. Let us handle the customer engagement and ensure they're coming through that door each and every day.</p>
                    <span>Tyler Rehm, CEO, Director</span>
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
                    <h2 class="font-light">Best Solution</h2>
                    <p class="no-margin-bottom font-light">We offer API and file based mass notification services via a multi-channel distributions. Our state of the art technology stack is built to handle our client's everchanging needs</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="service-block service-block-red no-margin-bottom content equal-height-column">
                    <i class="icon-custom icon-md rounded icon-color-light icon-line icon-layers"></i>
                    <h2 class="font-light">Excellent Features</h2>
                    <p class="no-margin-bottom font-light">We provide on-demand elastic delivery that can handle your largest campaigns and continual outreach efforts. We can reach out via SMS, Email and Voice on your behalf.</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="service-block service-block-blue no-margin-bottom content equal-height-column">
                    <i class="icon-custom icon-md rounded icon-color-light icon-line icon-support"></i>
                    <h2 class="font-light">Stunning Support</h2>
                    <p class="no-margin-bottom font-light">Our support team is dedicated to all of your needs and provide 24/7 monitoring and delivery assurance to ensure each and every message is delivered successfully.</p>
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
                <p class="space-lg-hor">We are looking to <a href="mailto:hr@notiifii.com">hire</a> the best of the best. If you are ready to join the ranks of an ever growing, hungry team that is building the next generation of multi-channel customer outreach tools, you found the right place. Please feel free to <a href="mailto:hr@notiifii.com">send us</a> your resume and a brief explanation of why you belong at Notiifii.</p>
                <br/>
            </div>
            <br/>
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
@include('partials.demo')