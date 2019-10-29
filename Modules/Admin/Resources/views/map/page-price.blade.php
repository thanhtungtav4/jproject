@extends('layout')
@section('header')
    @include('components.header',['title' => 'Config'])
@endsection
@section('content')
    <div class="kt-subheader kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">Danh sách gói sản phẩm {{$title}}</h3>
            <span class="kt-subheader__separator kt-subheader__separator--v"></span>
            <div class="kt-subheader__group" id="kt_subheader_search">
                <span class="kt-subheader__desc" id="kt_subheader_total"> </span>
            </div>
            <div class="kt-subheader__group kt-hidden" id="kt_subheader_group_actions">

            </div>
        </div>
        <div class="kt-subheader__toolbar">
            @include('helpers.button', ['button' => [
              'route' => 'admin.product.product-price.create',
              'html' => '<a href="'.route('admin.product.product-price.create',['page_id' => $page_id]).'" class="btn btn-label-brand btn-bold">'
              .'Tạo'.
          '</a>'
          ]])
        </div>
    </div>
    <!--begin: Datatable -->
    <form id="form-filter" action="{{route('admin.map')}}">
        <input type="text" hidden name="page_id" value="{{$filter['page_id']}}">
        <input type="text" hidden name="page_type" value="{{$filter['page_type']}}">
    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
        <div class="kt-portlet kt-portlet--tabs">
            <div class="kt-portlet__body">
                <div class="row">
                    <div class="form-group col-3">
{{--                        <label class="col-form-label padding-right">--}}
{{--                            Tên sản phẩm tiếng việt--}}
{{--                        </label>--}}
                        <input  class="form-control d-inline"
                                type="text"
                                name="keyword_name_vi"
                                value="{{isset($filter['keyword_name_vi']) ? $filter['keyword_name_vi'] : ""}}"
                                placeholder="@lang('admin::map.index.ten_san_pham_tieng_viet')">
                    </div>
                    <div class="form-group col-3">
{{--                        <label class="col-form-label padding-right">--}}
{{--                            Tên sản phẩm tiếng anh--}}
{{--                        </label>--}}
                        <input  class="form-control d-inline"
                                type="text"
                                name="keyword_name_en"
                                value="{{isset($filter['keyword_name_en']) ? $filter['keyword_name_en'] : ""}}"
                                placeholder="@lang('admin::map.index.ten_san_pham_tieng_anh')">
                    </div>
                    <div class="form-group col-3">
{{--                        <label class="col-form-label padding-right">--}}
{{--                            Giá--}}
{{--                        </label>--}}
                        <input  class="form-control d-inline"
                                type="text"
                                name="keyword_price"
                                value="{{isset($filter['keyword_price']) ? $filter['keyword_price'] : ""}}"
                                placeholder="@lang('admin::map.index.gia')">
                    </div>
                    <div class="form-group col-3 text-right">
                        <button type="submit"
                                class="btn btn-primary btn-hover-brand">
                            @lang('admin::map.index.tim_kiem')
                        </button>
                        <a href="{{route('admin.map',['page_id'=>$filter['page_id'],'page_type' =>$filter['page_type']])}}">
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
                                <th width="20%">@lang('admin::map.index.ten_san_pham_tieng_viet')</th>
                                <th width="20%">@lang('admin::map.index.ten_san_pham_tieng_anh')</th>
                                <th width="10%">@lang('admin::map.index.gia')</th>
                                <th width="10%">@lang('admin::map.index.pho_bien')</th>
                                <th width="10%">@lang('admin::map.index.trang_thai')</th>
                                <th width="10%">@lang('admin::map.index.anh')</th>
                                <th width="10%"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($list as $item)
                                <tr>
                                    <td>{{str_limit($item['name_vi'],50)}}</td>
                                    <td>{{str_limit($item['name_en'],50)}}</td>
                                    <td>{{str_limit($item['price'],50)}}</td>
                                    <td>
                                        <span class="kt-switch kt-switch--success">
                                            <label>
                                                <input type="checkbox" onchange="productprice.change('{{$item['id']}}','is_feature',this)"
                                                       name="is_feature" {{$item['is_feature'] == 1 ? 'checked':''}}>
                                                <span></span>
                                            </label>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="kt-switch kt-switch--success">
                                            <label>
                                                <input type="checkbox" onchange="productprice.change('{{$item['id']}}','is_active',this)"
                                                       name="is_active" {{$item['is_active'] == 1 ? 'checked':''}}>
                                                <span></span>
                                            </label>
                                        </span>
                                    </td>
                                    <td><img src="{{ $item['image_thumb'] != null ? asset($item['image_thumb']) : asset('static/backend/images/default-placeholder.png') }}" style="width: 100%"></td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button id="btnGroupVerticalDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Hành động
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">
                                                <a href="{{route('admin.product.product-price.edit',['id' => $item['id'] , 'page_id' => $page_id ])}}"
                                                   class="dropdown-item">
                                                    <i class="la la-edit"></i>
                                                    <span class="kt-nav__link-text kt-margin-l-5">@lang('admin::map.index.chinh_sua')</span>
                                                </a>
{{--                                                @include('helpers.button', ['button' => [--}}
{{--                                                                                 'route' => 'admin.product.product-price.edit',--}}
{{--                                                                                  'html' => '<a href="'.route('admin.product.product-price.edit',['id' => $item['id'] , 'page_id' => $page_id ]).'" class="dropdown-item">'--}}
{{--                                                                                  .'<i class="la la-edit"></i>'--}}
{{--                                                                                  .'<span class="kt-nav__link-text kt-margin-l-5">'--}}
{{--                                                                                      .'Chỉnh sửa'.--}}
{{--                                                                                  '</span>'.--}}
{{--                                                                             '</a>'--}}
{{--                                                                         ]])--}}
{{--                                                <a href="javascript:void(0)" onclick="pageAction.delete('{{$item['page_id']}}')"--}}
{{--                                                   class="dropdown-item">--}}
{{--                                                    <i class="la la-trash"></i>--}}
{{--                                                    <span class="kt-nav__link-text kt-margin-l-5">Xóa</span>--}}
{{--                                                </a>--}}
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
