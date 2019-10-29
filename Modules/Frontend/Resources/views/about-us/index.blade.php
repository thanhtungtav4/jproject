@extends('frontend::layouts.master')
@section('title', $page[getValueByLang('page_title_')])
@section('content')
    <div class="m-blog">
        <div class="m-header">
            <div class="m-title">
                <h3>{{ $page[getValueByLang('page_title_')] }}</h3>
            </div>
        </div>
    </div>
    @if (isset($data['content-box']) && count($data['content-box']) > 0)
        @include('frontend::plugin.content-box-left-right', [
            'data' => $data['content-box'],
            'displayButton' => false
        ])
    @endif
    <section class="page-section">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-lg-7 text-center">
                    <h4 class="title-4">{{ $page[getValueByLang('page_sub_title_1_')] }}</h4>
                    <hr>
                    <p class="text-muted">
                        {!! $page[getValueByLang('page_content_1_')] !!}
                    </p>
                </div>
            </div>
            @if (isset($data['item-box']) && count($data['item-box']) > 0)
                @include('frontend::plugin.item-box', ['data' => $data['item-box']])
            @endif
            <div class="text-center">
                <button type="button" class="btn btn-primary" onclick="Shared.redirectTo('{{ route(getValueByLang('frontend.about.our_technology_')) }}')">
                    @lang('Tìm hiểu thêm')
                </button>
            </div>
        </div>
    </section>
    <section class="bg-light page-section">
        <div class="container">
            @if (isset($data['footer-box']) && count($data['item-box']) > 0)
                @include('frontend::plugin.footer-box', ['data' => $data['footer-box']])
            @endif
        </div>
    </section>
@endsection
