@extends('layout')
@section('header')
    @include('components.header',['title' => 'Config'])
@endsection
@section('content')
    <div class="kt-subheader kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">@lang('admin::map.index.danh_sach_plugin') {{$title}}</h3>
            <span class="kt-subheader__separator kt-subheader__separator--v"></span>
            <div class="kt-subheader__group" id="kt_subheader_search">
                <span class="kt-subheader__desc" id="kt_subheader_total"> </span>
            </div>
            <div class="kt-subheader__group kt-hidden" id="kt_subheader_group_actions">

            </div>
        </div>
        <div class="kt-subheader__toolbar">
{{--            <a href="{{route('admin.plugin.create',--}}
{{--                ['page_id' => $page_id, 'plugin_type' => $plugin_type])}}">--}}
{{--                <button class="btn btn-label-brand btn-bold">@lang('admin::map.index.tao_plugin')</button>--}}
{{--            </a>--}}
        </div>
    </div>
    <!--begin: Datatable -->
    <form id="form-filter" action="{{route('admin.map')}}">
        <input type="text" hidden name="page_id" value="{{$filter['page_id']}}">
        <input type="text" hidden name="plugin_type" value="{{$filter['plugin_type']}}">
        <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
            <div class="kt-portlet kt-portlet--tabs">
                <div class="kt-portlet__body">
                    <div class="row">
                        <div class="form-group col-5">
                            {{--                        <label class="col-form-label padding-right">--}}
                            {{--                            Tiêu đề tiếng việt--}}
                            {{--                        </label>--}}
                            <input  class="form-control d-inline"
                                    type="text"
                                    name="keyword_plugin_title_vi"
                                    value="{{isset($filter['keyword_plugin_title_vi']) ? $filter['keyword_plugin_title_vi'] : ""}}"
                                    placeholder="@lang('admin::map.index.tieu_de_tieng_viet')">
                        </div>
                        <div class="form-group col-5">
                            {{--                        <label class="col-form-label padding-right">--}}
                            {{--                            Tiêu đề tiếng anh--}}
                            {{--                        </label>--}}
                            <input  class="form-control d-inline"
                                    type="text"
                                    name="keyword_plugin_title_en"
                                    value="{{isset($filter['keyword_plugin_title_en']) ? $filter['keyword_plugin_title_en'] : ""}}"
                                    placeholder="@lang('admin::map.index.tieu_de_tieng_anh')">
                        </div>
                        <div class="form-group col-2 text-right">
                            <button type="submit"
                                    class="btn btn-primary btn-hover-brand">
                                @lang('admin::map.index.tim_kiem')
                            </button>
                            <a href="{{route('admin.map',['page_id'=>$filter['page_id'],'plugin_type' =>$filter['plugin_type']])}}">
                                <button type="button"
                                        class="btn btn-secondary btn-hover-danger">
                                    @lang('admin::map.index.xoa')
                                </button>
                            </a>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="kt-section__content">
                            <table class="table table-striped table-store">
                                <thead>
                                <tr>
                                    <th width="10%"></th>
                                    <th width="20%">@lang('admin::map.index.tieu_de_tieng_viet') </th>
                                    <th width="20%">@lang('admin::map.index.tieu_de_tieng_anh')</th>
                                    {{--                                    <th width="10%">@lang('admin::map.index.anh')</th>--}}
                                    @if($plugin_type == 'item-box')
                                        <th width="10%">@lang('admin::map.index.font-icon')</th>
                                    @else
                                        <th width="10%">@lang('admin::map.index.anh')</th>
                                    @endif
                                    {{--                                    <th width="10%">Trạng thái</th>--}}
                                    <th width="10%"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($list as $item)
                                    <tr>
                                        <td>
                                            <button
                                                type="button"
                                                class="form-control btn btn-danger">
{{--                                                onclick="listAction.delete--}}
{{--                                                    ('{{$page_id}}','{{$item['plugin_id']}}','{{$type}}')">--}}
                                                @lang('admin::map.index.huy')
                                            </button>
                                        </td>
                                        <td>{{str_limit($item['plugin_title_vi'],50)}}</td>
                                        <td>{{str_limit($item['plugin_title_en'],50)}}</td>
                                        <td>
                                            @if($plugin_type == 'item-box')
                                                {{ $item['plugin_image'] }}
                                            @else
                                                <img src="{{ $item['plugin_image'] != null
                                                ? asset($item['plugin_image'])
                                                : asset('static/backend/images/default-placeholder.png') }}"
                                                     style="width: 50%">
                                            @endif
                                        </td>
                                        {{--                                        <td>--}}
                                        {{--                                            <span class="kt-switch kt-switch--success">--}}
                                        {{--                                                <label>--}}
                                        {{--                                                    <input type="checkbox" onchange="plugin.change('{{$item['plugin_id']}}',this)"--}}
                                        {{--                                                           name="is_active" {{$item['is_active'] == 1 ? 'checked':''}}>--}}
                                        {{--                                                    <span></span>--}}
                                        {{--                                                </label>--}}
                                        {{--                                            </span>--}}
                                        {{--                                        </td>--}}
                                        <td>
                                            <div class="btn-group" role="group">
                                                <button
                                                    id="btnGroupVerticalDrop1"
                                                    type="button"
                                                    class="btn btn-secondary dropdown-toggle"
                                                    data-toggle="dropdown"
                                                    aria-haspopup="true"
                                                    aria-expanded="false">
                                                    @lang('admin::map.index.hanh_dong')
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">
                                                    <a href="{{route('admin.plugin.update',
                                                                [
                                                                    'plugin_id' => $item['plugin_id'],
                                                                    'page_id' => $page_id,
                                                                    'plugin_type' => $plugin_type
                                                                ])}}"
                                                       class="dropdown-item">
                                                        <i class="la la-edit"></i>
                                                        <span class="kt-nav__link-text kt-margin-l-5">@lang('admin::map.index.chinh_sua')</span>
                                                    </a>
                                                    {{--                                                    <a href="javascript:void(0)" onclick="plugin.delete('{{$item['plugin_id']}}')"--}}
                                                    {{--                                                       class="dropdown-item">--}}
                                                    {{--                                                        <i class="la la-trash"></i>--}}
                                                    {{--                                                        <span class="kt-nav__link-text kt-margin-l-5">Xóa</span>--}}
                                                    {{--                                                    </a>--}}
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{ $list->appends($filter)->links('helpers.paging') }}
                </div>
            </div>

        </div>
    </form>
@endsection
@section('after_script')
    <script type="text/javascript" src="{{ asset('static/backend/js/admin/script.js?v='.time()) }}"></script>
@endsection
