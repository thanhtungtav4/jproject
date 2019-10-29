@extends('layout')
@section('header')
    @include('components.header',['title' => 'Config'])
@endsection
@section('content')
    <div class="kt-subheader kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">@lang('admin::category.index.tao_category')</h3>
            <span class="kt-subheader__separator kt-subheader__separator--v"></span>
            <div class="kt-subheader__group" id="kt_subheader_search">
                <span class="kt-subheader__desc" id="kt_subheader_total"> </span>

            </div>
            <div class="kt-subheader__group kt-hidden" id="kt_subheader_group_actions">
            </div>
        </div>
        <div class="kt-subheader__toolbar">
            <button type="button" class="form-control btn btn-primary" onclick="category.create()">@lang('admin::category.index.tao')</button>
            @if($category == 'product')
                <a href="{{ route('admin.product.category') }}"><button type="button" class="btn btn-secondary btn-hover-danger">@lang('admin::category.index.huy')</button> </a>
            @else
                <a href="{{ route('admin.solution.category') }}"><button type="button" class="btn btn-secondary btn-hover-danger">@lang('admin::category.index.huy')</button> </a>
            @endif
        </div>
    </div>
    <!--begin: Datatable -->
    <form id="create-category" class="kt-form" method="POST">
        <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
            <div class="kt-portlet kt-portlet--tabs">
                <div class="kt-portlet__body">
                    <div class="tab-pane active" id="kt_widget3_tab1_content">
                        <!--Begin::Timeline 3 -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#" data-target="#name_vi">VI</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#name_en">EN</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane active" id="name_vi" role="tabpanel">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3">
                                            <label>@lang('admin::category.index.tieu_de_category')</label>
                                        </div>
                                        <div class="col-9">
                                            <input type="text" class="form-control" name="name_vi" placeholder="@lang('admin::category.index.ten_tieng_viet')">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="name_en" role="tabpanel">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3">
                                            <label>@lang('admin::category.index.tieu_de_category')</label>
                                        </div>
                                        <div class="col-9">
                                            <input type="text" class="form-control" name="name_en" placeholder="@lang('admin::category.index.ten_tieng_anh')">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-3">
                                    <label>@lang('admin::category.index.vi_tri')</label>
                                </div>
                                <div class="col-9">
                                    <input type="text" class="form-control" name="ordering" placeholder="@lang('admin::category.index.vi_tri')">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <input type="text" hidden name="parent_id" value="{{$parent_id}}">
    </form>
@endsection

@section('after_style')
    <link href="{{asset('static/backend/css/style/style.css?v='.time())}}" rel="stylesheet"/>
@endsection

@section('after_script')
    <script type="text/javascript" src="{{ asset('static/backend/js/admin/script.js?v='.time()) }}"></script>
@endsection
