@extends('layouts.app') @section('shop_by_vehicle_css')
<link rel="stylesheet" href="{{ asset('css/wheels.css') }}"> @endsection @section('content')

<div class="header-content-title">
</div>

<br>
<!-- New Design Start -->
<style>
    .ban-ser {
        border: 1px solid #ddd9d9 !important;
    }

    .wheel-list {
        column-width: 15em;
        padding: 10px 15px !important;
    }

    .wheel-list li a {
        color: #474646;
        display: block;
        font-size: 12px !important;
        text-align: center;
        font-family: Montserrat !important;
    }

    .wheel-list ul {
        margin: 0;
        padding: 0;
        list-style-type: none;
    }

    .wheel-list li {
        padding: 3px;
        margin: 3px;
        margin-top: 3px;
        margin-top: 3px;
        border: 1px solid #ccc;
        box-shadow: 1px 1px 2px 1px rgba(0, 0, 0, .05);
        background-color: #fff;
        border-radius: 2px !important;
    }

    .wheel-list ul li:first-child {
        margin-top: 0;
    }

    #heading h1 {
        font-family: Montserrat;
        color: #121214;
        font-size: 18px !important;
        text-align: center;
        font-weight: 700 !important;
    }

    .col-sm-3.payments3-card img {
        width: 100% !important;
    }

    .col-sm-3.payments-card {
        text-align: center !important;
    }

    .prod-headinghome p {
        margin: 10px 0px;
        color: #121214;
        line-height: 30px;
        font-family: poppins !important;
        font-size: 12px !important;
    }

    .col-sm-4.wheel-img {
        text-align: center !important;
    }

    /* pro Start */

    .hometabled {
        display: table;
        text-align: center;
        width: 100%;
        background: #fff;
        box-shadow: 0 2px 3px 0 rgba(180, 180, 180, .6) !important;
        border: 1px solid #d8d7d7;
        margin-bottom: 15px;
        padding: .5%;
        border-radius: 2px;
        -moz-border-radius: 2px;
        -webkit-border-radius: 2px;
    }

    .pTopBar {
        display: table;
        width: 100%;
        padding: .5% 1%;
        margin-bottom: 1%;
        border-radius: 2px;
        -moz-border-radius: 2px;
        -webkit-border-radius: 2px;
        background: #0e1661 !important;
    }

    .pTopCell {
        display: table-cell;
        width: 50%;
        color: #fff;
        text-shadow: 0 1px 1px rgba(0, 0, 0, .75);
        font-size: 12px;
        font-family: Montserrat !important;
    }

    .pTopCell.Phone a {
        color: #fff;
        text-decoration: none;
    }

    .asItems {
        border: 0px;
    }

    .asItems {
        padding: 0;
        padding-top: 0px;
        width: 100%;
        padding-top: 5px;
        text-align: center;
        margin: 0 auto 10px;
        background: #fff;
        border: 1px solid #cecece;
        border-radius: 2px;
        -moz-border-radius: 2px;
        -webkit-border-radius: 2px;
        box-shadow: 0 0 3px rgba(0, 0, 0, .125);
        font-family: open sans, Arial, sans-serif;
    }

    .asItems {
        text-align: center;
        font-family: open sans, Arial, sans-serif;
    }

    .gridList {
        margin: 0 auto;
        padding: 0;
        width: auto;
        display: table;
    }

    .gridItem {
        display: inline-block;
        width: 210px;
        text-align: center;
        padding: 5px;
    }

    .homecelld b {
        color: #222 !important;
        font-size: 12px !important;
        font-family: Montserrat !important;
    }

    .hometabled {
        margin: 25px 0px !important;
    }

    .gridList.wheels.suggested .gridItem homeapge1 {
        height: 180px;
    }

    .asItems {
        border: 0px;
    }

    .prod-headinghome h2 {
        color: #0e1661 !important;
        text-align: center;
        font-family: Montserrat !important;
        font-size: 18px !important;
        font-weight: 700 !important;
    }

    .prod-headinghome b {
        color: #0e1661 !important;
        font-family: Montserrat !important;
        font-size: 12px !important;
    }

    .prod-heading-center {
        text-align: center;
    }

    .prod-headinghome h3 {
        width: 100%;
        font-size: medium;
        font-family: open sans, Arial, sans-serif;
        color: #000 !important;
        font-weight: 600 !important;
        text-align: center;
    }

    .prod-heading-center p {
        color: #0e1661 !important;
        font-size: 15px;
        line-height: 30px !important;
        font-family: Montserrat !important;
        font-weight: 700 !important;
    }

    #produst,
    #special-product,
    footer,
    #bott,
    .container.brand-logo {
        display: none !important;
    }

    .container-fluid.home-page {
        padding: 0px 0px !important;
        background: #f1f1f1 !important;
    }
