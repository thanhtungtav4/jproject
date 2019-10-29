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
                                        @lang('admin::blog.index.TITLE_LOG')
                                    </span>
                </h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <div class="kt-subheader__group" id="kt_subheader_search">
                                    <span class="kt-subheader__desc text-capitalize" id="kt_subheader_total">
                                         @lang('admin::blog.edit.UPDATE_LOG')
                                    </span>
                </div>
            </div>
            <div class="kt-subheader__toolbar">

                <div class="btn-group">
                    <button type="button" class="btn btn-primary" onclick="update.submit({{$item['id']}})">
                        @lang('admin::blog.edit.SAVE')
                    </button>
                    <a href="{{route('admin.blog')}}" class="btn btn-secondary">
                        @lang('admin::blog.create.CANCEL')
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
                                                @lang('admin::blog.create.CATEGORY')
                                                <span class="color_red">*</span></label>
                                            <div class="col-lg-9 col-xl-9">
                                                <select class="form-control" id="category_id" name="category_id">
                                                    <option></option>
                                                    @if(isset($optionBlogCategory))
                                                        @foreach($optionBlogCategory as $item_op)
                                                            @if($item['category_id'] == $item_op['id'])
                                                                <option value="{{$item_op['id']}}" selected>{{$item_op['title_vi']}}</option>
                                                            @else
                                                                <option value="{{$item_op['id']}}">{{$item_op['title_vi']}}</option>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                @lang('admin::blog.create.TITLE_VN')
                                                <span class="color_red">*</span></label>
                                            <div class="col-lg-9 col-xl-9">
                                                <input type="text" class="form-control"
                                                       id="title_vi" name="title_vi" value="{{$item['title_vi']}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                @lang('admin::blog.create.TITLE_EN')
                                                <span class="color_red">*</span></label>
                                            <div class="col-lg-9 col-xl-9">
                                                <input type="text" class="form-control"
                                                       id="title_en" name="title_en" value="{{$item['title_en']}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                @lang('admin::blog.create.DESCRIPTION_VN')
                                            </label>
                                            <div class="col-lg-9 col-xl-9">
                                                <textarea type="text" class="form-control"
                                                          id="description_vi" name="description_vi" cols="5">{{$item['description_vi']}}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                @lang('admin::blog.create.DESCRIPTION_EN')
                                            </label>
                                            <div class="col-lg-9 col-xl-9">
                                                <textarea type="text" class="form-control"
                                                          id="description_en" name="description_en" cols="5">{{$item['description_en']}}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                @lang('admin::blog.create.IMAGE')
                                                <span class="color_red">*</span></label>
                                            </label>
                                            <div class="col-lg-9 col-xl-6">
                                                <div class="kt-avatar kt-avatar--outline" id="kt_user_add_avatar">
                                                    <div id="div-image">
                                                        @if(isset($item['image_thumb']))
                                                            <div class="kt-avatar__holder"
                                                                 style="background-image: url({{asset($item['image_thumb'])}});background-position: center;"></div>
                                                        @else
                                                            <div class="kt-avatar__holder"
                                                                 style="background-image: url({{asset('static/backend/images/default-placeholder.png')}})"></div>
                                                        @endif
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
                                                @lang('admin::blog.create.CONTENT_VN')
                                                <span class="color_red">*</span></label>
                                            </label>
                                            <div class="col-lg-9 col-xl-9">
                                                <div class="summernote">
                                                    <textarea name="content_vi" id="content_vi">{{$item['content_vi']}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                @lang('admin::blog.create.CONTENT_EN')
                                                <span class="color_red">*</span></label>
                                            </label>
                                            <div class="col-lg-9 col-xl-9">
                                                <div class="summernote">
                                                    <textarea name="content_en" id="content_en">{{$item['content_en']}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                @lang('admin::blog.create.STATUS')
                                            </label>
                                            <div class="col-lg-9 col-xl-9">
                                                <div class="kt-radio-list">
                                                    <label class="kt-radio kt-radio--solid kt-radio--success">
                                                        <input type="radio" name="news_status"
                                                               {{$item['news_status'] == 'new' ? 'checked':''}}
                                                               checked value="new"> New
                                                        <span></span>
                                                    </label>
                                                    <label class="kt-radio kt-radio--solid kt-radio--success">
                                                        <input type="radio" name="news_status"
                                                               {{$item['news_status'] == 'review' ? 'checked':''}}
                                                               value="review"> Review
                                                        <span></span>
                                                    </label>
                                                    <label class="kt-radio kt-radio--solid kt-radio--success">
                                                        <input type="radio" name="news_status"
                                                               {{$item['news_status'] == 'publish' ? 'checked':''}}
                                                               value="publish"> Publish
                                                        <span></span>
                                                    </label>
                                                    <label class="kt-radio kt-radio--solid kt-radio--success">
                                                        <input type="radio" name="news_status"
                                                               {{$item['news_status'] == 'reject' ? 'checked':''}}
                                                               value="reject"> Reject
                                                        <span></span>
                                                    </label>
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
        </div>
    </form>

@endsection
@section('after_script')
    <script type="text/template" id="image-tpl">
        <div class="kt-avatar__holder" style="background-image: url({link});background-position: center;"></div>
    </script>
    <script src="{{asset('static/backend/js/admin/blog/script.js?v='.time())}}"
            type="text/javascript"></script>
    <script>
        update._init();

        $('#category_id').select2({
            placeholder: 'Chọn loại tin tức'
        });

        var loading = new KTPortlet('form-update');

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
