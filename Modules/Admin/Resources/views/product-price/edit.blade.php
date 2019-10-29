@extends('layout')
@section('header')
    @include('components.header',['title' => 'Config'])
@endsection
@section('content')
    <div class="kt-subheader kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">@lang('admin::product-price.index.sua_trang')</h3>
            <span class="kt-subheader__separator kt-subheader__separator--v"></span>
            <div class="kt-subheader__group" id="kt_subheader_search">
                <span class="kt-subheader__desc" id="kt_subheader_total"> </span>

            </div>
            <div class="kt-subheader__group kt-hidden" id="kt_subheader_group_actions">
            </div>
        </div>
        <div class="kt-subheader__toolbar">
            <button type="button" class="form-control btn btn-primary" onclick="productprice.update()">@lang('admin::product-price.index.luu')</button>
            <a href="{{ route("admin.map",['page_id' => $page_id, 'page_type' => $page_type]) }}"><button type="button" class="btn btn-danger">@lang('admin::product-price.index.huy')</button> </a>
        </div>
    </div>
    <!--begin: Datatable -->
    <form id="update-product-price" class="kt-form" method="POST">
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
                                            <label>@lang('admin::product-price.index.ten_san_pham')</label>
                                        </div>
                                        <div class="col-9">
                                            <input type="text" class="form-control" name="name_vi" placeholder="@lang('admin::product-price.index.ten_tieng_viet')" value="{{$detail['name_vi']}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3">
                                            <label>@lang('admin::product-price.index.noi_dung')</label>
                                        </div>
                                        <div class="col-9">
                                            <div>
                                                <textarea class="summernote form-control" name="description_vi" >{!! $detail['description_vi'] !!}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            {{--                            Tiếng anh --}}
                            <div class="tab-pane" id="page_title_en_tab" role="tabpanel">

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3">
                                            <label>@lang('admin::product-price.index.ten_san_pham')</label>
                                        </div>
                                        <div class="col-9">
                                            <input type="text" class="form-control" name="name_en" placeholder="@lang('admin::product-price.index.ten_tieng_anh')" value="{{$detail['name_en']}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3">
                                            <label>@lang('admin::product-price.index.noi_dung')</label>
                                        </div>
                                        <div class="col-9">
                                            <div>
                                                <textarea class="summernote form-control" name="description_en" >{!! $detail['description_en'] !!}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-3">
                                    <label>@lang('admin::product-price.index.anh')</label>
                                </div>
                                <div class="col-9">
                                    <div class="kt-avatar kt-avatar--outline" id="kt_user_add_avatar">
                                        <div id="div-image">
                                            @if(isset($detail['image_thumb']))
                                                <div class="kt-avatar__holder"
                                                     style="background-image: url({{asset($detail['image_thumb'])}});background-position: center;"></div>
                                            @else
                                                <div class="kt-avatar__holder"
                                                     style="background-image: url({{asset('static/backend/images/default-placeholder.png')}})"></div>
                                            @endif
                                        </div>
                                        <input type="hidden" id="image_thumb" name="image_thumb" >
                                        <label class="kt-avatar__upload" data-toggle="kt-tooltip" title=""
                                               data-original-title="Change avatar">
                                            <i class="fa fa-pen"></i>
                                            <input type="file" id="getFileImage" name="getFileImage"
                                                   accept="image/jpeg,image/png,image/jpeg,jpg|png|jpeg"
                                                   onchange="uploadImageProductPrice(this);">
                                        </label>
                                        <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title=""
                                              data-original-title="Cancel avatar">
																<i class="fa fa-times"></i>
															</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-3">
                                    <label>@lang('admin::product-price.index.gia')</label>
                                </div>
                                <div class="col-9">
                                    <input type="text" class="form-control" name="price" placeholder="Giá" value="{{$detail['price']}}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-3">
                                    <label>@lang('admin::product-price.index.vi_tri')</label>
                                </div>
                                <div class="col-9">
                                    <input type="text" name="price_order" class="form-control" value="{{$detail['price_order']}}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-3">
                                    <label>@lang('admin::product-price.index.pho_bien')</label>
                                </div>
                                <div class="col-9">
                                    <span class="kt-switch kt-switch--success">
                                        <label>
                                            <input type="checkbox"
                                                   name="is_feature" {{$detail['is_feature'] == 1 ? "checked" : "" }}>
                                            <span></span>
                                        </label>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-3">
                                    <label>@lang('admin::product-price.index.kich_hoat')</label>
                                </div>
                                <div class="col-9">
                                    <span class="kt-switch kt-switch--success">
                                        <label>
                                            <input type="checkbox"
                                                   name="is_active" {{$detail['is_active'] == 1 ? "checked" : "" }}>
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
        <input type="text" hidden name="id" value="{{$detail['id']}}">
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
