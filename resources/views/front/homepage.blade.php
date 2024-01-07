@extends('front.components.layout')
@section('front_body')
    <div class="banner section section-campany-baners">
        <div class="container mainBan">
            <div class="content">
                {{--<a href="#" class="col-xs-6">--}}
                    {{--<div class="card card-campany">--}}
                        {{--<div class="card-img-top">--}}
                            {{--<img class="lazyload"--}}
                                 {{--src="/files/banner.jpg"--}}
                                 {{--data-src="files/main_banner.jpg" style="width: 100%; height: 393px;">--}}
                        {{--</div>--}}
                    {{--</div><!-- /.card card-campany -->--}}
                {{--</a><!-- /.col-sm-4 -->--}}
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.section -->
@endsection
<style>
    .col-xs-6{
        /*margin-left: 14px !important;*/
        width:97% !important;
        float: unset !important;
    }
    .banner {
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('../../../files/banner.jpg') no-repeat center center;
        /*width:1280px;*/
        /*height: 300px;*/
        background-size: cover;
        color: #fff;
        display: flex;
    }
    .banner:before {
        content: "";
        float: left;
        padding-bottom: 40%;
    }
    .banner:after {
        content: "";
        display: table;
        clear: both;
    }
    .mainBan {
        max-width: 768px;
        margin: 0 auto;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .mainBan {
        text-align: center;
        padding: 20px;
    }
</style>