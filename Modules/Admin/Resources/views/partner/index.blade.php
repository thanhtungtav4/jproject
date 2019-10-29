@extends('layout')
@section('header')
    @include('components.header',['title' => 'Config'])
@endsection
@section('content')
    <div class="kt-subheader kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">Danh sách trang đối tác</h3>
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
                <div class="tab-pane active" id="kt_widget3_tab1_content">
                    <!--Begin::Timeline 3 -->
                    <div class="form-group">
                        <div class="row">
                            <div class="col-2">
                                <a href="{{route('admin.partner.detail',['page_alias' => 'doi-tac-cua-chung-toi'])}}" class="btn btn-primary">Cấu hình</a>
                            </div>
                            <div class="col-10">
                                <h3>Đối tác của chúng tôi</h3>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-2">
                                <a href="{{route('admin.partner.detail',['page_alias' => 'dai-ly-tpcloud'])}}" class="btn btn-primary">Cấu hình</a>
                            </div>
                            <div class="col-10">
                                <h3>Đại lý Tpcloud</h3>
                            </div>
                        </div>
                    </div>
                    <!--End::Timeline 3 -->
                </div>
            </div>
        </div>
    </div>
@endsection
