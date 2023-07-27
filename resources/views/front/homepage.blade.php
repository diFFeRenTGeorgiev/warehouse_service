@extends('front.components.layout')
@section('front_body')
    <section class="section section-campany-baners">
        <div class="container">
            <div class="row">
                <a href="#" class="col-xs-6">
                    <div class="card card-campany">
                        <div class="card-img-top">
                            <img class="lazyload"
                                 src="/files/banner.jpg"
                                 data-src="files/main_banner.jpg" style="width: 100%; height: 393px;">
                        </div>
                    </div><!-- /.card card-campany -->
                </a><!-- /.col-sm-4 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.section -->
@endsection
<style>
    .col-xs-6{
        /*margin-left: 14px !important;*/
        width:97% !important;
        float: unset !important;
    }
</style>