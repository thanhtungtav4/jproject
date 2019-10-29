@extends('layout')
@section('header')
    @include('components.header',['title' => 'Config'])
@endsection
@section('content')
    <div class="kt-subheader kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">@lang('admin::blog-category.index.TITLE_LOG_CATEGORY')</h3>
            <span class="kt-subheader__separator kt-subheader__separator--v"></span>
            <div class="kt-subheader__group" id="kt_subheader_search">
                <span class="kt-subheader__desc" id="kt_subheader_total"> </span>

            </div>
            <div class="kt-subheader__group kt-hidden" id="kt_subheader_group_actions">

            </div>
        </div>
        <div class="kt-subheader__toolbar">
            @include('helpers.button', ['button' => [
                'route' => 'admin.blog-category.create',
                'html' => '<a href="'.route('admin.blog-category.create').'" class="btn btn-label-brand btn-bold">'
                .__('admin::blog-category.index.CREATE_LOG_CATEGORY').
            '</a>'
            ]])
        </div>
    </div>
    <!--begin: Datatable -->
    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
        <div class="kt-portlet kt-portlet--tabs">
            <div class="kt-portlet__body">
                <form id="form-filter" action="{{route('admin.blog-category')}}">
{{--                    <div class="row">--}}
{{--                        <div class="form-group col-lg-6">--}}
{{--                            <input class="form-control" type="text" id="keyword_country_name" name="keyword_country_name"--}}
{{--                                   placeholder="@lang('admin::blog-category.index.PLACEHOLDER_SEARCH')" value="">--}}
{{--                        </div>--}}
{{--                        <div class="form-group col-lg-6">--}}
{{--                            <a class="btn btn-secondary" href="{{route('admin.blog-category')}}">--}}
{{--                                @lang('admin::blog-category.index.RESET')--}}
{{--                            </a>--}}
{{--                            <button type="submit"--}}
{{--                                    class="btn btn-primary btn-hover-brand">--}}
{{--                                @lang('admin::blog-category.index.SEARCH')--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="form-group">
                        @include('admin::blog-category.list')
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('after_script')
    <script src="{{asset('static/backend/js/admin/blog-category/script.js?v='.time())}}"
            type="text/javascript"></script>
@endsection
