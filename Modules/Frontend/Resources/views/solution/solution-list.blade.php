@extends('frontend::layouts.master')
{{--@section('title', $page[getValueByLang('page_title_')])--}}
@section('title', __("Giải pháp"))
@section('content')
    @include('frontend::inc.banner', ['data' => __("Giải pháp")])
    <section class="main_content">
        <div class="container">
            {{--$page[0][getValueByLang('page_sub_title_1_')])--}}
            <div class="row">
                <div class="col-md-4">
                    <strong class="profile_title">{{__("Giải pháp")}}</strong>
                    <ul class="nav">
                        <?php $tmp = 0 ?>
                        <?php $category = 0 ?>
                        @foreach($page as $value)
                            @if($tmp == 0)
                                <li class="nav-item">
                                    <a class="nav-link active bold-text" data-toggle="tab" href="#tab_{{$value['page_id']}}">{{$value[getValueByLang('page_sub_title_1_')]}}</a>
                                    <?php $tmp = 1 ?>
                                </li>
                            @else
                                @if($value['page_type'] == 'solution-list-child')
                                    @if($category == 0)
                                        <li class="nav-item">
                                            <a class="nav-link bold-text" data-toggle="tab" href="javascript:void(0)">{{__("Tiết kiệm năng lượng hệ thống DHKK của RiCS")}}</a>
                                            <?php $category = 1 ?>
                                        </li>
                                    @endif
                                @endif
                                <li class="nav-item">
                                    <a class="nav-link {{$value['page_type'] == 'solution-list-child' ? 'child-nav' : 'bold-text'}}" data-toggle="tab" href="#tab_{{$value['page_id']}}">{{$value[getValueByLang('page_sub_title_1_')]}}</a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-8">
                    <div class="tab-content">
                        <?php $tmp1 = 0 ?>
                        @foreach($page as $value)
                            @if($tmp1 == 0)
                                <div id="tab_{{$value['page_id']}}" class="container tab-pane active">
                                    {!! $value[getValueByLang('page_content_1_')] !!}
                                </div>
                                <?php $tmp1 = 1 ?>
                            @else
                                <div id="tab_{{$value['page_id']}}" class="container tab-pane fade">
                                    {!! $value[getValueByLang('page_content_1_')] !!}
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div></div>
    </section>

@endsection
@section('after_script')

@endsection
