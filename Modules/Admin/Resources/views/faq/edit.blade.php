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
                                        @lang('admin::faq.index.TITLE_FAQ')
                                    </span>
                </h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <div class="kt-subheader__group" id="kt_subheader_search">
                                    <span class="kt-subheader__desc text-capitalize" id="kt_subheader_total">
                                         @lang('admin::faq.edit.UPDATE_FAQ')
                                    </span>
                </div>
            </div>
            <div class="kt-subheader__toolbar">

                <div class="btn-group">
                    <button type="button" class="btn btn-primary" onclick="update.submit({{$item['id']}})">
                        @lang('admin::faq.edit.SAVE')
                    </button>
                    <a href="{{route('admin.faq')}}" class="btn btn-secondary">
                        @lang('admin::faq.edit.CANCEL')
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
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                @lang('admin::faq.edit.QUESTION_VI')
                                                <span class="color_red">*</span></label>
                                            </label>
                                            <div class="col-lg-9 col-xl-9">
                                                <div class="summernote">
                                                    <textarea name="question_vi" id="question_vi">{{$item['question_vi']}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                @lang('admin::faq.edit.QUESTION_EN')
                                                <span class="color_red">*</span></label>
                                            </label>
                                            <div class="col-lg-9 col-xl-9">
                                                <div class="summernote">
                                                    <textarea name="question_en" id="question_en">{{$item['question_en']}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                @lang('admin::faq.edit.ANSWER_VI')
                                                <span class="color_red">*</span></label>
                                            </label>
                                            <div class="col-lg-9 col-xl-9">
                                                <div class="summernote">
                                                    <textarea name="answer_vi" id="answer_vi">{{$item['answer_vi']}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                @lang('admin::faq.edit.ANSWER_EN')
                                                <span class="color_red">*</span></label>
                                            </label>
                                            <div class="col-lg-9 col-xl-9">
                                                <div class="summernote">
                                                    <textarea name="answer_en" id="answer_en">{{$item['answer_en']}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                @lang('admin::faq.edit.POSITION')
                                                <span class="color_red">*</span></label>
                                            <div class="col-lg-9 col-xl-9">
                                                <input type="text" class="form-control"
                                                       id="faq_order" name="faq_order" value="{{$item['faq_order']}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                @lang('admin::blog-category.edit.STATUS'):
                                            </label>
                                            <div class="col-lg-9 col-xl-6">
                                                <span class="kt-switch kt-switch--success">
                                                    <label>
                                                        <input type="checkbox"
                                                               name="is_active" id="is_active" {{$item['is_active'] == 1 ? 'checked':''}}>
                                                        <span></span>
                                                    </label>
                                                </span>
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
    <script type="text/template" id="image-tpl">
        <div class="kt-avatar__holder" style="background-image: url({link});background-position: center;"></div>
    </script>
    <script src="{{asset('static/backend/js/admin/faq/script.js?v='.time())}}"
            type="text/javascript"></script>
    <script>
        update._init();

        // var loading = new KTPortlet('form-register');
        // $(document).ajaxStart(function () {
        //     KTApp.block(loading.getSelf(), {
        //         type: 'loader',
        //         state: 'brand',
        //         message: 'Please waitasd...'
        //     });
        // });
        // $(document).ajaxStop(function () {
        //     KTApp.unblock(loading.getSelf());
        // });
    </script>
@endsection
