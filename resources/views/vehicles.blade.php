@extends('components.layout')
{{--@section('title')--}}
    {{--Редакция: Създаване на продукт--}}
{{--@endsection--}}
@section('content')

    <div class="d-flex align-items-center">
        <!--begin::Actions-->
        <a role="button" class="btn btn-success">
            <i class="flaticon2-plus">
            </i> Създай нов елемент</a>
        <!--end::Actions-->
    </div>
    <div class="d-flex align-items-center">
        <!--begin::Actions-->
        <a href="#" role="button" onclick="getCheckedIds()" class="btn btn-success"><i class="flaticon2-plus"></i> Суру</a>
        <!--end::Actions-->
    </div>

<!--begin::Portlet-->
<div class="kt-portlet" id="kt_portlet_filters_form">
    <div class="kt-portlet__head kt-ribbon kt-ribbon--success">
        <div class="kt-ribbon__target" style="top: 15px; left: -14px;"><i class="fa fa-search"></i></div>
        <div class="kt-portlet__head-label" onclick="document.getElementById('searchOptionsToggleBtn').click();"
             style="min-width:70%">
            <h3 class="kt-portlet__head-title">
                Филтри
            </h3>
        </div>
        <div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-group">
                <a href="javascript:;" data-ktportlet-tool="toggle" id="searchOptionsToggleBtn"
                   class="btn btn-sm btn-icon btn-outline-brand btn-icon-md"><i
                            class="la la-angle-down"></i></a>
                <a href="javascript:;" data-ktportlet-tool="reload"
                   class="btn btn-sm btn-icon btn-outline-success btn-icon-md"><i
                            class="la la-refresh"></i></a>
            </div>
        </div>
    </div>
    <!--begin::Form-->
    <form id="filters_form" name="filters_form" class="kt-form kt-form--label-right" method="GET" action="">
        <div class="kt-portlet__body">
            <div class="form-group row">
                <div class="col-lg-3">
                    <label>Layout region:</label>
                    <div class="input-group">
                        <select name="region_name" class="form-control">
                            <option value="">-all-</option>
                            {{--@foreach(\App\Constant\LayoutRegionConstant::ALL as $layoutRegion)--}}
                                {{--<option value="{{$layoutRegion}}" {{ old('region_name') == $layoutRegion ? 'selected' : '' }}>{{$layoutRegion}}</option>--}}
                            {{--@endforeach--}}
                        </select>
                    </div>
                </div>
                <div class="col-lg-2">
                    <label for="status">Country:</label>
                    <div class="input-group">
                        <select name="locale" class="form-control selectpicker" data-show-content="true">
                            <option value="">-all-</option>
                            {{--@foreach(locales() as $local)--}}
                                {{--@php--}}
                                    {{--$imgUrl=asset('images/flags/64x64/'.$local.'.png');--}}
                                {{--@endphp--}}
                                {{--<option value="{{$local}}" {{ old('locale') == $local ? 'selected' : '' }} data-content='<img src="{{$imgUrl}}" style="width:24px;height:20px;" alt="{{$local}}"> {{country($local)}}'>{{$local}}</option>--}}
                            {{--@endforeach--}}
                        </select>
                    </div>
                </div>
                <div class="col-lg-2">
                    <label for="status">Type:</label>
                    <div class="input-group">
                        <select name="type" class="form-control selectpicker" data-show-content="true">
                            <option value="">-all-</option>
                            <option value="slider">Slider</option>
                            <option value="blocks">Blocks</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="kt-portlet__foot">
                <div class="kt-form__actions">
                    <div class="row">
                        <div class="col-lg-12">
                            <button type="submit-form" class="btn btn-primary">Филтриране</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!--end::Form-->

