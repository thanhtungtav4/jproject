@extends('layout')
@section('header')
    @include('components.header',['title' => 'Config'])
@endsection
@section('content')
    <div class="kt-subheader kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">@lang('admin::solution-list.index.name_tittle')</h3>
            <span class="kt-subheader__separator kt-subheader__separator--v"></span>
            <div class="kt-subheader__group" id="kt_subheader_search">
                <span class="kt-subheader__desc" id="kt_subheader_total"> </span>

            </div>
            <div class="kt-subheader__group kt-hidden" id="kt_subheader_group_actions">

            </div>
        </div>
        {{--<div class="kt-subheader__toolbar">--}}
            {{--<a href="{{route('admin.page.edit',['id' => $page_id,'category' => $category , 'page_type' => $page ])}}"><button type="button" class="btn btn-primary">Chỉnh sửa trang</button> </a>--}}
        {{--</div>--}}
    </div>
    <!--begin: Datatable -->
    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
        <div class="kt-portlet kt-portlet--tabs">
            <div class="kt-portlet__body">
                <div class="tab-pane active" id="kt_widget3_tab1_content">
                    <!--Begin::Timeline 3 -->
                    <div class="form-group">
                        <div class="row">
                            <div class="col-10">
                                <h3>@lang('admin::home-page.index.home-webcome1')</h3>
                            </div>
                            <div class="col-2">
                                @include('helpers.button', ['button' => [
                                    'route' => 'admin.map',
                                    'html' => '<a href="'.route('admin.config.edit',['id' => '9']).'" class="btn btn-primary">'
                                    .'Cấu hình'.
                                '</a>'
                                ]])
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-10">
                                <h3>@lang('admin::home-page.index.home-webcome2')</h3>
                            </div>
                            <div class="col-2">
                                @include('helpers.button', ['button' => [
                                    'route' => 'admin.map',
                                    'html' => '<a href="'.route('admin.config.edit',['id' => '10']).'" class="btn btn-primary">'
                                    .'Cấu hình'.
                                '</a>'
                                ]])
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-10">
                                <h3>@lang('admin::home-page.index.solution')</h3>
                            </div>
                            <div class="col-2">
                                @include('helpers.button', ['button' => [
                                    'route' => 'admin.map',
                                    'html' => '<a href="'.route('admin.map',['page_id' => $page_id, 'plugin_type' => 'solution-list']).'" class="btn btn-primary">'
                                    .'Cấu hình'.
                                '</a>'
                                ]])
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-10">
                                <h3>@lang('admin::home-page.index.about-home')</h3>
                            </div>
                            <div class="col-2">
                                @include('helpers.button', ['button' => [
                                    'route' => 'admin.map',
                                    'html' => '<a href="'.route('admin.map',['page_id' => $page_id, 'plugin_type' => 'about-home-list']).'" class="btn btn-primary">'
                                    .'Cấu hình'.
                                '</a>'
                                ]])
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-10">
                                <h3>@lang('admin::home-page.index.home-map')</h3>
                            </div>
                            <div class="col-2">
                                @include('helpers.button', ['button' => [
                                    'route' => 'admin.map',
                                    'html' => '<a href="'.route('admin.config.edit',['id' => '11']).'" class="btn btn-primary">'
                                    .'Cấu hình'.
                                '</a>'
                                ]])
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-10">
                                <h3>@lang('admin::home-page.index.client-home-list')</h3>
                            </div>
                            <div class="col-2">
                                @include('helpers.button', ['button' => [
                                    'route' => 'admin.map',
                                    'html' => '<a href="'.route('admin.map',['page_id' => $page_id, 'plugin_type' => 'client-home-list']).'" class="btn btn-primary">'
                                    .'Cấu hình'.
                                '</a>'
                                ]])
                            </div>
                        </div>
                    </div>
                    {{--<div class="form-group">--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-2">--}}
                                {{--@include('helpers.button', ['button' => [--}}
                                    {{--'route' => 'admin.map',--}}
                                    {{--'html' => '<a href="'.route('admin.map',['page_id' => $page_id, 'plugin_type' => 'content-box']).'" class="btn btn-primary">'--}}
                                    {{--.'Cấu hình'.--}}
                                {{--'</a>'--}}
                                {{--]])--}}
                            {{--</div>--}}
                            {{--<div class="col-10">--}}
                                {{--<h3>@lang('admin::home-page.index.block_content')</h3>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="form-group">--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-2">--}}
                                {{--@include('helpers.button', ['button' => [--}}
                                    {{--'route' => 'admin.map',--}}
                                    {{--'html' => '<a href="'.route('admin.map',['page_id' => $page_id, 'plugin_type' => 'item-box']).'" class="btn btn-primary">'--}}
                                    {{--.'Cấu hình'.--}}
                                {{--'</a>'--}}
                                {{--]])--}}
                            {{--</div>--}}
                            {{--<div class="col-10">--}}
                                {{--<h3>@lang('admin::home-page.index.block_item')</h3>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="form-group">--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-2">--}}
                                {{--@include('helpers.button', ['button' => [--}}
                                    {{--'route' => 'admin.map',--}}
                                    {{--'html' => '<a href="'.route('admin.map',['page_id' => $page_id, 'page_type' => $page_type ]).'" class="btn btn-primary">'--}}
                                    {{--.'Cấu hình'.--}}
                                {{--'</a>'--}}
                                {{--]])--}}
                            {{--</div>--}}
                            {{--<div class="col-10">--}}
                                {{--<h3>@lang('admin::home-page.index.block_product')</h3>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="form-group">--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-2">--}}
                                {{--@include('helpers.button', ['button' => [--}}
                                    {{--'route' => 'admin.map',--}}
                                    {{--'html' => '<a href="'.route('admin.map',['page_id' => $page_id, 'plugin_type' => 'footer-box']).'" class="btn btn-primary">'--}}
                                    {{--.'Cấu hình'.--}}
                                {{--'</a>'--}}
                                {{--]])--}}
                            {{--</div>--}}
                            {{--<div class="col-10">--}}
                                {{--<h3>@lang('admin::home-page.index.block_footer')</h3>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    <!--End::Timeline 3 -->
                </div>
            </div>
        </div>
    </div>
@endsection