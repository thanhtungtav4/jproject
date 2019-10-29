@extends('layout')
@section('header')
    @include('components.header',['title' => 'Config'])
@endsection
@section('content')
    <div class="kt-subheader kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">@lang('admin::product.index.danh_sach_danh_muc_san_pham')</h3>
            <span class="kt-subheader__separator kt-subheader__separator--v"></span>
            <div class="kt-subheader__group" id="kt_subheader_search">
                <span class="kt-subheader__desc" id="kt_subheader_total"> </span>

            </div>
            <div class="kt-subheader__group kt-hidden" id="kt_subheader_group_actions">

            </div>
        </div>
        <div class="kt-subheader__toolbar">
            @include('helpers.button', ['button' => [
               'route' => 'admin.category.create',
               'html' => '<a href="'.route('admin.category.create',$paren_id).'" class="btn btn-label-brand btn-bold">'
               .'Tạo danh mục'.
           '</a>'
           ]])
        </div>
    </div>
    <!--begin: Datatable -->
    <form id="form-filter" action="{{route('admin.product.category')}}">
    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
        <div class="kt-portlet kt-portlet--tabs">
            <div class="kt-portlet__body">
                <div class="row">
                    <div class="form-group col-5">
{{--                        <label class="col-form-label padding-right w-20">--}}
{{--                            Tên tiếng việt--}}
{{--                        </label>--}}
                        <input  class="form-control d-inline"
                                type="text"
                                name="keyword_name_vi"
                                value="{{isset($filter['keyword_name_vi']) ? $filter['keyword_name_vi'] : ""}}"
                                placeholder="@lang('admin::product.index.ten_tieng_viet')">
                    </div>
                    <div class="form-group col-5">
{{--                        <label class="col-form-label padding-right w-20">--}}
{{--                            Tên tiếng anh--}}
{{--                        </label>--}}
                        <input  class="form-control d-inline"
                                type="text"
                                name="keyword_name_en"
                                value="{{isset($filter['keyword_name_en']) ? $filter['keyword_name_en'] : ""}}"
                                placeholder="@lang('admin::product.index.ten_tieng_anh')">
                    </div>
                    <div class="form-group col-2 text-right">
                        <button type="submit"
                                class="btn btn-primary btn-hover-brand">
                            @lang('admin::product.index.tim_kiem')
                        </button>
                        <a href="{{route('admin.product.category')}}">
                            <button type="button"
                                    class="btn btn-secondary btn-hover-brand">
                                @lang('admin::product.index.xoa')
                            </button>
                        </a>
                    </div>
                </div>
                <div class="form-group">
                    <div class="kt-section__content">
                        <table class="table table-striped table-store">
                            <thead>
                            <tr>
                                <th width="40%">@lang('admin::product.index.ten_tieng_viet')</th>
                                <th width="40%">@lang('admin::product.index.ten_tieng_anh')</th>
                                <th width="20%"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($category as $item)
                                <tr>
                                    <td>{{str_limit($item['name_vi'],50)}}</td>
                                    <td>{{str_limit($item['name_en'],50)}}</td>
                                    <td>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-9">
                                                    <div class="btn-group" role="group">
                                                        <button id="btnGroupVerticalDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            @lang('admin::product.index.hanh_dong')
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">
                                                            @include('helpers.button', ['button' => [
                                                                                  'route' => 'admin.category.edit',
                                                                                   'html' => '<a href="'.route('admin.category.edit', ['id' => $item['id'] , 'category' => $paren_id['category_type']]).'" class="dropdown-item">'
                                                                                   .'<i class="la la-edit"></i>'
                                                                                   .'<span class="kt-nav__link-text kt-margin-l-5">'
                                                                                       .'Chỉnh sửa'.
                                                                                   '</span>'.
                                                                              '</a>'
                                                                          ]])
{{--                                                            <a href="javascript:void(0)" onclick="category.delete('{{$item['id']}}')"--}}
{{--                                                               class="dropdown-item">--}}
{{--                                                                <i class="la la-trash"></i>--}}
{{--                                                                <span class="kt-nav__link-text kt-margin-l-5">Xóa</span>--}}
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
                {{ $category->appends($filter)->links('helpers.paging') }}
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
