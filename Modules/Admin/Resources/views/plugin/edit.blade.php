@extends('layout')
@section('header')
    @include('components.header',['title' => 'Config'])
@endsection
@section('content')
    <div class="kt-subheader kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">@lang('admin::plugin.index.sua_plugin')</h3>
            <span class="kt-subheader__separator kt-subheader__separator--v"></span>
            <div class="kt-subheader__group" id="kt_subheader_search">
                <span class="kt-subheader__desc" id="kt_subheader_total"> </span>

            </div>
            <div class="kt-subheader__group kt-hidden" id="kt_subheader_group_actions">
            </div>
        </div>
        <div class="kt-subheader__toolbar">
            <button type="button" class="form-control btn btn-primary" onclick="plugin.update()">@lang('admin::plugin.index.luu')</button>
            <a href="{{ route('admin.map',$param) }}"><button type="button" class="btn btn-danger">@lang('admin::plugin.index.huy')</button> </a>
        </div>
    </div>
    <!--begin: Datatable -->
    <form id="edit-plugin" class="kt-form" method="POST">
        <div class="kt-content  kt-grid__item kt-grid__item--fluid margin-bottom" id="kt_content">
            <div class="kt-portlet kt-portlet--tabs">
                <div class="kt-portlet__body">
                    <div class="tab-pane active" id="kt_widget3_tab1_content">
                        <!--Begin::Timeline 3 -->

                        <ul class="nav nav-tabs " role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#" data-target="#plugin_title_vi">VI</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#plugin_title_en">EN</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane active" id="plugin_title_vi" role="tabpanel">

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3">
                                            <label>@lang('admin::plugin.index.tieu_de')</label>
                                        </div>
                                        <div class="col-9">
                                            <input type="text" class="form-control" name="plugin_title_vi" placeholder="@lang('admin::plugin.index.tieu_de_tieng_viet')" value="{{$detail['plugin_title_vi']}}">
                                        </div>
                                    </div>
                                </div>

<!-- if hide is solution -->
                                @if($param['plugin_type'] != 'solution-list')
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3">
                                            <label>@lang('admin::plugin.index.noi_dung')</label>
                                        </div>
                                        <div class="col-9">
                                            <div class="summernote">
                                                <textarea name="plugin_content_vi"  id="plugin_content_vi">{!! $detail['plugin_content_vi'] !!}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    @if($param['plugin_type'] != 'client-home-list')
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3">
                                            <label>@lang('admin::plugin.index.noi_dung_khac')</label>
                                        </div>
                                        <div class="col-9">
                                            <div class="summernote">
                                                <textarea name="plugin_content_other_vi"  id="plugin_content_other_vi">{!! $detail['plugin_content_other_vi'] !!}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    @endif
                                    @if($param['plugin_type'] != 'about-home-list')
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3">
                                            <label>@lang('admin::plugin.index.ten_nut')</label>
                                        </div>
                                        <div class="col-9">
                                            <input type="text" class="form-control" id="plugin_btn_name_vi" name="plugin_btn_name_vi" placeholder="@lang('admin::plugin.index.ten_nut_tieng_viet')" value="{{$detail['plugin_btn_name_vi']}}">
                                        </div>
                                    </div>
                                </div>
                                        @endif
                            @endif
<!-- !if hide is solution -->
                                @if($param['plugin_type'] != 'about-home-list' and $param['plugin_type'] != 'client-home-list')
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3">
                                            <label>@lang('admin::plugin.index.link_nut')</label>
                                        </div>
                                        <div class="col-9">
                                            <input type="text" class="form-control" id="plugin_btn_link_vi" name="plugin_btn_link_vi" placeholder="@lang('admin::plugin.index.link_tieng_viet')" value="{{$detail['plugin_btn_link_vi']}}">
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                            <div class="tab-pane" id="plugin_title_en" role="tabpanel">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3">
                                            <label>@lang('admin::plugin.index.tieu_de')</label>
                                        </div>
                                        <div class="col-9">
                                            <input type="text" class="form-control" name="plugin_title_en" placeholder="@lang('admin::plugin.index.tieu_de_tieng_anh')" value="{{$detail['plugin_title_en']}}">
                                        </div>
                                    </div>
                                </div>

