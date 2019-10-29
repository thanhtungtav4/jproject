@extends('frontend::layouts.master')
@section('title', $detail[getValueByLang('title_')])
@section('content')
    @if (isset($detail))
        <div class="container">
            <div class="m-single">
                <img src="{{ asset($detail['image_thumb']) }}" alt="">
                <div class="top">
                    <h1>{{ $detail[getValueByLang('title_')] }}</h1>
                    <div class="m-5 info">
                        <span class="datetime">{{ date('M dS Y', strtotime($detail['published_date'])) }}</span> |
                        <span class="cate"><a href="{{ route(getValueByLang('frontend.about.news_category_'), ['alias' => $detail[getValueByLang('blog_category_alias_')]]) }}">{{ $detail[getValueByLang('blog_category_name_')] }}</a></span> |
                        <span class="author">By {{ $detail['created_by_name'] }}</span>
                    </div>
                    <p class="desctiption">{{ $detail[getValueByLang('description_')] }}</p>
                    <hr>
                </div>
                <div class="content">
                    {!! $detail[getValueByLang('content_')] !!}
                </div>
            </div>
            <div class="related-post">
                @if (isset($referent))
                    <div class="m-title">@lang('Bài viết liên quan')</div>
                    <hr>
                    <div class="row">
                        @foreach ($referent as $item)
                            <div class="col-md-4">
                                <div class="thumb">
                                    <a href="{{ route(getValueByLang('frontend.about.news_detail_'), ['alias' => $item[getValueByLang('alias_')]]) }}">
                                        <img src="{{ asset($item['image_thumb']) }}" alt="{{ $item[getValueByLang('alias_')] }}">
                                    </a>
                                </div>
                                <div class="content">
                                    <p class="title"><a href="{{ route(getValueByLang('frontend.about.news_detail_'), ['alias' => $item[getValueByLang('alias_')]]) }}">{{ $item[getValueByLang('title_')] }}</a></p>
                                    <p class="time">
                                        <a href="{{ route(getValueByLang('frontend.about.news_detail_'), ['alias' => $item[getValueByLang('alias_')]]) }}">{{ date('M dS Y', strtotime($item['published_date'])) }} </a>|
                                        <span class="cate"><a href="{{ route(getValueByLang('frontend.about.news_detail_'), ['alias' => $item[getValueByLang('alias_')]]) }}">{{ $item[getValueByLang('blog_category_name_')] }}</a></span>
                                    </p>
                                    <p class="author"><a href="{{ route(getValueByLang('frontend.about.news_detail_'), ['alias' => $item[getValueByLang('alias_')]]) }}">By {{ $item['created_by_name'] }}</a></p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    @endif
@endsection
