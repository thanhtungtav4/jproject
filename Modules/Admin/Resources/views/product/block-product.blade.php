@extends('layout')
@section('header')
    @include('components.header',['title' => 'Config'])
@endsection
@section('content')
    <div class="kt-subheader kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">@lang('admin::product.index.danh_sach_block_san_pham') {{$title}} </h3>
            <span class="kt-subheader__separator kt-subheader__separator--v"></span>
            <div class="kt-subheader__group" id="kt_subheader_search">
                <span class="kt-subheader__desc" id="kt_subheader_total"> </span>

            </div>
            <div class="kt-subheader__group kt-hidden" id="kt_subheader_group_actions">

            </div>
        </div>
        <div class="kt-subheader__toolbar">
        </div>
    </div>
    <!--begin: Datatable -->
    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
        <div class="kt-portlet kt-portlet--tabs">
            <div class="kt-portlet__body">
                <div class="tab-pane active" id="kt_widget3_tab1_content">
                    <!--Begin::Timeline 3 -->

                    <div class="form-group">
                        <div class="row">
                            <div class="col-2">
                                @include('helpers.button', ['button' => [
                                   'route' => 'admin.map',
                                   'html' => '<a href="'.route('admin.map',['page_id' => $page_id, 'plugin_type' => 'content-box']).'" class="btn btn-label-brand btn-bold">'
                                   .'Cấu hình'.
                               '</a>'
                               ]])
                                @include('helpers.button', ['button' => [
                                   'route' => 'admin.map',
                                   'html' => '<a href="'.route('admin.map',['page_id' => $page_id, 'plugin_type' => 'content-box','action' => 'xem']).'" class="btn btn-label-brand btn-bold">'
                                   .'Xem'.
                               '</a>'
                               ]])
                            </div>
                            <div class="col-10">
                                <h3>@lang('admin::product.index.block_content')</h3>
                            </div>
                        </div>
                    </div>

{{--                    <div class="form-group">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-2">--}}
{{--                                <a href="{{route('admin.map',['page_id' => $page_id, 'plugin_type' => 'content-box'])}}" class="btn btn-primary">Cấu hình</a>--}}
{{--                            </div>--}}
{{--                            <div class="col-10">--}}
{{--                                <h3>Quản lý thông minh</h3>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <div class="form-group">
                        <div class="row">
                            <div class="col-2">
                                @include('helpers.button', ['button' => [
                                  'route' => 'admin.map',
                                  'html' => '<a href="'.route('admin.map',['page_id' => $page_id, 'page_type' => 'product-price']).'" class="btn btn-label-brand btn-bold">'
                                  .'Cấu hình'.
                                '</a>'
                                ]])
                            </div>
                            <div class="col-10">
                                <h3>@lang('admin::product.index.block_goi_dich_vu')</h3>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-2">
{{--                                <a href="{{route('admin.map',['page_id' => $page_id, 'plugin_type' => 'item-box'])}}" class="btn btn-primary">@lang('admin::product.index.cau_hinh')</a>--}}
                                @include('helpers.button', ['button' => [
                                  'route' => 'admin.map',
                                  'html' => '<a href="'.route('admin.map',['page_id' => $page_id, 'plugin_type' => 'item-box']).'" class="btn btn-label-brand btn-bold">'
                                  .'Cấu hình'.
                                  '</a>'
                                  ]])
                                @include('helpers.button', ['button' => [
                                  'route' => 'admin.map',
                                  'html' => '<a href="'.route('admin.map',['page_id' => $page_id, 'plugin_type' => 'item-box','action'=>'xem']).'" class="btn btn-label-brand btn-bold">'
                                  .'Xem'.
                                  '</a>'
                                  ]])
                            </div>
                            <div class="col-10">
                                <h3>@lang('admin::product.index.block_item')</h3>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-2">
                                @include('helpers.button', ['button' => [
                                  'route' => 'admin.map',
                                  'html' => '<a href="'.route('admin.map',['page_id' => $page_id, 'plugin_type' => 'footer-box']).'" class="btn btn-label-brand btn-bold">'
                                  .'Cấu hình'.
                                  '</a>'
                                  ]])
                                @include('helpers.button', ['button' => [
                                  'route' => 'admin.map',
                                  'html' => '<a href="'.route('admin.map',['page_id' => $page_id, 'plugin_type' => 'footer-box','action'=>'xem']).'" class="btn btn-label-brand btn-bold">'
                                  .'Xem'.
                                  '</a>'
                                  ]])
                            </div>
                            <div class="col-10">
                                <h3>@lang('admin::product.index.block_footer')</h3>
                            </div>
                        </div>
                    </div>
                    <!--End::Timeline 3 -->
                </div>
            </div>
        </div>
    </div>
@endsection
