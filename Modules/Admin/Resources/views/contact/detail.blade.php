@extends('layout')

@section('header')
    @include('components.header',['title'=> __('core.user.create.CREATE_ACCOUNT')])
@endsection
@section('content')
    <form id="form-update">
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    <span class="kt-subheader__title" id="kt_subheader_total">
                                        @lang('admin::contact.index.TITLE_CONTACT')
                                    </span>
                </h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <div class="kt-subheader__group" id="kt_subheader_search">
                                    <span class="kt-subheader__desc text-capitalize" id="kt_subheader_total">
                                         @lang('admin::contact.show.DETAIL_CONTACT')
                                    </span>
                </div>
            </div>
            <div class="kt-subheader__toolbar">
                <div class="btn-group">
                    <a href="{{route('admin.contact')}}" class="btn btn-secondary">
                        @lang('admin::contact.show.CANCEL')
                    </a>
                </div>
            </div>
        </div>
        <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
            <div class="kt-portlet kt-portlet--tabs">
                <div class="kt-portlet__body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="kt_apps_user_edit_tab_1" role="tabpanel">
                            <div class="kt-form__body">
                                <div class="kt-section kt-section--first">
                                    <div class="kt-section__body">
                                        <div class="row">
                                            <label class="col-xl-3"></label>
                                            <div class="col-lg-9 col-xl-6">
                                                <h3 class="kt-section__title kt-section__title-sm">
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                @lang('admin::contact.show.FULL_NAME')
                                            </label>
                                            <div class="col-lg-9 col-xl-9">
                                                <input type="text" class="form-control" value="{{$item['fullname']}}"
                                                       disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                @lang('admin::contact.show.COMPANY')
                                            </label>
                                            <div class="col-lg-9 col-xl-9">
                                                <input type="text" class="form-control" value="{{$item['company']}}"
                                                       disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                @lang('admin::contact.show.PHONE')
                                            </label>
                                            <div class="col-lg-9 col-xl-9">
                                                <input type="text" class="form-control" value="{{$item['phone']}}"
                                                       disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                @lang('admin::contact.show.EMAIL')
                                            </label>
                                            <div class="col-lg-9 col-xl-9">
                                                <input type="text" class="form-control" value="{{$item['email']}}"
                                                       disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                @lang('admin::contact.show.QUESTION_1')
                                            </label>
                                            <div class="col-lg-9 col-xl-9">
                                                <label class="kt-checkbox kt-checkbox--bold kt-checkbox--success">
                                                    <input type="checkbox" {{$item['question_1'] == 1 ? 'checked':''}} disabled>
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                @lang('admin::contact.show.QUESTION_2')
                                            </label>
                                            <div class="col-lg-9 col-xl-9">
                                                <label class="kt-checkbox kt-checkbox--bold kt-checkbox--success">
                                                    <input type="checkbox" {{$item['question_2'] == 1 ? 'checked':''}} disabled>
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                @lang('admin::contact.show.QUESTION_3')
                                            </label>
                                            <div class="col-lg-9 col-xl-9">
                                                <label class="kt-checkbox kt-checkbox--bold kt-checkbox--success">
                                                    <input type="checkbox" {{$item['question_3'] == 1 ? 'checked':''}} disabled>
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                @lang('admin::contact.show.QUESTION_4')
                                            </label>
                                            <div class="col-lg-9 col-xl-9">
                                                <label class="kt-checkbox kt-checkbox--bold kt-checkbox--success">
                                                    <input type="checkbox" {{$item['question_4'] == 1 ? 'checked':''}} disabled>
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                @lang('admin::contact.show.QUESTION_5')
                                            </label>
                                            <div class="col-lg-9 col-xl-9">
                                                <label class="kt-checkbox kt-checkbox--bold kt-checkbox--success">
                                                    <input type="checkbox" {{$item['question_5'] == 1 ? 'checked':''}} disabled>
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                @lang('admin::contact.show.QUESTION_6')
                                            </label>
                                            <div class="col-lg-9 col-xl-9">
                                                <label class="kt-checkbox kt-checkbox--bold kt-checkbox--success">
                                                    <input type="checkbox" {{$item['question_6'] == 1 ? 'checked':''}} disabled>
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                @lang('admin::contact.show.QUESTION_7')
                                            </label>
                                            <div class="col-lg-9 col-xl-9">
                                                <label class="kt-checkbox kt-checkbox--bold kt-checkbox--success">
                                                    <input type="checkbox" {{$item['question_7'] == 1 ? 'checked':''}} disabled>
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                @lang('admin::contact.show.QUESTION_8')
                                            </label>
                                            <div class="col-lg-9 col-xl-9">
                                                <label class="kt-checkbox kt-checkbox--bold kt-checkbox--success">
                                                    <input type="checkbox" {{$item['question_8'] == 1 ? 'checked':''}} disabled>
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                Ghi chú
                                            </label>
                                            <div class="col-lg-9 col-xl-9">
                                                <textarea class="form-control" disabled>{{$item['note']}}</textarea>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
@section('after_script')

@endsection
