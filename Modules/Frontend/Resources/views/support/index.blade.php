@extends('frontend::layouts.master')
@section('title', $page[getValueByLang('page_title_')])
@section('content')
    <div class="m-blog">
        <div class="m-header">
            <div class="m-title">
                <h3>{{ $page[getValueByLang('page_title_')] }}</h3>
            </div>
        </div>
        <div class="block-support">
            <div class="container">
                <div class="inner-support">
                    <div class="row">
                        <div class="col-md-8">
                            <h4 class="title-border">{{ $page[getValueByLang('page_sub_title_1_')] }}</h4>
                            <div class="row">
                                @if (isset($listSupport) && count($listSupport) > 0)
                                    @foreach ($listSupport as $item)
                                        <div class="col-lg-6">
                                            <article class="art-subject">
                                                <span class="outer-icon"><i class="icon icon-user"></i></span>
                                                <div class="des">
                                                    <h5>{{ $item[getValueByLang('title_')] }}</h5>
                                                    <p>{!! $item[getValueByLang('description_')] !!}</p>
                                                </div>
                                            </article>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="block-bar block-bg">
                                <h4>{{ $page[getValueByLang('page_sub_title_2_')] }}</h4>
                                <ul class="list-faq">
                                    @if (isset($listFaq) && count($listFaq) > 0)
                                        @foreach ($listFaq as $item)
                                            <li>
                                                <a href="{{ route(getValueByLang('frontend.support.faq_')) }}#heading{{ $item['id'] }}"
                                                   title="{{ $item[getValueByLang('question_')] }}">
                                                    {!! $item[getValueByLang('question_')] !!}
                                                </a>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                            <div class="block-bar block-bg">
                                <h4>{{ $page[getValueByLang('page_sub_title_3_')] }}</h4>
                                <p>{{ $page[getValueByLang('page_content_1_')] }}</p>
                                <a class="btn btn-primary" href="{{ route(getValueByLang('frontend.about.contact_')) }}" title="">Liên hệ</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
