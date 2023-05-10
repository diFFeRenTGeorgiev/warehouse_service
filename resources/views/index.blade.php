@extends('components.layout')
@section('content')
<section class="section section-campany-baners">
    <div class="container">
        <div class="row">
            <a href="/var/www/warehouse_service/public/files/main_banner.jpg" class="col-sm-8">
                <div class="card card-campany">
                    <div class="card-img-top">
                        <img class="lazyload"
                             src="files/banner.jpg"
                             data-src="files/main_banner.jpg" style="width: 1109px; height: 393px;">
                    </div>
                </div><!-- /.card card-campany -->
            </a><!-- /.col-sm-4 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.section -->
@endsection
<style>
    .col-sm-8{
       margin-left: 14px !important;
        width:100% !important;
    }
</style>