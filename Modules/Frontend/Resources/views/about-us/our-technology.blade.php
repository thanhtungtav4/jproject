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
    <section class="page-section">
        <div class="container">
            @if (isset($data['content-box']) && count($data['content-box']) > 0)
                @include('frontend::plugin.content-box-left-right', [
                    'data' => $data['content-box'],
                    'displayButton' => false
                ])
            @endif
        </div>
    </section>
@endsection
