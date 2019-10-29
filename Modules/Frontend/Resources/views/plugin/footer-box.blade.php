@foreach($data as $item)
    <div class="row">
        <div class="col-lg-6 d-flex">
            <article class="art art-2">
                <h4 class="title-4">{{$item[getValueByLang('plugin_title_')]}}</h4>
                <hr>
                <div class="text-muted">{!! $item[getValueByLang('plugin_content_')] !!}</div>
                <a class="btn btn-primary" href="{{ $item[getValueByLang('plugin_btn_link_')] != null
                    ? $item[getValueByLang('plugin_btn_link_')]
                    : route(getValueByLang('frontend.about.contact_')) }}">
                    {{ $item[getValueByLang('plugin_btn_name_')] }}
                </a>
            </article>
        </div>
        <div class="col-lg-6">
            <img src="{{asset($item['plugin_image'])}}" alt="{{$item[getValueByLang('plugin_title_')]}}">
        </div>
    </div>
@endforeach
