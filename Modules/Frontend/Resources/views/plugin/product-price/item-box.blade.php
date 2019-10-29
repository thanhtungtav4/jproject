@if (isset($data))
    @foreach ($data as $item)
        <div class="col-md-4">
            <div class="package">
                <div class="text-center">
                    <h2 class="title-6">
                        {{ $item[getValueByLang('name_')] }}
                        @if ($item['is_feature'])
                            <span><i class="fas fa-star"></i> @lang('Được chọn nhiều nhất')</span>
                        @endif
                    </h2>
                    <hr>
                </div>
                <div class="text-center price">
                    <span class="unit">VNĐ</span>
                    <span class="money">{{ number_format($item['price'], 0, ',', '.') }}</span>
                    <span class="month">/th</span>
                </div>
                <button class="btn {{ ($item['is_feature']) ? 'btn-primary' : 'btn-secondary' }}"
                    onclick="Shared.redirectTo('{{ route(getValueByLang('frontend.about.contact_')) }}')">
                    @lang('Đăng kí dùng thử')
                </button>
                {!! $item[getValueByLang('description_')] !!}
            </div>
        </div>
    @endforeach
@endif