<!-- if hide is solution -->
                            @if($param['plugin_type'] != 'solution-list')
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3">
                                            <label>@lang('admin::plugin.index.noi_dung')</label>
                                        </div>
                                        <div class="col-9">
                                            <div class="summernote">
                                                <textarea name="plugin_content_en"  id="plugin_content_en">{!! $detail['plugin_content_en'] !!}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    @if($param['plugin_type'] != 'client-home-list')
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3">
                                            <label>@lang('admin::plugin.index.noi_dung_khac')</label>
                                        </div>
                                        <div class="col-9">
                                            <div class="summernote">
                                                <textarea name="plugin_content_other_en"  id="plugin_content_other_en">{!! $detail['plugin_content_other_en'] !!}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    @endif
                                 @if($param['plugin_type'] != 'about-home-list')
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3">
                                            <label>@lang('admin::plugin.index.ten_nut')</label>
                                        </div>
                                        <div class="col-9">
                                            <input type="text" class="form-control" id="plugin_btn_name_en" name="plugin_btn_name_en" placeholder="@lang('admin::plugin.index.ten_nut_tieng_anh')" value="{{$detail['plugin_btn_name_en']}}">
                                        </div>
                                    </div>
                                </div>
                                 @endif
                            @endif
<!-- !if hide is solution -->
                                @if($param['plugin_type'] != 'about-home-list'  and $param['plugin_type'] != 'client-home-list')
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3">
                                            <label>@lang('admin::plugin.index.link_nut')</label>
                                        </div>
                                        <div class="col-9">
                                            <input type="text" class="form-control" id="plugin_btn_link_en" name="plugin_btn_link_en" placeholder="@lang('admin::plugin.index.link_tieng_anh')" value="{{$detail['plugin_btn_link_en']}}">
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                {{--{{dd($detail)}}--}}
                                @if($param['plugin_type'] == 'item-box')
                                    <div class="col-3">
                                        <label>Icon</label>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" class="form-control" name="plugin_image" value="{{$detail['plugin_image']}}">
                                    </div>
                                @else
                                    <div class="col-3">
                                        <label>@lang('admin::plugin.index.anh')</label>
                                    </div>
                                    <div class="col-9">
                                        <div class="kt-avatar kt-avatar--outline" id="kt_user_add_avatar">
                                            <div id="div-image">
                                                @if(isset($detail['plugin_image']))
                                                    <div class="kt-avatar__holder"
                                                         style="background-image: url({{asset($detail['plugin_image'])}});background-position: center;"></div>
                                                @else
                                                    <div class="kt-avatar__holder"
                                                         style="background-image: url({{asset('static/backend/images/default-placeholder.png')}})"></div>
                                                @endif
                                            </div>
                                            <input type="hidden" id="plugin_image" name="plugin_image">
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
                                @endif
                            </div>
                        </div>
                        <!-- list solution -->
                        @if($param['plugin_type'] == 'solution-list' or $param['plugin_type']='about-home-list')
                            <div class="form-group">
                                <div class="row">
                                        <div class="col-3">
                                            @if($param['plugin_type'] =='about-home-list') @lang('admin::plugin.index.img_icon_home') @else @lang('admin::plugin.index.img_icon') @endif
                                        </div>
                                    {{--{{var_dump(asset($detail['icon_image']))}}--}}
                                        <div class="col-9 display_fex_col">
                                            <div class="col-md-4">
                                                <div class="kt-avatar kt-avatar--outline" id="kt_user_add_avatar">
                                                    <div id="div-image-icon">
                                                        @if(isset($detail['icon_image']))
                                                            <div class="kt-avatar__holder"
                                                                 style="background-image: url({{asset($detail['icon_image'])}});background-position: center;"></div>
                                                        @else
                                                            <div class="kt-avatar__holder"
                                                                 style="background-image: url({{asset('static/backend/images/default-placeholder.png')}})"></div>
                                                        @endif
                                                    </div>
                                                    <input type="hidden" id="icon_image" name="icon_image">
                                                    <label class="kt-avatar__upload" data-toggle="kt-tooltip" title=""
                                                           data-original-title="Change avatar">
                                                        <i class="fa fa-pen"></i>
                                                        <input type="file" id="getFileImageicon" name="getFileImageicon"
                                                               accept="image/jpeg,image/png,image/jpeg,jpg|png|jpeg"
                                                               onchange="uploadImageicon(this);">
                                                    </label>
                                                    <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title=""
                                                          data-original-title="Cancel avatar">
																<i class="fa fa-times"></i>
															</span>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="kt-avatar kt-avatar--outline" id="kt_user_add_avatar">
                                                    <div id="div-image-icon2">
                                                        @if(isset($detail['icon2_image']))
                                                            <div class="kt-avatar__holder"
                                                                 style="background-image: url({{asset($detail['icon2_image'])}});background-position: center;"></div>
                                                        @else
                                                            <div class="kt-avatar__holder"
                                                                 style="background-image: url({{asset('static/backend/images/default-placeholder.png')}})"></div>
                                                        @endif
                                                    </div>
                                                    <input type="hidden" id="icon2_image" name="icon2_image">
                                                    <label class="kt-avatar__upload" data-toggle="kt-tooltip" title=""
                                                           data-original-title="Change avatar">
                                                        <i class="fa fa-pen"></i>
                                                        <input type="file" id="getFileImageicon2" name="getFileImageicon2"
                                                               accept="image/jpeg,image/png,image/jpeg,jpg|png|jpeg"
                                                               onchange="uploadImageicon2(this);">
                                                    </label>
                                                    <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title=""
                                                          data-original-title="Cancel avatar">
																<i class="fa fa-times"></i>
															</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="kt-avatar kt-avatar--outline" id="kt_user_add_avatar">
                                                    <div id="div-image-icon3">
                                                        @if(isset($detail['icon3_image']))
                                                            <div class="kt-avatar__holder"
                                                                 style="background-image: url({{asset($detail['icon3_image'])}});background-position: center;"></div>
                                                        @else
                                                            <div class="kt-avatar__holder"
                                                                 style="background-image: url({{asset('static/backend/images/default-placeholder.png')}})"></div>
                                                        @endif
                                                    </div>
                                                    <input type="hidden" id="icon3_image" name="icon3_image">
                                                    <label class="kt-avatar__upload" data-toggle="kt-tooltip" title=""
                                                           data-original-title="Change avatar">
                                                        <i class="fa fa-pen"></i>
                                                        <input type="file" id="getFileImageicon3" name="getFileImageicon3"
                                                               accept="image/jpeg,image/png,image/jpeg,jpg|png|jpeg"
                                                               onchange="uploadImageicon3(this);">
                                                    </label>
                                                    <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title=""
                                                          data-original-title="Cancel avatar">
																<i class="fa fa-times"></i>
															</span>
                                                </div>
                                            </div>

                                        </div>
                                </div>
                            </div>
                            <!-- about home list -->
                            @if($param['plugin_type'] == 'about-home-list')
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3">
                                            <label>@lang('admin::plugin.index.icon_text_vn')</label>
                                        </div>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col">
                                                    <label for="plugin_text_icon_vi">@lang('admin::plugin.index.text_icon_1')</label>
                                                    <textarea type="text" class="form-control" rows="2" id="plugin_text_icon_vi" name="plugin_text_icon_vi"> {{$detail['plugin_text_icon_vi']}}</textarea>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col">
                                                    <label for="plugin_text_icon2_vi">@lang('admin::plugin.index.text_icon_2')</label>
                                                    <textarea type="text" class="form-control" rows="2" id="plugin_text_icon2_vi" name="plugin_text_icon2_vi"> {{$detail['plugin_text_icon2_vi']}}</textarea>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col">
                                                    <label for="plugin_text_icon3_vi">@lang('admin::plugin.index.text_icon_3')</label>
                                                    <textarea type="text" class="form-control" rows="2" id="plugin_text_icon3_vi" name="plugin_text_icon3_vi"> {{$detail['plugin_text_icon3_vi']}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3">
                                            <label>@lang('admin::plugin.index.icon_text_en')</label>
                                        </div>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col">
                                                    <label for="plugin_text_icon_en">@lang('admin::plugin.index.text_icon_1_en')</label>
                                                    <textarea type="text" class="form-control" rows="2" id="plugin_text_icon_en" name="plugin_text_icon_en"> {{$detail['plugin_text_icon_en']}}</textarea>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col">
                                                    <label for="plugin_text_icon2_en">@lang('admin::plugin.index.text_icon_2_en')</label>
                                                    <textarea type="text" class="form-control" rows="2" id="plugin_text_icon2_en" name="plugin_text_icon2_en">{{$detail['plugin_text_icon2_en']}} </textarea>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col">
                                                    <label for="plugin_text_icon3_en">@lang('admin::plugin.index.text_icon_3_en')</label>
                                                    <textarea type="text" class="form-control" rows="2" id="plugin_text_icon3_en" name="plugin_text_icon3_en">{{$detail['plugin_text_icon3_en']}} </textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        <!-- !about home list -->
                        @endif
                    <!-- !list solution -->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-3">
                                    <label>@lang('admin::plugin.index.thu_tu_hien_thi')</label>
                                </div>
                                <div class="col-9">
                                    <input type="text" class="form-control" name="plugin_order" value="{{$detail['plugin_order']}}">
                                </div>
                            </div>
                        </div>

{{--                        <div class="form-group">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-3">--}}
{{--                                    <p>Tên button</p>--}}
{{--                                </div>--}}
{{--                                <div class="col-9">--}}
{{--                                    <input type="text" class="form-control" name="plugin_btn_name" value="{{$detail['plugin_btn_name']}}">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-3">--}}
{{--                                    <label>Vị trí hiển thị text</label>--}}
{{--                                </div>--}}
{{--                                <div class="col-9">--}}
{{--                                    <select type="text" name="plugin_float" id="plugin_float" class="form-control --select2 ss--width-100">--}}
{{--                                        <option value="">----------------------</option>--}}
{{--                                        <option value="left" {{$detail['plugin_float'] == 'left' ? "selected" : ""}}>Trái</option>--}}
{{--                                        <option value="right" {{$detail['plugin_float'] == 'right' ? "selected" : ""}}>Phải</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <div class="form-group">
                            <div class="row">
                                <div class="col-3">
                                    <label>@lang('admin::plugin.index.kich_hoat')</label>
                                </div>
                                <div class="col-9">
                                    <span class="kt-switch kt-switch--success">
                                        <label>
                                            <input type="checkbox"
                                                   name="is_active" {{$detail['is_active'] == 1 ? "checked" :""}}>
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
        <input type="text" hidden value="{{$detail['plugin_id']}}" name="plugin_id">
        <input type="text" hidden value="{{$param['plugin_type']}}" name="plugin_type">
    </form>
@endsection

@section('after_style')
    <link href="{{asset('static/backend/css/style/style.css?v='.time())}}" rel="stylesheet"/>
@endsection

@section('after_script')
    <script type="text/template" id="image-tpl">
        <div class="kt-avatar__holder" style="background-image: url({link});background-position: center;"></div>
    </script>
    <script>
        $('#plugin_content_vi').summernote({
            // placeholder: 'Nhập nội dung',
            height: 150,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['fontname', ['fontname', 'fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']],
            ]
            // onImageUpload: function(files, editor, welEditable) {
            //     sendFile(files[0], editor, welEditable);
            // }
        });

        $('#plugin_content_other_vi').summernote({
            // placeholder: 'Nhập nội dung',
            height: 150,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['fontname', ['fontname', 'fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']],
            ]
            // onImageUpload: function(files, editor, welEditable) {
            //     sendFile(files[0], editor, welEditable);
            // }
        });
        $('#plugin_content_en').summernote({
            // placeholder: 'Nhập nội dung',
            height: 150,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['fontname', ['fontname', 'fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']],
            ]
            // onImageUpload: function(files, editor, welEditable) {
            //     sendFile(files[0], editor, welEditable);
            // }
        });
        $('#plugin_content_other_en').summernote({
            // placeholder: 'Nhập nội dung',
            height: 150,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['fontname', ['fontname', 'fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']],
            ]
            // onImageUpload: function(files, editor, welEditable) {
            //     sendFile(files[0], editor, welEditable);
            // }
        });

        $(document).ready(function() {
            $('#plugin_float').select2();
        });
    </script>
    <script type="text/javascript" src="{{ asset('static/backend/js/admin/script.js?v='.time()) }}"></script>
@endsection
