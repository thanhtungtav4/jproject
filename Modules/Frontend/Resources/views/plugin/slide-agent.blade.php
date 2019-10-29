@if (isset($data) && count($data) > 0)
    <div class="slider-agency">
        @foreach ($data as $item)
            <div>
                <a href="#" title="">
                    <img src="{{ asset($item['image_logo']) }}" alt="{{ $item[getValueByLang('name_')] }}">
                </a>
            </div>
        @endforeach
    </div>
@endif
