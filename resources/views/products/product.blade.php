@extends('front.components.layout')

@section('front_body')
    <div class="shop-bg"></div>
    <div class="pop-up clearfix">
        <div id="product-gallery">
            @php
            $mainImg = $files->first()->name;
            @endphp
            <a href="/media_files/product_files/{{$product->id}}/{{$mainImg}}" class="main-image">
                <img src="/media_files/product_files/{{$product->id}}/{{$mainImg}}" alt="$product">
            </a>
            @foreach($files as $file)
            @if($file->name == $mainImg)
                @continue;
            @endif
            <a href="/media_files/product_files/{{$product->id}}/{{$file->name}}" class="main-image">
             <img id="thumb" src="/media_files/product_files/{{$product->id}}/{{$file->name}}" alt="$product">
            </a>
             @endforeach
        </div>
        <!-- PRODUCT INFORMATION -->
        <form action="{{route('cart.add_product',[$product->id])}}" method="POST">
            @csrf
        <div class="product">
            <input type="hidden" name="productId" value="{{$product->id}}" id="prod_id">
            <!--category-breadcrumb-->
            <span class="category">{{$type->type_name}}</span>
            <!--stock-label-->
            <span class="stock">{{$product->quantity > 0 ? 'В наличност':'Изчерпан'}}</span>
            <h1>{{$product->name}}</h1>
            <!--PRICE-RATING-REVIEW-->
            <div class="block-price-rating clearfix">
                <!--price-->
                <div class="block-price clearfix">
                    <div class="price-new clearfix">
                        <span class="price-new-dollar">{{$product->promotional_price}}BGN</span>
                        {{--<span class="price-new-cent">90</span>--}}
                    </div>
                    <div class="price-old clearfix">
                        <span class="price-old-dollar">{{$product->regular_price}}BGN</span>
                        {{--<span class="price-old-cent">&#8228;90</span>--}}
                    </div>
                </div>
                <!--rating-->
                {{--<div class="block-rating clearfix">--}}
                    {{--<!--review-->--}}
                    {{--<span class="review">40 Reviews</span>--}}
                    {{--<span class="rating"><img src="http://thrivedigital.wpengine.com/wp-content/uploads/2015/03/Review-Stars.png"></span>--}}
                {{--</div>--}}
            </div>
            <!--PRODUCT DESCRIPTION-->
            <div class="descr">
                <p>{{$product->description}}</p>
            </div>
            <!--SELECT BLOCK-->
            <div class="block-select clearfix">

                    <div class="select-color">
                        <span>Цвят</span>
                        <select class="color" name="attribute">
                            <option>{{$attribute->value}}</option>
                        </select>
                    </div>
                    <div class="select-size">
                        <span>Количество</span>
                        <select class="size size_packing" name="size_packing">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                        </select>
                    </div>
                    <!--BUTTON-->
                    <button type="submit" class="btn product-order-btn"  id="orderBtn"><img src="">Добави в количката</button>
                </form>
            </div>
            <!--LINKS-->
            <div class="block-footer clearfix">
                <div class="block-links">
                    <div class="send">
                        <img src="http://www.free-icons-download.net/images/share-icon-20724.png">
                        <span>Send to a friend</span>
                    </div>
                    <div class="wishlist">
                        <img src="https://d30y9cdsu7xlg0.cloudfront.net/png/23243-200.png">
                        <span>Добави в любими</span>
                    </div>
                </div>
                <!--SOCIAL-->
                <div class="social">
                    <a href="#"><img src="http://www.iconsdb.com/icons/download/black/facebook-7-256.gif" alt="sdf"></a>
                    <a href="#"><img src="http://www.iconsdb.com/icons/download/black/twitter-4-512.gif"></a>
                    <a href="#"><img src="http://www.iconsdb.com/icons/download/black/google-plus-4-512.jpg"></a>
                    <a href="#"><img src="http://www.nataliemorgan.co.nz/images/Pinterest.png"></a>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('css')
<style>
    /*PRODUCT INFORMATION*/
    .product {
        float: right;
        /*width: 430px;*/
        position: absolute;
        top: 133px;
        left: 729px;
    }
    span.category {
        display: block;
        font-weight: 700;
        color: #888;
        font-size: 12px;
        line-height: 14px;
        font-style: italic;
    }
    .product .category:hover {
        color: #999;
        cursor: pointer;
    }
    .product h1 {
        width: 300px;
        font-size: 21px;
        line-height: 24px;
        margin-top: 5px;
        color: #333;
        text-transform: uppercase;
        letter-spacing: .3px;
    }
    /*STOCK LABEL*/
    span.stock {
        display: block;
        float: right;
        position: relative;
        top: 4px;
        line-height: 11px;
        padding: 6px 12px 5px 12px;
        font-size: 11px;
        font-weight: bold;
        text-transform: uppercase;
        color: #fff;
        background: #18d11f;
        border-radius: 14px;
        letter-spacing: .3px;
    }
    /*PRICE & RATING*/
    .block-price-rating {
        width: 100%;
        margin-top: 10px;
    }
    .block-price {
        float: left;
        width: auto;
        margin-right: 20px;
    }
    .price-new {
        float: left;
        font-weight: bold;
        margin-right: 10px;
    }
    .price-new-dollar {
        float: left;
        display: block;
        font-size: 24px;
        margin-right: 5px;
        color: #333;
    }
    .price-new-cent {
        font-size: 14px;
    }
    .price-old {
        text-decoration: line-through;
        color: #444;
        font-size: 14px;
        position: relative;
        top: 6px;
    }
    /*rating*/
    .block-rating {
        float: right;
        position: relative;
        top: 2px;
    }
    span.rating img {
        display: block;
        float: left;
        width: 110px;
        margin-left: 10px;
    }
    span.rating img:hover {
        cursor: pointer;
    }
    /*review*/
    span.review {
        display: block;
        float: left;
        position: relative;
        top: 6px;
        font-weight: 700;
        color: #888;
        font-size: 12px;
        font-style: italic;
    }
    span.review:hover {
        color: #999;
        cursor: pointer;
    }
    /*PRODUCT DESCRIPTION*/
    .descr {
        font-size: 14px;
        line-height: 18px;
        color: #444;
        letter-spacing: .3px;
        margin-top: 10px;
        width: 430px;
        height: 71px;
        overflow: hidden;
        text-overflow: ellipsis;
        /*white-space: no-wrap;*/
    }
    /*SELECT BLOCK*/
    .block-select {
        margin-top: 15px;
    }
    .select-color,
    .select-size {
        float: left;
        font-size: 14px;
        font-weight: 700;
        color: #888;
    }
    .select-color span,
    .select-size span {
        display: block;
        margin-bottom: 5px;
    }
    select.color {
        width: 320px;
        margin-right: 10px;
    }
    select.size {
        width: 100px;
    }
    select.color, select.size {
        padding: 8px 10px;
        border: .5px solid #ddd;
        border-radius: 2px;
        text-transform: uppercase;
        font-weight: 700;
        opacity: .7;
        letter-spacing: .3px;
    }
    /*BUTTON*/
    .btn {
        margin: 10px auto;
        text-align: center;
        font-size: 14px;
        font-weight: 700;
        color: #fff;
        letter-spacing: .3px;
        text-transform: uppercase;
        padding: 15px 0;
        width: 100%;
        border-radius: 2px;
        cursor: pointer;
        background: #222;
    }
    .btn:hover {
        background: #fff;
        color: #222;
        font-size: 14px;
        font-weight: 700;

    }
    /*LINKS*/
    .block-footer {
        width: 100%;
        margin-top: 10px;
    }
    .block-links {
        float: left;
        cursor: pointer;
    }
    .block-links img {
        width: 20px;
        opacity: .3;
        vertical-align: middle;
        margin-right: 5px;
    }
    .block-links span {
        font-size: 11px;
        color: #888;
        font-weight: 700;
        letter-spacing: .3px;
        text-transform: uppercase;
        font-style: italic;
    }
    .block-links span:hover {
        color: #999;
    }
    .wishlist {
        margin-top: 5px;
    }
    /*SOCIAL*/
    .social {
        float: right;
        position: relative;
        top: 5px;
    }
    .social img {
        width: 36px;
        opacity: .3;
        cursor: pointer;
        margin-right: 3px;
        display: inline;
    }
    .social img:nth-child(4) {
        margin-right: 0;
    }
    .social img:hover {
        opacity: .2;
    }
    #product-gallery {
        /*   background-color: red; */
        max-width: 720px;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        padding: 37px;
    }
    #product-gallery #thumb{
        max-width: 150px;
        max-height: 100px;

    }
    a {
        text-decoration: none;
        /*margin: 0px 5px;*/
    }
    .main-image {
        display: block;
    }
    .main-image img {
        max-width: 720px;
        width: 100%;
    }
