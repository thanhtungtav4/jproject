@extends('frontend::layouts.master')
@section('title', $page[getValueByLang('page_title_')])
@section('content')
    @include('frontend::inc.banner', ['data' => $page[getValueByLang('page_title_')]])
    {!! $page[getValueByLang('page_content_1_')] !!}

@endsection
@section('after_script')

@endsection
