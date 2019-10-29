@php
    $displayButton = $displayButton ?? true;
@endphp
@if (isset($data) && count($data) > 0)
    @foreach($data as $index => $item)
        @if ($index % 2 == 0)
            <section class="vm-ware">
                <div class="container">
                    <div class="row box">
                        <div class="col-lg-6 p-5 bg-box-txt d-flex">
                            <article class="art art-2 m-4">
                                <h4 class="title-4">{{$item[getValueByLang('plugin_title_')]}}</h4>
                                <hr>
                                <div class="text-muted">{!! $item[getValueByLang('plugin_content_')] !!}</div>
                                @if ($displayButton)
                                    <button class="btn btn-primary" onclick="Shared.redirectTo('{{ route(getValueByLang('frontend.about_')) }}')">
                                        @lang('Tìm hiểu thêm')
                                    </button>
                                @endif
                            </article>
                        </div>
                        <div class="col-lg-6 pt-5 pb-5 bg-box-img-r">
                            <div class="box-style shadow bg-white rounded">
                                <img src="{{ asset($item['plugin_image']) }}" alt="{{$item[getValueByLang('plugin_title_')]}}">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @else
            <section class="vm-ware">
                <div class="container">
                    <div class="row box">
                        <div class="col-lg-6 p-5 order-lg-last bg-box-txt d-flex">
                            <article class="art art-2 m-4">
                                <h4 class="title-4">{{$item[getValueByLang('plugin_title_')]}}</h4>
                                <hr>
                                <div class="text-muted">{!! $item[getValueByLang('plugin_content_')] !!}</div>
                                @if ($displayButton)
                                    <button class="btn btn-primary" onclick="Shared.redirectTo('{{ route(getValueByLang('frontend.about_')) }}')">
                                        @lang('Tìm hiểu thêm')
                                    </button>
                                @endif
                            </article>
                        </div>
                        <div class="col-lg-6 order-lg-first pt-5 pb-5 bg-box-img-l">
                            <div class="box-style shadow bg-white rounded">
                                <img src="{{ asset($item['plugin_image']) }}" alt="{{$item[getValueByLang('plugin_title_')]}}">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endforeach
@endif
