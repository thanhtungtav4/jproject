@extends('layout')
@section('header')
    @include('components.header',['title' => 'Config'])
@endsection
@section('content')
    <div class="kt-subheader kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">@lang('admin::contact.index.TITLE_CONTACT')</h3>
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
                <form id="form-filter" action="{{route('admin.contact')}}">
                    <div class="row">
                        <div class="form-group col-lg-3">
                            <input class="form-control" type="text" id="keyword_search" name="keyword_search"
                                   placeholder="@lang('admin::blog-category.index.PLACEHOLDER_SEARCH')" value="{{$filter['keyword_search']}}">
                        </div>
                        <div class="form-group col-lg-6">
                            <div class='input-group'>
                                <label class="col-form-label padding-right">
                                    @lang('admin::contact.index.TABLE_CREATE_AT')
                                </label>
                                <input type='text' id='created_at' class="form-control" name="created_at"
                                       readonly placeholder="@lang('admin::contact.index.CHOOSE_CREATED_AT')"
                                       value="{{$filter['created_at']}}"/>
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="la la-calendar-check-o"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <a class="btn btn-secondary" href="{{route('admin.contact')}}">
                                @lang('admin::contact.index.RESET')
                            </a>
                            <button type="submit"
                                    class="btn btn-primary btn-hover-brand">
                                @lang('admin::contact.index.SEARCH')
                            </button>
                        </div>
                    </div>
                    <div class="form-group">
                        @include('admin::contact.list')
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('after_script')
{{--    <script src="{{asset('static/backend/js/admin/blog-category/script.js?v='.time())}}"--}}
{{--            type="text/javascript"></script>--}}
    <script>
        $("#created_at").daterangepicker({
            applyClass: 'btn-primary',
            cancelClass: 'btn-secondary',
            locale: {
                format: 'DD/MM/YYYY',
                daysOfWeek: [
                    "CN",
                    "T2",
                    "T3",
                    "T4",
                    "T5",
                    "T6",
                    "T7"
                ],
                "monthNames": [
                    "Tháng 1 năm",
                    "Tháng 2 năm",
                    "Tháng 3 năm",
                    "Tháng 4 năm",
                    "Tháng 5 năm",
                    "Tháng 6 năm",
                    "Tháng 7 năm",
                    "Tháng 8 năm",
                    "Tháng 9 năm",
                    "Tháng 10 năm",
                    "Tháng 11 năm",
                    "Tháng 12 năm"
                ],
                "firstDay": 1,
                "applyLabel": "Xác nhận",
                "cancelLabel": "Thoát",
            }
        });
    </script>
    @if($filter['created_at'] == null)
        <script>
            $('#created_at').val('');
        </script>
    @endif
@endsection