</style>
    @endsection
@section('js')
{{--<script>--}}
    {{--lightGallery(document.getElementById('product-gallery'), {--}}
        {{--thumbnail: true,--}}
        {{--download: false,--}}
    {{--});--}}
{{--</script>--}}
{{--<script>--}}
    {{--$(".product-order-btn").click( function () {--}}
        {{--console.log($("#prod_id").val());--}}
        {{--addCartProduct({{$product->id}},$("select.size_packing").children("option:selected").val());--}}
    {{--});--}}
    {{--function addCartProduct(productId, qty)--}}
    {{--{--}}
        {{--var url = '/cart/add-product';--}}

        {{--var data = {--}}
            {{--"productId": productId,--}}
            {{--"quantity": qty--}}
        {{--};--}}

        {{--$.post(url, data, function(data, status) {--}}
        {{--if(data.status=="error") {--}}
        {{--alert(data.error_message);--}}
        {{--} else {--}}
        {{--var eventId = 'add_' + data.cartId  + '_' +  {{ $product->id }} + '_' + $.now();--}}
        {{--// send server-side FB event--}}
        {{--$.ajax({--}}
        {{--method: "GET",--}}
        {{--url: "{{ route('cart.send_add_to_cart_event') }}?product_id=" + {{ $product->id }} + '&price={{ $productSellPriceLocalized }}' + '&url={{  url()->current() }}' + '&eventId=' + eventId + '&quantity=' + qty,--}}
        {{--}).done(function (data) {--}}
        {{--// maybe check result and do something further. So far not needed--}}
        {{--});--}}
        {{--window.location.href = "/cart";--}}
        {{--}--}}

        {{--});--}}
    {{--}--}}

{{--</script>--}}
    @endsection