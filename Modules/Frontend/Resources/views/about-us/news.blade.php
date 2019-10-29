@extends('frontend::layouts.master')
@section('title', $page[getValueByLang('page_title_')])
@section('content')
    <div class="m-blog">
        <div class="m-header">
            <div class="m-title">
                <h3>{{ $page[getValueByLang('page_title_')] }}</h3>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <form method="GET" action="" class="frm-blog">
                        <div class="form-group">
                            <input type="search" class="form-control" id="keyword_tpcloud_cms_blog${{ getValueByLang('title_') }}"
                                   name="keyword_tpcloud_cms_blog${{ getValueByLang('title_') }}"
                                   value="{{ $filter['keyword_tpcloud_cms_blog$'.getValueByLang('title_')] ?? '' }}"
                                   aria-describedby="Help" placeholder="Search">
                        </div>
                    </form>
                    <div class="m-menu">
                        <p>{{ $page[getValueByLang('page_sub_title_1_')] }}</p>
                        <ul>
                            @if (isset($listCategory) && count($listCategory) > 0)
                                @foreach ($listCategory as $item)
                                    <li>
                                        <a href="{{ route(getValueByLang('frontend.about.news_category_'), ['alias' => $item[getValueByLang('alias_')]]) }}">
                                            {{ $item[getValueByLang('title_')] }}
                                        </a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-md-9">
                    @if (isset($list) && $list->count() > 0)
                        <div class="row">
                            @foreach ($list as $item)
                                <div class="col-lg-4">
                                    <div class="m-news">
                                        <div class="m-thumbs">
                                            <a href="{{ route(getValueByLang('frontend.about.news_detail_'), ['alias' => $item[getValueByLang('alias_')]]) }}">
                                                <img class="rounded img-fluid" src="{{ asset($item['image_thumb']) }}"
                                                     alt="{{ $item[getValueByLang('alias_')] }}">
                                            </a>
                                        </div>
                                        <div class="m-content">
                                            <p class="title">
                                                <a href="{{ route(getValueByLang('frontend.about.news_detail_'), ['alias' => $item[getValueByLang('alias_')]]) }}">{{ $item[getValueByLang('title_')] }}</a>
                                            </p>
                                            <p class="time">
                                                <a href="{{ route(getValueByLang('frontend.about.news_detail_'), ['alias' => $item[getValueByLang('alias_')]]) }}">{{ date('M dS Y', strtotime($item['published_date'])) }} </a>|
                                                <span class="cate">
                                                    <a href="{{ route(getValueByLang('frontend.about.news_category_'), ['alias' => $item[getValueByLang('blog_category_alias_')]]) }}">
                                                        {{ $item[getValueByLang('blog_category_name_')] }}
                                                    </a>
                                                </span>
                                            </p>
                                            <p class="author"><a href="{{ route(getValueByLang('frontend.about.news_detail_'), ['alias' => $item[getValueByLang('alias_')]]) }}">By {{ $item['created_by_name'] }}</a></p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        {{ $list->appends($filter)->links('frontend::plugin.paging') }}
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