<!--end::Portlet-->
{{--<div id="tabVehicles" class="content-pane is-active">--}}
    {{--<p>Vehicles</p>--}}
    {{--<div class="kt-portlet">--}}
        {{--<div class="kt-portlet__body">--}}
            {{--<!--begin::Section-->--}}
            {{--<div class="kt-section">--}}
                {{--<div class="kt-section__content">--}}

                    {{--<div class="table-responsive table-loading">--}}

                        {{--<table id="kt_datatable_horizontal_scroll" class="table table-striped  table-row-bordered gy-5 gs-7">--}}
                            {{--<thead class="thead-light">--}}
                            {{--<tr>--}}
                                {{--<th class="text-center font-weight-bold"></th>--}}
                                {{--<th class="text-center font-weight-bold">Id</th>--}}
                                {{--<th class="text-center font-weight-bold">Name</th>--}}
                                {{--<th class="text-center font-weight-bold">Model</th>--}}
                                {{--<th class="text-center font-weight-bold">Year</th>--}}
                                {{--<th class="text-center font-weight-bold">Fuel</th>--}}
                                {{--<th class="text-center font-weight-bold">Engine</th>--}}
                                {{--<th class="text-center font-weight-bold">HP</th>--}}
                            {{--</tr>--}}
                            {{--</thead>--}}
                            {{--<tbody>--}}
                            {{--@forelse ($vehicles as $vehicle)--}}
                                {{--<tr>--}}
                                    {{--<td style="text-align: center"> <input type="radio" name="vehicle[]" value="{{ $vehicle->id }}"></td>--}}
                                    {{--<td style="text-align: center" data-table-header="id">{{$vehicle->id}}</td>--}}
                                    {{--<td style="text-align: center" id="td_{{$vehicle->id}}">{{$vehicle->vehicle_name}}</td>--}}
                                    {{--<td style="text-align: center">{{$vehicle->name_model}}</td>--}}
                                    {{--<td style="text-align: center">{{$vehicle->model_year}}</td>--}}
                                    {{--<td style="text-align: center">{{$vehicle->fuel}}</td>--}}
                                    {{--<td style="text-align: center">{{$vehicle->engine}}</td>--}}
                                    {{--<td style="text-align: center">{{$vehicle->hp}}</td>--}}




                                {{--</tr>--}}
                            {{--@empty--}}
                                {{--<tr>--}}
                                    {{--<td colspan="42" class="text-center">Все още няма създадени блокове.</td>--}}
                                {{--</tr>--}}
                            {{--@endforelse--}}
                            {{--</tbody>--}}
                        {{--</table>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<!--end::Section-->--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
<table class="container">
    <thead>
    <tr>
        <th><h1>Sites</h1></th>
        <th><h1>Views</h1></th>
        <th><h1>Clicks</h1></th>
        <th><h1>Average</h1></th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>Google</td>
        <td>9518</td>
        <td>6369</td>
        <td>01:32:50</td>
    </tr>
    <tr>
        <td>Twitter</td>
        <td>7326</td>
        <td>10437</td>
        <td>00:51:22</td>
    </tr>
    <tr>
        <td>Amazon</td>
        <td>4162</td>
        <td>5327</td>
        <td>00:24:34</td>
    </tr>
    <tr>
        <td>LinkedIn</td>
        <td>3654</td>
        <td>2961</td>
        <td>00:12:10</td>
    </tr>
    <tr>
        <td>CodePen</td>
        <td>2002</td>
        <td>4135</td>
        <td>00:46:19</td>
    </tr>
    <tr>
        <td>GitHub</td>
        <td>4623</td>
        <td>3486</td>
        <td>00:31:52</td>
    </tr>
    </tbody>
</table>
</div>
@endsection
@section('page_css')
    <style>
        /*
 Table Responsive
 ===================
 Author: https://github.com/pablorgarcia
*/

        /*@charset "UTF-8";*/
        @import url(https://fonts.googleapis.com/css?family=Open+Sans:300,400,700);

        body {
            font-family: 'Open Sans', sans-serif;
            font-weight: 300;
            line-height: 1.42em;
            color:#A7A1AE;
            background-color:#1F2739;
        }

        h1 {
            font-size:3em;
            font-weight: 300;
            line-height:1em;
            text-align: center;
            color: #4DC3FA;
        }

        h2 {
            font-size:1em;
            font-weight: 300;
            text-align: center;
            display: block;
            line-height:1em;
            padding-bottom: 2em;
            color: #FB667A;
        }

        h2 a {
            font-weight: 700;
            text-transform: uppercase;
            color: #FB667A;
            text-decoration: none;
        }

        .blue { color: #185875; }
        .yellow { color: #FFF842; }

        .container th h1 {
            font-weight: bold;
            font-size: 1em;
            text-align: left;
            color: #185875;
        }

        .container td {
            font-weight: normal;
            font-size: 1em;
            -webkit-box-shadow: 0 2px 2px -2px #0E1119;
            -moz-box-shadow: 0 2px 2px -2px #0E1119;
            box-shadow: 0 2px 2px -2px #0E1119;
        }

        .container {
            text-align: left;
            overflow: hidden;
            width: 80%;
            margin: 0 auto;
            display: table;
            padding: 0 0 8em 0;
        }

        .container td, .container th {
            padding-bottom: 2%;
            padding-top: 2%;
            padding-left:2%;
        }

        /* Background-color of the odd rows */
        .container tr:nth-child(odd) {
            background-color: #323C50;
        }

        /* Background-color of the even rows */
        .container tr:nth-child(even) {
            background-color: #2C3446;
        }

        .container th {
            background-color: #1F2739;
        }

        .container td:first-child { color: #FB667A; }

        .container tr:hover {
            background-color: #464A52;
            -webkit-box-shadow: 0 6px 6px -6px #0E1119;
            -moz-box-shadow: 0 6px 6px -6px #0E1119;
            box-shadow: 0 6px 6px -6px #0E1119;
        }

        .container td:hover {
            background-color: #FFF842;
            color: #403E10;
            font-weight: bold;

            box-shadow: #7F7C21 -1px 1px, #7F7C21 2px 2px, #7F7C21 -3px 3px, #7F7C21 -4px 4px, #7F7C21 -5px 5px, #7F7C21 -6px 6px;
            transform: translate3d(6px, -6px, 0);

            transition-delay: 0s;
            transition-duration: 0.4s;
            transition-property: all;
            transition-timing-function: linear;
        }

        @media (max-width: 800px) {
            .container td:nth-child(4),
            .container th:nth-child(4) { display: none; }
        }
    </style>
@endsection

