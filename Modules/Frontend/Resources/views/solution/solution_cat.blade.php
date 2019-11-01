@extends('frontend::layouts.master')
{{--@section('title', $page[getValueByLang('page_title_')])--}}
@section('title', 'Test')
@section('content')
    {{--    @include('frontend::inc.banner', ['data' => $page[getValueByLang('page_title_')]])--}}
    <div class="banner_sub" id="home">
        <div class="txt_h1">
            <h1>Giải pháp</h1>
            <div class="border_bottom_home"></div>
        </div>
    </div>
    <section class="main_content">
        <div class="container">
            <div class="row">
                @foreach($page as $value)
                    <div class="col-md-3 col-sm-6 col-6 item_solution_box">
                        <a href="#">
                            <div class="box_solution">
                                <div class="item_img_solution_box">
                                    <img class="img-fluid" src="{{$value['plugin_image']}}">
                                </div>
                                <div class="icon_box">
                                    <div class="item_icon">
                                        <img src="{{$value['icon_image']}}">
                                    </div>
                                    <div class="item_icon">
                                        <img src="{{$value['icon_image2']}}">
                                    </div>
                                    <div class="item_icon">
                                        <img src="{{$value['icon_image3']}}">
                                    </div>
                                </div>
                            </div>
                            <div class="container_tittle">
                                <h5>{{$value[getValueByLang('plugin_title_')]}}</h5>
                                <div class="read_more">
                                    <p>Read more</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
@section('after_script')

@endsection
