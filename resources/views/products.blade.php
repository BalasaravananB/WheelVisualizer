@extends('layouts.app')

@section('shop_by_vehicle_css')
<link rel="stylesheet" href="{{asset('choosen/css/chosen.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/wheels.css') }}"> 
<style>
.col-sm-12.wheel-des p {
    font-family: play !important;
    font-size: 12px !important;
    line-height: 30px !important;
    color: #000 !important;
    margin: 0px 0px !important;
    text-align:justify;
}
.wheel-des
{
    padding: 20px 20px !important;
}
</style>
@endsection 
@section('content')  
<!-- BAnner Down Sestion Start -->
<section id="produst">
    <div class="container pro">
        <div class="row">
            <div class="col-sm-12 sub-head">
                <h1>{{implode(', ',json_decode(base64_decode(@Request::get('brand')?:''))?:[])}} Wheels</h1>
            </div> 
            <div class="row main-pro">
                <div class="col-sm-3">
                    <div class="header-bottom col-sm-12">

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="price-heading">SIZE</div> 
                                <!--  -->
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingOne">
                                            <h4 class="panel-title">
                                                <a  role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="{{(@Request::get('diameter'))?'':'collapsed'}}" aria-expanded="{{(@Request::get('diameter'))?'true':'false'}}" aria-controls="collapseOne">
                                                    Diameter
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                            <div class="panel-body">
                                                <ul style="list-style-type: none;">
                                                    @forelse($wheeldiameter as $diameter)
                                                    <li><input type="checkbox" name="wheeldiameter[]" class="wheeldiameter" value="{{$diameter->wheeldiameter}}" @if(in_array($diameter->wheeldiameter,json_decode(base64_decode(@Request::get('diameter')?:''))?:[])) checked @endif> {{$diameter->wheeldiameter.'('.$diameter->total.')'}}  
                                                    </li>
                                                    @empty
                                                    <li><input type="checkbox" name="wheeldiameter[]" value=""> 13</li>
                                                    <li><input type="checkbox" name="wheeldiameter[]" value=""> 20</li> 
                                                    @endforelse 
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingTwo">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="{{(@Request::get('width'))?'':'collapsed'}}" aria-expanded="{{(@Request::get('width'))?'true':'false'}}" aria-controls="collapseTwo">
                                                  Width
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                            <div class="panel-body">
                                                <ul style="list-style-type: none;">
                                                    @forelse($wheelwidth as $width)
                                                    <li><input type="checkbox" name="wheelwidth[]" class="wheelwidth" value="{{$width->wheelwidth}}" @if(in_array($width->wheelwidth,json_decode(base64_decode(@Request::get('width')?:''))?:[])) checked @endif> {{$width->wheelwidth.'('.$width->total.')'}} </li>
                                                    @empty
                                                    <li><input type="checkbox" name="wheelwidth[]" value=""> 7</li>
                                                    <li><input type="checkbox" name="wheelwidth[]" value=""> 8</li> 
                                                    @endforelse 
                                                </ul>
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingThree">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="{{(@Request::get('brand'))?'':'collapsed'}}" aria-expanded="{{(@Request::get('brand'))?'true':'false'}}" aria-controls="collapseThree">
                                                    Brand
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                            <div class="panel-body">
                                                <ul style="list-style-type: none;">
                                                    @forelse($brands as $brand)
                                                    <li><input type="checkbox" name="brand[]" class="brand" value="{{$brand->prodbrand}}" @if(in_array($brand->prodbrand,json_decode(base64_decode(@Request::get('brand')?:''))?:[])) checked @endif> {{$brand->prodbrand.'('.$brand->total.')'}}
                                                    </li>
                                                    @empty
                                                    <li><input type="checkbox" name="brand[]" value=""> 7</li>
                                                    <li><input type="checkbox" name="brand[]" value=""> 8</li>
                                                    @endforelse
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div> 
                    </div>   
                </div>



            <div class="col-sm-9 col-sm-9 main-pro-inner">
                <div class="row">
                    @forelse($products as $key => $product)
                    <div class="col-sm-4">
                        <div class="product-layouts">
                            <div class="product-thumb transition">
                                <div class="image">
                                    <img class="wheelImage image_thumb" src="{{ViewWheelProductImage($product->prodimage)}}" title="{{$product->prodbrand}}" alt="{{$product->prodbrand}}">
                                    <img class="wheelImage image_thumb_swap" src="{{ViewWheelProductImage($product->prodimage)}}" title="{{$product->prodbrand}}" alt="{{$product->prodbrand}}">
                                    <div class="sale-icon"><a>Sale</a></div>
                                </div>

                                <div class="thumb-description">
                                    <div class="caption">
                                        <h4><a href="{{route('wheels')}}?brand={{base64_encode(json_encode(array($product->prodbrand)))}}">{{$product->prodtitle}} 
                                            <!-- <br> {{'Diameter : '.$product->wheeldiameter}}  -->
                                            <br> {{'PN : '.$product->partno}} 
                                        </a></h4>
                                        <!-- <h6><a href="">Accessories</a></h6> -->
                                        <!-- <div class="rating">
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star off fa-stack-2x"></i></span>
                                            </div> -->
                                        <br>
                                        <div class="price">
                                                <span class="price-new">${{@$product->price}}</span> 
                                                <!-- <span class="price-old">$1,202.00</span> -->
                                                <!-- <span class="price-tax">Ex Tax: $85.00</span> -->
                                            </div>

                                    </div>
                                    <div class="button-group">
                                        <button class="btn-cart" type="button" title="Add to Cart" onclick="cart.add('46');"><i class="fa fa-shopping-cart"></i>
                                            <span class="hidden-xs hidden-sm hidden-md">Add to Cart</span>
                                        </button>
                                        <button class="btn-wishlist" title="Add to Wish List" onclick="wishlist.add('46');"><i class="fa fa-heart"></i>
                                            <span title="Add to Wish List">Add to Wish List</span>
                                        </button>
                                        <button class="btn-compare" title="Add to compare" onclick="compare.add('46');"><i class="fa fa-exchange"></i>
                                            <span title="Add to compare">Add to compare</span>
                                        </button>
                                        
                                        <button class="btn-quickview" type="button" title="Quick View"> <i class="fa fa-eye"></i>
                                            <span>Quick View</span>
                                        </button>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    {{'Not Found'}}
                    @endforelse
                    {{$products->appends(['diameter' => @Request::get('diameter'),'width' => @Request::get('width'),'brand' => @Request::get('brand'),'car_id' => @Request::get('car_id'),'page' => @Request::get('page')])->links()}}
                </div>
            </div>
        </div> 
    </section>   

