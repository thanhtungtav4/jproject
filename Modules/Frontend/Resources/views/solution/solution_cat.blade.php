@extends('frontend::layouts.master')
{{--@section('title', $page[getValueByLang('page_title_')])--}}
@section('title', __('Giải pháp'))
@section('content')
    @include('frontend::inc.banner', ['data' => __('Giải pháp')])
    <section class="main_content">
        <div class="container">
            <div class="row">
                @foreach($page as $item)
                    <div class="col-md-4 col-lg-3  item_solution_box list_arv">
                        <a href="{{route('frontend.solution_'.Config::get('app.locale'))}}{{$item[getValueByLang('plugin_btn_link_')]}}">
                            <div class="box_solution">
                                <div class="item_img_solution_box">
                                    <img class="img-fluid" src="{{asset($item['plugin_image'])}}">
                                </div>
                                <div class="icon_box">
                                    @if (!empty($item['icon_image']))
                                        <div class="item_icon">
                                            <img src="{{asset($item['icon_image'])}}">
                                        </div>
                                    @endif
                                    @if (!empty($item['icon2_image']))
                                        <div class="item_icon">
                                            <img src="{{asset($item['icon2_image'])}}">
                                        </div>
                                    @endif
                                    @if (!empty($item['icon3_image']))
                                        <div class="item_icon">
                                            <img src="{{asset($item['icon3_image'])}}">
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="container_tittle">
                                <h5>{{$item[getValueByLang('plugin_title_')]}}</h5>
                                <div class="read_more">
                                    <p>{{__('Xem thêm')}}</p>
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
