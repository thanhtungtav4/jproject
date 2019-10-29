@if (isset($data) && count($data) > 0)
    @foreach($data as $item)
        @if (isset($perRow) && $perRow == 4)
            <div class="col-lg-3 text-center">
                <article class="art-4">
                    <span>
                        <i class="{{$item['page_icon']}}"></i>
                    </span>
                    <h5 class="title-5">{{$item[getValueByLang('page_title_')]}}</h5>
                    <a href="{{ route(getValueByLang('frontend.product.detail_'), ['product' => $item[getValueByLang('page_alias_')]]) }}" class="btn btn-primary">
                        @lang('Tìm hiểu thêm')
                    </a>
                </article>
            </div>
        @else
            <div class="col-lg-4 text-center">
                <article class="art-4">
                    <span>
                        <i class="{{$item['page_icon']}}"></i>
                    </span>
                    <h5 class="title-5">{{$item[getValueByLang('page_title_')]}}</h5>
                    <a href="{{ route(getValueByLang('frontend.product.detail_'), ['product' => $item[getValueByLang('page_alias_')]]) }}" class="btn btn-primary">
                        @lang('Tìm hiểu thêm')
                    </a>
                </article>
            </div>
        @endif
    @endforeach
@endif