</style>
<!-- New Design End -->
<div class="banner-search">
    <div class="container">
        <div class="wheel-list ban-ser">
            <ul>
                <li><a href="">17 inch Specials</a></li>
                <li><a href="">18 inch Specials</a></li>
                <li><a href="">20 inch Specials</a></li>
                <li><a href="">22 inch Specials</a></li>
                <li><a href="">24 inch Specials</a></li>
                <li><a href="">26 inch Specials</a></li>
                <li><a href="">Black Wheels</a></li>
                <li><a href="">Tuner Wheels</a></li>
                <li><a href="">3-Piece Wheels</a></li>
                <li><a href="">Off Road Wheels</a></li>
                <li><a href="">8-Lug Wheels</a></li>
                <li><a href="">Dually Wheels</a></li>
                <li><a href="">Classic Wheels</a></li>
                <li><a href="">Vehicle Gallery</a></li>
                <li><a href="">Videos</a></li>
                <li><a href="">Reviews</a></li>
                <li><a href="">Bolt Patterns</a></li>
                <li><a href="">Canada Shipping</a></li>
                <li><a href="">Feedback</a></li>
                <li><a href="">Privacy Policy</a></li>
                <li><a href="">Return Policy</a></li>
                <li><a href="">Shipping Info</a></li>
                <li><a href="">Order Status</a></li>
            </ul>
        </div>
    </div>
    @if(Setting::get('homepage_content1'))
    <?=Setting::get('homepage_content1','')?>
    @else
    <!---------------- This Section will show when settings not found---------------->
    <div class="container">
        <div class="title-header">
            <div id="heading" class="title">
                <h1>Welcome to Discounted Wheel Warehouse - Wheels, Tires, Rims</h1>
            </div>
        </div>
        <hr>
    </div>

    <div class="container">
        <div class="row pay">
            <div class="col-sm-3 payments-card"><img src="image/pay1.png"></div>
            <div class="col-sm-3 payments-card"><img src="image/pay2.png"></div>
            <div class="col-sm-3 payments3-card"><img src="image/pay3.png"></div>
            <div class="col-sm-3 payments-card"><img src="image/pay4.png"></div>
        </div>
    </div>

    <div class="container">
        <div class="prod-headinghome">
            <p>Welcome to Discounted wheel Warehouse. We offer a huge selection of rims and tires to suit your needs. We carry 15 inch wheels all the way to a whopping 32 inch custom wheel. We offer quality discount tires at a price range for all. Don't miss our Closeout section as we have the best blowout deals to offer. Whether you're looking for rims or tires Discounted Wheel Warehouse has the best deal on the world wide web. We also have all the latest news and information on our Blog concerning custom wheels or car rims and all aspects of tires.</p>
        </div>
    </div>

    <div class="container">
        <div class="row pro-img">
            <div class="col-sm-4 wheel-img"><img src="image/image-1.png"></div>
            <div class="col-sm-4 wheel-img"><img src="image/image-2.png"></div>
            <div class="col-sm-4 wheel-img"><img src="image/image-3.png"></div>
        </div>
    </div>
    <!---------------- This Section will show when settings not found---------------->

    @endif

