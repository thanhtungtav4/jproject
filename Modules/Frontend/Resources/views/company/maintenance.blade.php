@extends('frontend::layouts.master')
@section('title', $arrPage[0][getValueByLang('page_title_')])
@section('content')
    @include('frontend::inc.banner', ['data' => $arrPage[0][getValueByLang('page_title_')]])
    <section class="main_content">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <strong class="profile_title">{{ $arrPage[0][getValueByLang('page_title_')] }}</strong>
                    <ul class="nav">
                        @foreach($arrPage as $page)
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#{{ $page['page_alias_en'] }}">{{ $page[getValueByLang('page_title_')] }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        @foreach($arrPage as $page)
                            <div id="{{ $page[getValueByLang('page_alias_')] }}" class="container tab-pane active">
                                <div class="row">
                                    {!! $page[getValueByLang('page_content_1_')] !!}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('after_script')

@endsection


