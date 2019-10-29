@extends('layout')

@section('header')
    @include('components.header',['title'=> __('core.user.create.CREATE_ACCOUNT')])
@endsection
@section('content')
    <form id="form-register">
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    <span class="kt-subheader__title" id="kt_subheader_total">
                                        @lang('admin::blog-category.index.TITLE_LOG_CATEGORY')
                                    </span>
                </h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <div class="kt-subheader__group" id="kt_subheader_search">
                                    <span class="kt-subheader__desc text-capitalize" id="kt_subheader_total">
                                         @lang('admin::blog-category.create.CREATE_LOG_CATEGORY')
                                    </span>
                </div>
            </div>
            <div class="kt-subheader__toolbar">

                <div class="btn-group">
                    <button type="button" class="btn btn-primary" onclick="create.submit_load()">
                        @lang('admin::blog-category.create.SAVE_NEW')
                    </button>
                    <button type="button" class="btn btn-primary" onclick="create.submit_close()">
                        @lang('admin::blog-category.create.SAVE_CLOSE')
                    </button>
                    <a href="{{route('admin.blog-category')}}" class="btn btn-secondary">
                        @lang('admin::blog-category.create.CANCEL')
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
                                                @lang('admin::blog-category.create.TITLE_VN')
                                                <span class="color_red">*</span></label>
                                            <div class="col-lg-9 col-xl-9">
                                                <input type="text" class="form-control"
                                                       id="title_vi" name="title_vi">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                @lang('admin::blog-category.create.TITLE_EN')
                                                <span class="color_red">*</span></label>
                                            <div class="col-lg-9 col-xl-9">
                                                <input type="text" class="form-control"
                                                       id="title_en" name="title_en">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                @lang('admin::blog-category.create.IMAGE')
                                                <span class="color_red">*</span></label>
                                            </label>
                                            <div class="col-lg-9 col-xl-6">
                                                <div class="kt-avatar kt-avatar--outline" id="kt_user_add_avatar">
                                                    <div id="div-image">
                                                        {{--                                                        @if(isset($profile['image']))--}}
                                                        {{--                                                            <div class="kt-avatar__holder"--}}
                                                        {{--                                                                 style="background-image: url({{$profile['image']}});background-position: center;"></div>--}}
                                                        {{--                                                        @else--}}
                                                        <div class="kt-avatar__holder"
                                                             style="background-image: url({{asset('static/backend/images/default-placeholder.png')}})"></div>
                                                        {{--                                                        @endif--}}
                                                    </div>
                                                    <input type="hidden" id="image_thumb" name="image_thumb">
                                                    <label class="kt-avatar__upload" data-toggle="kt-tooltip" title=""
                                                           data-original-title="Change avatar">
                                                        <i class="fa fa-pen"></i>
                                                        <input type="file" id="getFileImage" name="getFileImage"
                                                               accept="image/jpeg,image/png,image/jpeg,jpg|png|jpeg"
                                                               onchange="uploadAvatar(this);">
                                                    </label>
                                                    <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title=""
                                                          data-original-title="Cancel avatar">
																<i class="fa fa-times"></i>
															</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                @lang('admin::blog-category.create.CONTENT_VN')
                                                <span class="color_red">*</span></label>
                                            </label>
                                            <div class="col-lg-9 col-xl-9">
                                                <div class="summernote">
                                                    <textarea name="content_vi" id="content_vi"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                @lang('admin::blog-category.create.CONTENT_EN')
                                                <span class="color_red">*</span></label>
                                            </label>
                                            <div class="col-lg-9 col-xl-9">
                                                <div class="summernote">
                                                    <textarea name="content_en" id="content_en"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        {{--                                        <div class="form-group row">--}}
                                        {{--                                            <label class="col-xl-3 col-lg-3 col-form-label">--}}
                                        {{--                                                @lang('core::user.index.ACTIVE'):--}}
                                        {{--                                            </label>--}}
                                        {{--                                            <div class="col-lg-9 col-xl-6">--}}
                                        {{--                                                   <span class="kt-switch kt-switch--success">--}}
                                        {{--                                                        <label>--}}
                                        {{--                                                            <input type="checkbox" name="is_actived" checked--}}
                                        {{--                                                                   id="is_actived"--}}
                                        {{--                                                                   onchange="Add.changeIsActive(this)"--}}
                                        {{--                                                            >--}}
                                        {{--                                                            <span></span>--}}
                                        {{--                                                        </label>--}}
                                        {{--                                                    </span>--}}
                                        {{--                                            </div>--}}
                                        {{--                                        </div>--}}
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
    <script src="{{asset('static/backend/js/admin/blog-category/script.js?v='.time())}}"
            type="text/javascript"></script>
    <script>
        create._init();

        var loading = new KTPortlet('form-register');
        $(document).ajaxStart(function () {
            KTApp.block(loading.getSelf(), {
                type: 'loader',
                state: 'brand',
                message: 'Please waitasd...'
            });
        });
        $(document).ajaxStop(function () {
            KTApp.unblock(loading.getSelf());
        });
    </script>
@endsection