</div>
<!-- Start - This is for Duynamic Products from database -->
<div class="container">

    <div class="hometabled">
        <div class="pTopBar">
            <div class="pTopCell HotDeals">Hot Deals Save 30%-75%</div>
            <div class="pTopCell Phone"><a href="tel:1-800-901-6003" title="Telephone 1-800-901-6003">1-800-901-6003</a></div>
        </div>

    </div>
</div>
<!-- End - This is for Duynamic Products from database  -->



@if(Setting::get('homepage_content2'))
<div class="container">
    <?=Setting::get('homepage_content2','')?>
</div>
@else
<!---------------- Start - This Section will show when settings not found---------------->
<div class="container">
    <div class="prod-headinghome">
        <h2>We offer the hassle free fitment to make things EASY</h2>
        <p>Our Wheel Fitment Specialists or Tire Fitment Specialist can get you into those aftermarket wheels or tires fast. Our staff strives on giving the best service to our customers and have 20 years experience in wheel and tire fitment. We are the absolute authority on getting you fitted with the best choice of rims or tires for your Car, Truck or SUV. We offer online fitment that is quick and painless and will show you exactly which rims or tires will fit your vehicle.</p>
        <h2>Fast Shipping plus Low already Discounted Prices</h2>
        <p>Discounted Wheel Warehouse offers Fast Shipping on all its products. Whether your looking for some good quality cheap tires or just a set of car rims. We can get them to you quickly with our Fast shipping. Our price is already heavily discounted. No need to look elsewhere Discounted Wheel Warehouse will already have the best price for any wheels or wheel and tire package your looking for.</p>
        <h2>Home of the Wheel and Tire Package</h2>
        <p>Discounted wheel Warehouse is the home of the Wheel and Tire Package. We have been offering rims combined with tires also known as the "Wheel and Tire Package" since our existence. The best way to buy wheels and tire for your Car, Truck or SUV is a Wheel and Tire Package. We correctly fit the wheels using plus sizing, then correctly fit the plus sized tires for your vehicle. Our highly trained staff mounts and Road-Force Balances the wheels and tires for you into a wheel and tire package. All the customer has to do is dismount their stock/oem wheels and mount the wheels and tires right out of the box, it's super easy.</p>
        <h2>Full Range of rims and tires for every Car, Truck or SUV</h2>
        <p>We carry rims in the following sizes: 15 inch, 16 inch, 17 inch, 18 inch, 19 inch, 20 inch, 22 inch, 24 inch, 26 inch, 28 inch, 30 inch and a whopping 32 inch beast of a wheel. We have custom wheels, black wheels, off road wheels, staggered fitment wheels and 3 piece wheels. Our Tires range from 13 inch all the way to 32 inch. We have name brand high quality tires like Michelin, BFGoodrich all the way to Yokohama. We also carry a vast amount of Value low cost tires also known as cheap tires. We have brands like Fullrun and Lexani for our high quality discount tires.</p>
    </div>
    <div class="prod-headinghome">
        <h2>Useful Links for Custom Wheel Purchasing</h2>
        <p><a href=""><b>Package Deal</b></a> - This link has information about what comes with a wheel and tire package.</p>
        <p><a href=""><b>LOW or HIGH ?</b></a> - This link is information on how to determine if you have a FWD offset or a RWD offset on your Vehicle.</p>
        <p><a href=""><b>Lip Sizes</b></a> - Explains the difference in wheel lip sizes and what to expect when your wheel arrives.</p>
        <p><a href=""><b>Wheel Fitment</b></a> - This link explains Plus Sizing and how we are able to properly fit your rims and tires for your vehicle.</p>
        <p><a href=""><b>Offset and Bolt Patterns</b></a> - Reference to help aid in determining Bolt patterns and offsets for all vehicles.</p>
        <p><a href=""><b>Order Status</b></a> - View information on the status of your order.</p>
    </div>
    <div class="prod-heading-center">
        <p>Discounted Wheel Warehouse your best place to buy:</p>
        <p>Aftermarket Rims and Tires for your Car, Truck or Suv, Wheel and Tire Packages</p>
    </div>
</div>
<!---------------- End - This Section will show when settings not found---------------->
@endif

@endsection
@section('custom_scripts')
<!--  -->
@endsection