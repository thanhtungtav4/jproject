@extends('layout')
@section('header')
    @include('components.header',['title' => 'Config'])
@endsection
@section('content')
    <div class="kt-subheader kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">@lang('admin::page.index.tao_trang')</h3>
            <span class="kt-subheader__separator kt-subheader__separator--v"></span>
            <div class="kt-subheader__group" id="kt_subheader_search">
                <span class="kt-subheader__desc" id="kt_subheader_total"> </span>

            </div>
            <div class="kt-subheader__group kt-hidden" id="kt_subheader_group_actions">
            </div>
        </div>
        <div class="kt-subheader__toolbar">
            <button type="button" class="form-control btn btn-primary" onclick="pageAction.create()">@lang('admin::page.index.tao')</button>
            @if($page_id != 0)
                @if($page_type == "solution")
                    <a href="{{ route("admin.map",['page_id' => $page_id,'page_type' => 'solution']) }}"><button type="button" class="btn btn-secondary btn-hover-danger">@lang('admin::page.index.huy')</button> </a>
                @else
                    <a href="{{ route("admin.map",['page_id' => $page_id,'page_type' => 'product']) }}"><button type="button" class="btn btn-secondary btn-hover-danger">@lang('admin::page.index.huy')</button> </a>
                @endif
            @else
                @if($page_type == "solution")
                    <a href="{{ route("admin.solution.solution") }}"><button type="button" class="btn btn-secondary btn-hover-danger">@lang('admin::page.index.huy')</button> </a>
                @else
                    <a href="{{ route("admin.product.product") }}"><button type="button" class="btn btn-secondary btn-hover-danger">@lang('admin::page.index.huy')</button> </a>
                @endif
            @endif
        </div>
    </div>
    <!--begin: Datatable -->
    <form id="create-page" class="kt-form" method="POST">
        <div class="kt-content  kt-grid__item kt-grid__item--fluid margin-bottom" id="kt_content">
            <div class="kt-portlet kt-portlet--tabs">
                <div class="kt-portlet__body">
                    <div class="tab-pane active" id="kt_widget3_tab1_content">
                        <!--Begin::Timeline 3 -->
                        <ul class="nav nav-tabs nav-bootstrap" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#" data-target="#page_title_vi_tab">VI</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#page_title_en_tab">EN</a>
                            </li>
                        </ul>
                        {{--                        Tiếng Việt--}}
                        <div class="tab-content">
                            <div class="tab-pane active" id="page_title_vi_tab" role="tabpanel">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3">
                                            <label>@lang('admin::page.index.tieu_de')</label>
                                        </div>
                                        <div class="col-9">
                                            <input type="text" class="form-control" name="page_title_vi" placeholder="@lang('admin::page.index.tieu_de_tieng_viet')">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3">
                                            <label>@lang('admin::page.index.tieu_de_1')</label>
                                        </div>
                                        <div class="col-9">
                                            <input type="text" class="form-control" name="page_sub_title_1_vi" placeholder="@lang('admin::page.index.tieu_de_tieng_viet')">
                                        </div>
                                    </div>
                                </div>

                                {{--                                <div class="form-group">--}}
                                {{--                                    <div class="row">--}}
                                {{--                                        <div class="col-3">--}}
                                {{--                                            <label>@lang('admin::page.index.tieu_de_2')</label>--}}
                                {{--                                        </div>--}}
                                {{--                                        <div class="col-9">--}}
                                {{--                                            <input type="text" class="form-control" name="page_sub_title_2_vi" placeholder="@lang('admin::page.index.tieu_de_tieng_viet')">--}}
                                {{--                                        </div>--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}

                                {{--                                <div class="form-group">--}}
                                {{--                                    <div class="row">--}}
                                {{--                                        <div class="col-3">--}}
                                {{--                                            <label>@lang('admin::page.index.tieu_de_3')</label>--}}
                                {{--                                        </div>--}}
                                {{--                                        <div class="col-9">--}}
                                {{--                                            <input type="text" class="form-control" name="page_sub_title_3_vi" placeholder="@lang('admin::page.index.tieu_de_tieng_viet')">--}}
                                {{--                                        </div>--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}

                                {{--                                <div class="form-group">--}}
                                {{--                                    <div class="row">--}}
                                {{--                                        <div class="col-3">--}}
                                {{--                                            <label>@lang('admin::page.index.noi_dung_1')</label>--}}
                                {{--                                        </div>--}}
                                {{--                                        <div class="col-9">--}}
                                {{--                                            <div>--}}
                                {{--                                                <textarea class="summernote form-control" name="page_content_1_vi" ></textarea>--}}
                                {{--                                            </div>--}}
                                {{--                                        </div>--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}

                                {{--                                <div class="form-group">--}}
                                {{--                                    <div class="row">--}}
                                {{--                                        <div class="col-3">--}}
                                {{--                                            <label>@lang('admin::page.index.noi_dung_2')</label>--}}
                                {{--                                        </div>--}}
                                {{--                                        <div class="col-9">--}}
                                {{--                                            <div>--}}
                                {{--                                                <textarea class="summernote form-control" name="page_content_2_vi" ></textarea>--}}
                                {{--                                            </div>--}}
                                {{--                                        </div>--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3">
                                            <label>@lang('admin::page.index.tieu_de_seo')</label>
                                        </div>
                                        <div class="col-9">
                                            <input type="text" class="form-control" name="seo_title_vi" placeholder="@lang('admin::page.index.tieu_de_seo_vi')">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3">
                                            <label>@lang('admin::page.index.noi_dung_seo')</label>
                                        </div>
                                        <div class="col-9">
                                            <div>
                                                <textarea class="form-control" name="seo_description_vi" placeholder="Nhập nội dung..."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3">
                                            <label>@lang('admin::page.index.tu_khoa_seo')</label>
                                        </div>
                                        <div class="col-9">
                                            <input type="text" class="form-control" name="seo_keyword_vi" placeholder="@lang('admin::page.index.tu_khoa_seo_vi')">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3">
                                            <label>Tên menu</label>
                                        </div>
                                        <div class="col-9">
                                            <input type="text" class="form-control" name="page_menu_vi" placeholder="Nhập tên tiếng Việt hiển thị ở menu">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            {{--                            Tiếng anh --}}
                            <div class="tab-pane" id="page_title_en_tab" role="tabpanel">

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3">
                                            <label>@lang('admin::page.index.tieu_de')</label>
                                        </div>
                                        <div class="col-9">
                                            <input type="text" class="form-control" name="page_title_en" placeholder="@lang('admin::page.index.tieu_de_tieng_anh')">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3">
                                            <label>@lang('admin::page.index.tieu_de_1')</label>
                                        </div>
                                        <div class="col-9">
                                            <input type="text" class="form-control" name="page_sub_title_1_en" placeholder="@lang('admin::page.index.tieu_de_tieng_anh')">
                                        </div>
                                    </div>
                                </div>

                                {{--                                <div class="form-group">--}}
                                {{--                                    <div class="row">--}}
                                {{--                                        <div class="col-3">--}}
                                {{--                                            <label>@lang('admin::page.index.tieu_de_2')</label>--}}
                                {{--                                        </div>--}}
                                {{--                                        <div class="col-9">--}}
                                {{--                                            <input type="text" class="form-control" name="page_sub_title_2_en" placeholder="@lang('admin::page.index.tieu_de_tieng_anh')">--}}
                                {{--                                        </div>--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}

                                {{--                                <div class="form-group">--}}
                                {{--                                    <div class="row">--}}
                                {{--                                        <div class="col-3">--}}
                                {{--                                            <label>@lang('admin::page.index.tieu_de_3')</label>--}}
                                {{--                                        </div>--}}
                                {{--                                        <div class="col-9">--}}
                                {{--                                            <input type="text" class="form-control" name="page_sub_title_3_en" placeholder="@lang('admin::page.index.tieu_de_tieng_anh')">--}}
                                {{--                                        </div>--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}

                                {{--                                <div class="form-group">--}}
                                {{--                                    <div class="row">--}}
                                {{--                                        <div class="col-3">--}}
                                {{--                                            <label>@lang('admin::page.index.noi_dung_1')</label>--}}
                                {{--                                        </div>--}}
                                {{--                                        <div class="col-9">--}}
                                {{--                                            <div>--}}
                                {{--                                                <textarea class="summernote form-control" name="page_content_1_en" ></textarea>--}}
                                {{--                                            </div>--}}
                                {{--                                        </div>--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}

                                {{--                                <div class="form-group">--}}
                                {{--                                    <div class="row">--}}
                                {{--                                        <div class="col-3">--}}
                                {{--                                            <label>@lang('admin::page.index.noi_dung_2')</label>--}}
                                {{--                                        </div>--}}
                                {{--                                        <div class="col-9">--}}
                                {{--                                            <div>--}}
                                {{--                                                <textarea class="summernote form-control" name="page_content_2_en" ></textarea>--}}
                                {{--                                            </div>--}}
                                {{--                                        </div>--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3">
                                            <label>@lang('admin::page.index.tieu_de_seo')</label>
                                        </div>
                                        <div class="col-9">
                                            <input type="text" class="form-control" name="seo_title_en" placeholder="@lang('admin::page.index.tieu_de_seo_en')">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3">
                                            <label>@lang('admin::page.index.noi_dung_seo')</label>
                                        </div>
                                        <div class="col-9">
                                            <div>
                                                <textarea class="form-control" name="seo_description_en" placeholder="Nhập nội dung..."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3">
                                            <label>@lang('admin::page.index.tu_khoa_seo')</label>
                                        </div>
                                        <div class="col-9">
                                            <input type="text" class="form-control" name="seo_keyword_en" placeholder="@lang('admin::page.index.tu_khoa_seo_en')">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3">
                                            <label>Tên menu</label>
                                        </div>
                                        <div class="col-9">
                                            <input type="text" class="form-control" name="page_menu_en" placeholder="Nhập tên tiếng Anh hiển thị ở menu">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        {{--                        end tab--}}
                        {{--                        <div class="form-group">--}}
                        {{--                            <div class="row">--}}
                        {{--                                <div class="col-3">--}}
                        {{--                                    <label>@lang('admin::page.index.anh')</label>--}}
                        {{--                                </div>--}}
                        {{--                                <div class="col-9">--}}
                        {{--                                    <div class="kt-avatar kt-avatar--outline" id="kt_user_add_avatar">--}}
                        {{--                                        <div id="div-image">--}}
                        {{--                                            <div class="kt-avatar__holder"--}}
                        {{--                                                 style="background-image: url({{asset('static/backend/images/default-placeholder.png')}})"></div>--}}
                        {{--                                        </div>--}}
                        {{--                                        <input type="hidden" id="page_image" name="page_image">--}}
                        {{--                                        <label class="kt-avatar__upload" data-toggle="kt-tooltip" title=""--}}
                        {{--                                               data-original-title="Change avatar">--}}
                        {{--                                            <i class="fa fa-pen"></i>--}}
                        {{--                                            <input type="file" id="getFileImage" name="getFileImage"--}}
                        {{--                                                   accept="image/jpeg,image/png,image/jpeg,jpg|png|jpeg"--}}
                        {{--                                                   onchange="uploadImagePage(this);">--}}
                        {{--                                        </label>--}}
                        {{--                                        <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title=""--}}
                        {{--                                              data-original-title="Cancel avatar">--}}
                        {{--																<i class="fa fa-times"></i>--}}
                        {{--															</span>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}

                        <div class="form-group">
                            <div class="row">
                                <div class="col-3">
                                    <label>@lang('admin::page.index.hinh_anh_seo')</label>
                                </div>
                                <div class="col-9">
                                    <div class="kt-avatar kt-avatar--outline" id="kt_user_add_avatar">
                                        <div id="div-image-seo">
                                            <div class="kt-avatar__holder"
                                                 style="background-image: url({{asset('static/backend/images/default-placeholder.png')}})"></div>
                                        </div>
                                        <input type="hidden" id="seo_image" name="seo_image">
                                        <label class="kt-avatar__upload" data-toggle="kt-tooltip" title=""
                                               data-original-title="Change avatar">
                                            <i class="fa fa-pen"></i>
                                            <input type="file" id="getFileImageSeo" name="getFileImageSeo"
                                                   accept="image/jpeg,image/png,image/jpeg,jpg|png|jpeg"
                                                   onchange="uploadImageSeo(this);">
                                        </label>
                                        <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title=""
                                              data-original-title="Cancel avatar">
																<i class="fa fa-times"></i>
															</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{--                        <div class="form-group">--}}
                        {{--                            <div class="row">--}}
                        {{--                                <div class="col-3">--}}
                        {{--                                    <label>@lang('admin::page.index.background')</label>--}}
                        {{--                                </div>--}}
                        {{--                                <div class="col-9">--}}
                        {{--                                    <div class="kt-avatar kt-avatar--outline" id="kt_user_add_avatar">--}}
                        {{--                                        <div id="div-image-background">--}}
                        {{--                                            <div class="kt-avatar__holder"--}}
                        {{--                                                 style="background-image: url({{asset('static/backend/images/default-placeholder.png')}})"></div>--}}
                        {{--                                        </div>--}}
                        {{--                                        <input type="hidden" id="background" name="background">--}}
                        {{--                                        <label class="kt-avatar__upload" data-toggle="kt-tooltip" title=""--}}
                        {{--                                               data-original-title="Change avatar">--}}
                        {{--                                            <i class="fa fa-pen"></i>--}}
                        {{--                                            <input type="file" id="getFileBackground" name="getFileBackground"--}}
                        {{--                                                   accept="image/jpeg,image/png,image/jpeg,jpg|png|jpeg"--}}
                        {{--                                                   onchange="uploadBackground(this);">--}}
                        {{--                                        </label>--}}
                        {{--                                        <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title=""--}}
                        {{--                                              data-original-title="Cancel avatar">--}}
                        {{--																<i class="fa fa-times"></i>--}}
                        {{--															</span>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}

                        @if($category_id != 6)
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-3">
                                        <label>@lang('admin::page.index.danh_muc')</label>
                                    </div>
                                    <div class="col-9">
                                        <select type="text" name="category_id" id="category_id" class="form-control --select2 ss--width-100">
                                            @foreach($category as $value)
                                                <option value="{{$value['id']}}">{{$value['name_vi']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        @else
                            <input type="text" name="category_id" value="6" hidden>
                        @endif
                        <div class="form-group">
                            <div class="row">
                                <div class="col-3">
                                    <label>Icon</label>
                                </div>
                                <div class="col-9">
                                    <input type="text" class="form-control" name="page_icon" placeholder="icon">
                                </div>
                            </div>
                        </div>

                        {{--                        <div class="form-group">--}}
                        {{--                            <div class="row">--}}
                        {{--                                <div class="col-3">--}}
                        {{--                                    <label>@lang('admin::page.index.vi_tri')</label>--}}
                        {{--                                </div>--}}
                        {{--                                <div class="col-9">--}}
                        {{--                                    <input type="text" name="page_position" class="form-control">--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}

                        <div class="form-group">
                            <div class="row">
                                <div class="col-3">
                                    <label>Hiển thị ở menu</label>
                                </div>
                                <div class="col-9">
                                    <span class="kt-switch kt-switch--success">
                                        <label>
                                            <input type="checkbox"
                                                   name="is_menu" checked>
                                            <span></span>
                                        </label>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-3">
                                    <label>@lang('admin::page.index.kich_hoat')</label>
                                </div>
                                <div class="col-9">
                                    <span class="kt-switch kt-switch--success">
                                        <label>
                                            <input type="checkbox"
                                                   name="is_active" checked>
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
        <input type="text" hidden name="page_type" value="{{$page_type}}">
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
        // var Summernote = {
        //     init: function () {
        //         $(".summernote").summernote({
        //             height: 208,
        //             placeholder: 'Nhập nội dung...',
        //             // toolbar: [
        //             //     ['style', ['bold', 'italic', 'underline']],
        //             //     ['fontsize', ['fontsize']],
        //             //     ['color', ['color']],
        //             //     ['para', ['ul', 'ol', 'paragraph']],
        //             //     // ['insert', ['link', 'picture']]
        //             // ]
        //         })
        //     }
        // };
        // jQuery(document).ready(function () {
        //     Summernote.init()
        // });

        $(document).ready(function() {
            $('#category_id').select2();
        });
    </script>
    <script type="text/javascript" src="{{ asset('static/backend/js/admin/script.js?v='.time()) }}"></script>
@endsection
