@extends('layout')
@section('header')
    @include('components.header',['title' => 'Config'])
@endsection
@section('content')
    <div class="kt-subheader kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">@lang('admin::solution.index.danh_sach_giai_phap')</h3>
            <span class="kt-subheader__separator kt-subheader__separator--v"></span>
            <div class="kt-subheader__group" id="kt_subheader_search">
                <span class="kt-subheader__desc" id="kt_subheader_total"> </span>

            </div>
            <div class="kt-subheader__group kt-hidden" id="kt_subheader_group_actions">

            </div>
        </div>
        <div class="kt-subheader__toolbar">
            @include('helpers.button', ['button' => [
               'route' => 'admin.solution.category',
               'html' => '<a href="'.route('admin.solution.category').'" class="btn btn-label-brand btn-bold">'
               .'Quản lý danh mục giải pháp'.
           '</a>'
           ]])
            @include('helpers.button', ['button' => [
              'route' => 'admin.page.create',
              'html' => '<a href="'.route('admin.page.create',['page_type' => $page_type , 'category_id' => $category_id]).'" class="btn btn-label-brand btn-bold">'
              .'Tạo giải pháp'.
          '</a>'
          ]])
        </div>
    </div>
    <!--begin: Datatable -->
    <form id="form-filter" action="{{route('admin.solution.solution')}}">
    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
        <div class="kt-portlet kt-portlet--tabs">
            <div class="kt-portlet__body">
                <div class="row">
                    <div class="form-group col-sm-3 col-6">
                        {{--                        <label class="col-form-label padding-right w-20">--}}
                        {{--                            Danh mục tiếng việt--}}
                        {{--                        </label>--}}
                        <input  class="form-control d-inline"
                                type="text"
                                name="keyword_name_vi"
                                value="{{isset($filter['keyword_name_vi']) ? $filter['keyword_name_vi'] : ""}}"
                                placeholder="@lang('admin::solution.index.danh_muc_tieng_viet')">
                    </div>
                    <div class="form-group col-sm-3 col-6">
                        {{--                        <label class="col-form-label padding-right w-20">--}}
                        {{--                            Danh mục tiếng anh--}}
                        {{--                        </label>--}}
                        <input  class="form-control d-inline"
                                type="text"
                                name="keyword_name_en"
                                value="{{isset($filter['keyword_name_en']) ? $filter['keyword_name_en'] : ""}}"
                                placeholder="@lang('admin::solution.index.danh_muc_tieng_anh')">
                    </div>
                    <div class="form-group col-sm-3 col-6">
                        {{--                        <label class="col-form-label padding-right w-20">--}}
                        {{--                            Tên tiếng việt--}}
                        {{--                        </label>--}}
                        <input  class="form-control d-inline"
                                type="text"
                                name="keyword_page_title_vi"
                                value="{{isset($filter['keyword_page_title_vi']) ? $filter['keyword_page_title_vi'] : ""}}"
                                placeholder="@lang('admin::solution.index.ten_tieng_viet')">
                    </div>
                    <div class="form-group col-sm-3 col-6">
                        {{--                        <label class="col-form-label padding-right w-20">--}}
                        {{--                            Tên tiếng anh--}}
                        {{--                        </label>--}}
                        <input  class="form-control d-inline"
                                type="text"
                                name="keyword_page_title_en"
                                value="{{isset($filter['keyword_page_title_en']) ? $filter['keyword_page_title_en'] : ""}}"
                                placeholder="@lang('admin::solution.index.ten_tieng_anh')">
                    </div>
                    <div class="form-group col-12 text-right">
                        <button type="submit"
                                class="btn btn-primary btn-hover-brand">
                            @lang('admin::solution.index.tim_kiem')
                        </button>
                        <a href="{{route('admin.product.product')}}">
                            <button type="button"
                                    class="btn btn-secondary btn-hover-brand">
                                @lang('admin::solution.index.xoa')
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
                                <th width="20%">@lang('admin::solution.index.danh_muc_tieng_viet')</th>
                                <th width="20%">@lang('admin::solution.index.danh_muc_tieng_anh')</th>
                                <th width="20%">@lang('admin::solution.index.tieu_de_tieng_viet')</th>
                                <th width="20%">@lang('admin::solution.index.tieu_de_tieng_anh')</th>
                                <th width="10%"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($product as $item)
                                <tr>
                                    <td>
                                        @include('helpers.button', ['button' => [
                                            'route' => 'admin.page-home',
                                            'html' => '<a href="'.route('admin.solution.solution.block',['page_alias_vi' => $item['page_alias_vi']]).'" class="btn btn-label-brand btn-bold">'
                                            .'Cấu hình'.
                                        '</a>'
                                        ]])
                                    </td>
                                    <td>{{str_limit($item['name_vi'],50)}}</td>
                                    <td>{{str_limit($item['name_en'],50)}}</td>
                                    <td>{{str_limit($item['page_title_vi'],50)}}</td>
                                    <td>{{str_limit($item['page_title_en'],50)}}</td>
{{--                                    <td>--}}
{{--                                        <span class="kt-switch kt-switch--success">--}}
{{--                                            <label>--}}
{{--                                                <input type="checkbox" onchange="pageAction.change('{{$item['page_id']}}',this)"--}}
{{--                                                       name="is_active" {{$item['is_active'] == 1 ? 'checked':''}}>--}}
{{--                                                <span></span>--}}
{{--                                            </label>--}}
{{--                                        </span>--}}
{{--                                    </td>--}}
                                    <td>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-9">
                                                    <div class="btn-group" role="group">
                                                        <button id="btnGroupVerticalDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            @lang('admin::solution.index.hanh_dong')
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">
                                                            @include('helpers.button', ['button' => [
                                                                                 'route' => 'admin.page.editt',
                                                                                  'html' => '<a href="'.route('admin.page.edit', ['id' => $item['page_id'],'category' => $category_id , 'page_type' => $page_type ]).'" class="dropdown-item">'
                                                                                  .'<i class="la la-edit"></i>'
                                                                                  .'<span class="kt-nav__link-text kt-margin-l-5">'
                                                                                      .'Chỉnh sửa'.
                                                                                  '</span>'.
                                                                             '</a>'
                                                                         ]])
{{--                                                            <a href="javascript:void(0)" onclick="pageAction.delete('{{$item['page_id']}}')"--}}
{{--                                                               class="dropdown-item">--}}
{{--                                                                <i class="la la-trash"></i>--}}
{{--                                                                <span class="kt-nav__link-text kt-margin-l-5">Delete</span>--}}
{{--                                                            </a>--}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{ $product->appends($filter)->links('helpers.paging') }}
            </div>
        </div>
    </div>
    </form>
@endsection
@section('after_style')
    <link href="{{asset('static/backend/css/style/style.css?v='.time())}}" rel="stylesheet"/>
@endsection
@section('after_script')
    <script type="text/javascript" src="{{ asset('static/backend/js/admin/script.js?v='.time()) }}"></script>
@endsection