<div class="container">

    <div class="row" style="display: none;">
        <div class="col-sm-12 sub-head">
            <h1>All Brand Wheels</h1>
        </div>
        <div class="col-md-12">
            <!-- Controls -->
            <div class="controls pull-right hidden-xs">
                <a class="left fa fa-chevron-left btn btn-success" href="#carousel-example2" data-slide="prev"></a><a class="right fa fa-chevron-right btn btn-success" href="#carousel-example2" data-slide="next"></a>
            </div>
        </div>
    </div>
    <div id="carousel-example2" class="carousel slide hidden-xs" data-ride="carousel" style="display: none;">
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            @forelse(wheelbrands($arraysplit=3) as $key => $brandImages)
            <div class="item {{$key == 0 ?'active':''}}">
                <div class="row">
                    @foreach($brandImages as $branddetail)
                    <div class="col-sm-4 news-pro">
                        <div class="col-sm-6 news-img"><img class="wheelImage" src="{{asset($branddetail['image'])}}" style="width: 100%;"></div>
                        <div class="col-sm-6"> <a href="{{route('wheels')}}?brand={{base64_encode(json_encode(array($branddetail['brand'])))}}">
                                <h2 class="news-title"><b>{{$branddetail['style']}}</b></h2>
                                <h2 class="news-title">{{'Diameter : '.$branddetail['wheeldiameter']}}</h2>
                            </a>
                        </div>
                    </div>
                    
                    @endforeach
                </div>
            </div>
            @empty
            <div class="item active">
                <div class="row">
                    <div class="col-sm-4 news-pro">
                        <div class="col-sm-6 news-img"><img src="image/product.png"></div>
                        <div class="col-sm-6">
                            <h1 class="news-date">01 JAN 2019</h1>
                            <h2 class="news-title">Wheel</h2>
                            <p class="news">Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.</p>
                        </div>
                    </div>
                    <div class="col-sm-4 news-pro">
                        <div class="col-sm-6 news-img"><img src="image/product.png"></div>
                        <div class="col-sm-6">
                            <h1 class="news-date">01 JAN 2019</h1>
                            <h2 class="news-title">Wheel</h2>
                            <p class="news">Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.</p>
                        </div>
                    </div>
                    <div class="col-sm-4 news-pro">
                        <div class="col-sm-6 news-img"><img src="image/product.png"></div>
                        <div class="col-sm-6">
                            <h1 class="news-date">01 JAN 2019</h1>
                            <h2 class="news-title">Wheel</h2>
                            <p class="news">Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.</p>
                        </div>
                    </div>

                </div>
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
@section('shop_by_vehicle_scripts') 
    <script src="{{ asset('js/ajax/jquery.min.js') }}"></script>
    <script src="{{ asset('js/shop_by_wheel.js') }}"></script>
    <script src="{{ asset('js/popImg.js') }}"></script>
    <script src="{{ asset('choosen/js/chosen.jquery.min.js') }}"></script> 
    <script src="{{ asset('js/wheels.js') }}"></script>  
    <script src="{{ asset('js/slick.js') }}"></script>
@endsection 
