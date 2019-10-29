@if (isset($data) && count($data) > 0)
    @foreach($data as $item)
        <li>
            <a href="#" title="">
                <img src="{{asset($item['image_logo'])}}" alt="{{ $item[getValueByLang('name_')] }}" width="200">
            </a>
        </li>
    @endforeach
@endif
