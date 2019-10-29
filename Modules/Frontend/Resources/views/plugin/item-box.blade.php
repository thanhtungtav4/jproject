@php
    $perRow = $perRow ?? 3;
@endphp
@if ($perRow == 3)
    <div class="row text-center slider-icon">
        @foreach($data as $item)
            <div class="col-md-4 text-center">
                <article class="art-3">
                    <span>
                        <i class="{{ $item['plugin_image'] }}"></i>
                    </span>
                    <h5 class="title-5">{{$item[getValueByLang('plugin_title_')]}}</h5>
                    <p class="text-muted">{!! $item[getValueByLang('plugin_content_')] !!}</p>
                </article>
            </div>
        @endforeach
    </div>
    <span class="pagingInfo"></span>
@else
    @foreach($data as $item)
        <div class="col-lg-3 text-center">
            <article class="art-4">
                <span>
                    <i class="{{ $item['plugin_image'] }}"></i>
                </span>
                <h5 class="title-5">{{$item[getValueByLang('plugin_title_')]}}</h5>
                <button class="btn btn-primary" onclick="Shared.redirectTo('{{ route(getValueByLang('frontend.about_')) }}')">
                    Tìm hiểu thêm
                </button>
            </article>
        </div>
    @endforeach
@endif
