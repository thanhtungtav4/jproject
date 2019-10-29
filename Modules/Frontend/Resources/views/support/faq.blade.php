@extends('frontend::layouts.master')
@section('title', $page[getValueByLang('page_title_')])
@section('content')
    <div class="m-blog">
        <div class="m-header">
            <div class="m-title">
                <h3>{{ $page[getValueByLang('page_title_')] }}</h3>
            </div>
        </div>
        <div class="block-faq">
            <div class="container">
                <div class="text-right">
                    <form class="frm-faq">
                        <input class="txt-search-faq" type="search" value="{{ $filter[getValueByLang('question_')] ?? null }}"
                               name="{{ getValueByLang('question_') }}">
                        <button type="submit" class="btn-search-faq">
                            <img src="{{ asset('static/frontend/img/photo/btn-search-faq.svg') }}" alt="search">
                        </button>
                    </form>
                </div>
                <div class="box-faq">
                    <div class="accordion accordionfaq" id="accordionFAQ">
                        @if (isset($listFaq) && count($listFaq) > 0)
                            @foreach ($listFaq as $index => $item)
                                <div class="card">
                                    <div class="card-header" id="heading{{ $item['id'] }}">
                                        <h2 class="mb-0">
                                            <a class="btn btn-link {{ ($index == 0) ? 'collapsed' : '' }}collapsed" data-toggle="collapse" data-target="#collapse{{ $index }}" aria-expanded="true" aria-controls="collapse{{ $index }}">
                                                {!! $item[getValueByLang('question_')] !!}
                                            </a>
                                        </h2>
                                    </div>
                                    <div id="collapse{{ $index }}" class="collapse {{ ($index == 0) ? 'show' : '' }}" aria-labelledby="heading{{ $item['id'] }}" data-parent="#accordionFAQ">
                                        <div class="card-body">
                                            {!! $item[getValueByLang('answer_')] !!}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
