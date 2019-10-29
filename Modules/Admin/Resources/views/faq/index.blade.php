@extends('layout')
@section('header')
    @include('components.header',['title' => 'Config'])
@endsection
@section('content')
    <div class="kt-subheader kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">@lang('admin::faq.index.TITLE_FAQ')</h3>
            <span class="kt-subheader__separator kt-subheader__separator--v"></span>
            <div class="kt-subheader__group" id="kt_subheader_search">
                <span class="kt-subheader__desc" id="kt_subheader_total"> </span>

            </div>
            <div class="kt-subheader__group kt-hidden" id="kt_subheader_group_actions">

            </div>
        </div>
        <div class="kt-subheader__toolbar">
            @include('helpers.button', ['button' => [
                'route' => 'admin.faq.create',
                'html' => '<a href="'.route('admin.faq.create').'" class="btn btn-label-brand btn-bold">'
                .__('admin::faq.index.CREATE_FAQ').
            '</a>'
            ]])
        </div>
    </div>
    <!--begin: Datatable -->
    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
        <div class="kt-portlet kt-portlet--tabs">
            <div class="kt-portlet__body">
                <form id="form-filter" action="{{route('admin.faq')}}">
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <input class="form-control" type="text" id="keyword_search" name="keyword_search"
                                   placeholder="@lang('admin::agency.index.PLACEHOLDER_SEARCH')" value="{{$filter['keyword_search']}}">
                        </div>
                        <div class="form-group col-lg-6">
                            <a class="btn btn-secondary" href="{{route('admin.faq')}}">
                                @lang('admin::faq.index.RESET')
                            </a>
                            <button type="submit"
                                    class="btn btn-primary btn-hover-brand">
                                @lang('admin::faq.index.SEARCH')
                            </button>
                        </div>
                    </div>
                    <div class="form-group">
                        @include('admin::faq.list')
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('after_script')
    <script src="{{asset('static/backend/js/admin/faq/script.js?v='.time())}}"
            type="text/javascript"></script>
@endsection
