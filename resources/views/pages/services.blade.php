@extends('layouts.default')
@section('css')
    <style>
        .breadcrumbs-v3.img-services {
            background: url(/img/ybrd8qqem_y-sidharth-bhatia.jpg) no-repeat;
            background-size: cover;
            background-position: center center;
        }
    </style>
@endsection
@section('content')
    <!--=== Interactive Slider ===-->
    <div class="breadcrumbs-v3 img-services text-center" style="height:375px">
        <div class="container">
            <h1>Services</h1>
        </div>
    </div>
    <!--=== End Interactive Slider ===-->

    <!--=== News Block ===-->
    <div class="container content-sm">
        <div class="container">
            <div class="row">
                <div class="col-md-6 md-margin-bottom-30">
                    <h2 class="title-v2">SOLUTIONS</h2>
                    <p>We offer a state of the art multi-channel communications platform that give you the tools to reach out and engage with thousands of customers with the simple click of a button.</p>
                    <p>Whether you want to deliver a friendly voice message, get in touch via a targeted email campaign or just send a simple SMS, we've got you covered.</p><br>
                    <a href="/about" class="btn-u btn-brd btn-brd-hover btn-u-dark">Read More</a>
                    <a href="/register" class="btn-u">Register Now</a>
                </div>
                <div class="col-md-6">
                    <div class="responsive-img">
                        <img src="/img/vcf5sb7qecm-crew.jpg" width="500px"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--=== End News Block ===-->

    <!--=== Parallax Quote ===-->
    <div class="parallax-quote parallaxBg" style="background-position: 50% 20px;">
        <div class="container">
            <div class="parallax-quote-in">
                <p>You have a business to worry about. Let us handle the customer engagement and ensure they're coming through that door each and every day.</p>
                <small>Tyler Rehm, CEO</small>
            </div>
        </div>
    </div>
    <!--=== End Parallax Quote ===-->

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

    <!--=== Service Blcoks ===-->
    <div class="container content-sm">
        <div class="text-center margin-bottom-50">
            <h2 class="title-v2 title-center">OUR SERVICES</h2>
        </div>

        <!-- Service Blcoks -->
        <div class="row service-box-v1 margin-bottom-40">
            <div class="col-md-4 col-sm-6 md-margin-bottom-40">
                <div class="service-block service-block-default no-margin-bottom">
                    <i class="icon-lg rounded-x icon icon-screen-smartphone"></i>
                    <h2 class="heading-sm">Voice</h2>
                    <p>Reach out with a friendly voice message</p>
                    <ul class="list-unstyled">
                        <li>Interactive voice message</li>
                        <li>Transfer to representative</li>
                        <li>Machine message delivery</li>
                    </ul>
                    <hr/>
                    <div>
                        <h2>$0.12 / min.</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 md-margin-bottom-40">
                <div class="service-block service-block-default no-margin-bottom">
                    <i class="icon-lg rounded-x icon-line icon-envelope-open"></i>
                    <h2 class="heading-sm">Email</h2>
                    <p>Reach out with a beautiful email message</p>
                    <ul class="list-unstyled">
                        <li>Stunning modern templates</li>
                        <li>Elegant solution for your inbox</li>
                        <li>Custom design available*</li>
                    </ul>
                    <hr/>
                    <div>
                        <h2>$0.12 / email</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="service-block service-block-default no-margin-bottom">
                    <i class="icon-lg rounded-x icon-line icon-bubbles"></i>
                    <h2 class="heading-sm">SMS</h2>
                    <p>Reach out with a simple, efficient text message</p>
                    <ul class="list-unstyled">
                        <li>Simple & effective outreach</li>
                        <li>Highest response rate</li>
                        <li>Preferred method of contact</li>
                    </ul>
                    <hr/>
                    <div>
                        <h2>$0.06 / text</h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Service Blcoks -->
    </div>
    <!--=== End Service Blcoks ===-->
@endsection