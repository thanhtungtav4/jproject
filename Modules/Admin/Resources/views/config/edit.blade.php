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
                                        @lang('admin::config.index.TITLE_CONFIG')
                                    </span>
                </h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <div class="kt-subheader__group" id="kt_subheader_search">
                                    <span class="kt-subheader__desc text-capitalize" id="kt_subheader_total">
                                         @lang('admin::config.edit.UPDATE_CONFIG')
                                    </span>
                </div>
            </div>
            <div class="kt-subheader__toolbar">

                <div class="btn-group">
                    <button type="button" class="btn btn-primary" onclick="update.submit('{{$item['id']}}','{{$item['type']}}')">
                        @lang('admin::config.edit.SAVE')
                    </button>
                    <a href="{{route('admin.config')}}" class="btn btn-secondary">
                        @lang('admin::config.edit.CANCEL')
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
                                                @lang('admin::config.edit.NAME')
                                            </label>
                                            <div class="col-lg-9 col-xl-9">
                                                <input type="text" class="form-control"
                                                       id="name" name="name" value="{{$item['name']}}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                @lang('admin::config.edit.DESCRIPTION')
                                            </label>
                                            <div class="col-lg-9 col-xl-9">
                                                <input class="form-control" disabled id="description"
                                                       name="description" value="{{$item['description']}}">
                                            </div>
                                        </div>
                                        @if($item['type'] == 'input')
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    @lang('admin::config.edit.VALUE_VI')
                                                    <span class="color_red">*</span></label>
                                                </label>
                                                <div class="col-lg-9 col-xl-9">
                                                    <input type="text" class="form-control"
                                                           id="value_vi" name="value_vi" value="{{$item['value_vi']}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    @lang('admin::config.edit.VALUE_EN')
                                                    <span class="color_red">*</span></label>
                                                </label>
                                                <div class="col-lg-9 col-xl-9">
                                                    <input type="text" class="form-control"
                                                           id="value_en" name="value_en" value="{{$item['value_en']}}">
                                                </div>
                                            </div>
                                        @elseif($item['type'] == 'ckeditor')
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    @lang('admin::config.edit.VALUE_VI')
                                                    <span class="color_red">*</span></label>
                                                </label>
                                                <div class="col-lg-9 col-xl-9">
                                                    <div class="summernote">
                                                    <textarea name="value_vi"
                                                              id="value_vi">{{$item['value_vi']}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    @lang('admin::config.edit.VALUE_EN')
                                                    <span class="color_red">*</span></label>
                                                </label>
                                                <div class="col-lg-9 col-xl-9">
                                                    <div class="summernote">
                                                    <textarea name="value_en"
                                                              id="value_en">{{$item['value_en']}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        @elseif($item['type'] == 'image')
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    @lang('admin::config.edit.LOGO')
                                                </label>
                                                </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <div class="kt-avatar kt-avatar--outline" id="kt_user_add_avatar">
                                                        <div id="div-image">
                                                            @if(isset($item['value_vi']))
                                                                <div class="kt-avatar__holder"
                                                                     style="background-image: url({{asset($item['value_vi'])}});background-position: center;"></div>
                                                            @else
                                                                <div class="kt-avatar__holder"
                                                                     style="background-image: url({{asset('static/backend/images/default-placeholder.png')}})"></div>
                                                            @endif
                                                        </div>
                                                        <input type="hidden" id="logo" name="logo">
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
                                        @endif

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
    <script src="{{asset('static/backend/js/admin/config/script.js?v='.time())}}"
            type="text/javascript"></script>
    @if($item['type'] == 'ckeditor')
        <script>
            $('#value_vi').summernote({
                // placeholder: 'Nhập nội dung',
                height: 150,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                ]
                // onImageUpload: function(files, editor, welEditable) {
                //     sendFile(files[0], editor, welEditable);
                // }
            });
            $('#value_en').summernote({
                // placeholder: 'Nhập nội dung',
                height: 150,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                ]
                // onImageUpload: function(files, editor, welEditable) {
                //     sendFile(files[0], editor, welEditable);
                // }
            });
        </script>
    @endif
    <script>
        update._init();
        // var loading = new KTPortlet('form-update');
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
