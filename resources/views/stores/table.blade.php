<?php
@extends('admin.layout')

@section('title')
    Layout block wizard
@endsection

@section('page_title')
    Layout block wizard
@endsection
@section('style')
    {{--<link href="public/themes/metronic/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css"/>--}}


@endsection

@section('subheader_toolbar')

    <div class="d-flex align-items-center">
        <!--begin::Actions-->
        <a href="{{route('admin.lbw.create')}}" role="button" class="btn btn-success"><i class="flaticon2-plus"></i> Създай нов елемент</a>
        <!--end::Actions-->
    </div>
    <div class="d-flex align-items-center">
        <!--begin::Actions-->
        <a href="#" role="button" onclick="getCheckedIds()" class="btn btn-success"><i class="flaticon2-plus"></i> Суру</a>
        <!--end::Actions-->
    </div>

@endsection

@section('body_content')

    <div class="row">
        <div class="col-lg-12">

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
                                        @foreach(\App\Constant\LayoutRegionConstant::ALL as $layoutRegion)
                                            <option value="{{$layoutRegion}}" {{ old('region_name') == $layoutRegion ? 'selected' : '' }}>{{$layoutRegion}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <label for="status">Country:</label>
                                <div class="input-group">
                                    <select name="locale" class="form-control selectpicker" data-show-content="true">
                                        <option value="">-all-</option>
                                        @foreach(locales() as $local)
                                            @php
                                                $imgUrl=asset('images/flags/64x64/'.$local.'.png');
                                            @endphp
                                            <option value="{{$local}}" {{ old('locale') == $local ? 'selected' : '' }} data-content='<img src="{{$imgUrl}}" style="width:24px;height:20px;" alt="{{$local}}"> {{country($local)}}'>{{$local}}</option>
                                        @endforeach
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
            </div>
            <!--end::Portlet-->
        {{--Table display layouts--}}

        @if (count($blocks)>0)
            <!--begin::Portlet-->
                <div class="kt-portlet">
                    <div class="kt-portlet__body">
                        <!--begin::Section-->
                        <div class="kt-section">
                            <div class="kt-section__content">

                                <div class="table-responsive table-loading">

                                    <table id="kt_datatable_horizontal_scroll" class="table table-striped  table-row-bordered gy-5 gs-7">
                                        <thead class="thead-light">
                                        <tr>
                                            <th class="text-center font-weight-bold"></th>
                                            <th class="text-center font-weight-bold">Id</th>
                                            <th class="text-center font-weight-bold">Name</th>
                                            <th class="text-center font-weight-bold">Layout region</th>
                                            <th class="text-center font-weight-bold">Country</th>
                                            <th class="text-center font-weight-bold">Type</th>
                                            <th class="text-center font-weight-bold">Active ID</th>
                                            <th class="text-center font-weight-bold">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse ($blocks as $layout)
                                            <tr>
                                                <td style="text-align: center"> <input type="checkbox" name="LbwItemDownload[]" value="{{ $layout->id }}"></td>
                                                <td style="text-align: center" data-table-header="id">{{$layout->id}}</td>
                                                <td style="text-align: center" id="td_{{$layout->id}}">{{$layout->name}}</td>
                                                <td style="text-align: center">{{$layout->region_name}}</td>
                                                <td>
                                                    @if(!empty($layout->locale))
                                                        <img  src="{{asset('images/flags/64x64/'.$layout->locale.'.png')}}" style="width:24px;height:20px;margin-left: auto;margin-right: auto;display:block;" alt="{{$layout->locale}}" title="{{country($layout->locale)}}">
                                                    @endif
                                                </td>
                                                <td style="text-align: center"> @if(!empty($layout->type))
                                                        {{$layout->type}}
                                                    @endif</td>
                                                <td style="text-align: center;">
                                                    @if(!empty($layout->active_id))
                                                        {{$layout->active_id}}
                                                    @else
                                                        Not Active
                                                    @endif
                                                </td>
                                                </td>

                                                <td class="text-center">
                                                    <a href="{{ route('admin.lbw.create', ['lbw_item_id' => $layout->id]) }}" role="button" class="btn btn-sm btn-outline-brand btn-icon">
                                                        <i class="flaticon-edit"></i></a>
                                                    <a  onclick="deleteRow(this,{{$layout->id}})" class="btn btn-sm btn-outline-danger btn-icon">
                                                        <i class="flaticon-delete"></i></a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="42" class="text-center">Все още няма създадени блокове.</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--end::Section-->
                    </div>
                </div>
                <!--end::Portlet-->
            @else
                <div class="alert alert-outline-info alert-dismissible">
                    <strong>Няма създадени/намерени блокове.</strong>
                </div>
            @endif
            {{--End Table display layouts--}}

            @endsection


            @section('page_js')
                <script src="public/themes/metronic/assets/plugins/custom/datatables/datatables.bundle.js"></script>
                <script src="{{ asset('custom/components/filters-form.js') }}" type="text/javascript"></script>
                <script>


                    $("#kt_datatable_horizontal_scroll").DataTable({
                        "scrollX": true
                    });


                </script>
                @parent

                <script>
                    $(document).ready(function(e) {
                        $('input').keypress(function (e) {
                            if (e.which == 13) {
                                $('#submit-form').trigger('click');
                            }
                        });
                    });

                </script>
                <script>
                    function deleteRow(btn, id) {
                        var confirmBox = confirm("Сигурни ли сте, че желаете да изтриете позицията?");
                        if (confirmBox === true) {
                            if (id) {
                                $.ajax({
                                    url: '{{route('admin.lbw.deleteLbwItem')}}',
                                    type: 'post',
                                    data: {
                                        lbw_item_id: id
                                    },
                                    success: function (r) {
                                        alert(r.info);
                                        location.reload();
                                    }
                                });
                            }
                        }
                    }

                    function getCheckedIds() {
                        var checkedIds = [];
                        $('input[name="LbwItemDownload[]"]:checked').each(function() {
                            checkedIds.push($(this).val());
                        });

                        $.ajax({
                            url: "{{ route('admin.lbw.downloadItems') }}",
                            type: "POST",
                            data: { lbw_item_id: checkedIds },
                            success: function(data) {
                                console.log(data);
                            }
                        });
                    }

                </script>





@endsection




