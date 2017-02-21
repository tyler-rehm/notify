@extends('layouts.default')
@section('css')
    <style>
        .breadcrumbs-v3.img-services {
            background: url(/img/benjamin-child-17946.jpg) no-repeat;
            background-size: cover;
            background-position: center center;
        }
    </style>
@endsection
@section('content')
    <!--=== Interactive Slider ===-->
    <div class="breadcrumbs-v3 img-services text-center" style="height:375px">
        <div class="container">
            <h1>Pricing</h1>
        </div>
    </div>
    <!--=== End Interactive Slider ===-->

    <!--=== Service Blcoks ===-->
    <div class="container content-sm">

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