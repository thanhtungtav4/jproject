@extends('layout')
@section('header')
    @include('components.header',['title' => 'Config'])
@endsection
@section('content')
    <div class="kt-subheader kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">@lang('core::admin-action.index.ADMIN_GROUP_ACTION')</h3>
            <span class="kt-subheader__separator kt-subheader__separator--v"></span>
            <div class="kt-subheader__group" id="kt_subheader_search">
                <span class="kt-subheader__desc" id="kt_subheader_total"> </span>

            </div>
            <div class="kt-subheader__group kt-hidden" id="kt_subheader_group_actions">

            </div>
        </div>
        <div class="kt-subheader__toolbar">
            <a href="{{route('admin.page.create',['page_type' => $page_type , 'category_id' => $category_id])}}" class="btn-primary btn">Tạo</a>
        </div>
    </div>
    <!--begin: Datatable -->
    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
        <div class="kt-portlet kt-portlet--tabs">
            <div class="kt-portlet__body">
                <div class="form-group">
                    <div class="kt-section__content">
                        <table class="table table-striped table-store">
                            <thead>
                            <tr>
                                <th width="20%"></th>
                                <th width="20%">Tiêu đề Tiếng Việt</th>
                                <th width="20%">Tiêu đề Tiếng Anh</th>
                                <th width="20%"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($support as $item)
                                <tr>
                                    <td><a href="{{route('admin.solution.solution.block',['page_alias_vi' => $item['page_alias_vi']])}}" class="btn-primary btn">Thay đổi</a></td>
                                    <td>{{str_limit($item['page_title_vi'],50)}}</td>
                                    <td>{{str_limit($item['page_title_en'],50)}}</td>
                                    <td>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-9">
                                                    <div class="btn-group" role="group">
                                                        <button id="btnGroupVerticalDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Hành động
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">
                                                            <a href="{{route('admin.page.edit',['id' => $item['page_id'],'category' => $category_id ])}}"
                                                               class="dropdown-item">
                                                                <i class="la la-edit"></i>
                                                                <span class="kt-nav__link-text kt-margin-l-5">Chỉnh sửa</span>
                                                            </a>
                                                            <a href="javascript:void(0)" onclick="pageAction.delete('{{$item['page_id']}}')"
                                                               class="dropdown-item">
                                                                <i class="la la-trash"></i>
                                                                <span class="kt-nav__link-text kt-margin-l-5">Delete</span>
                                                            </a>
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
            </div>
        </div>
    </div>
@endsection
@section('after_script')
    <script type="text/javascript" src="{{ asset('static/backend/js/admin/script.js?v='.time()) }}"></script>
@endsection
