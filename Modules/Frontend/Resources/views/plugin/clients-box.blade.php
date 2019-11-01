<div class="row offer-grids">
    @foreach($data as $item)
    <div class="col-lg-4 col-md-6 mt-lg-0 mt-4">
        <div class="ser1">
            <div class="bg-layer">
                <p class="mt-3">{!!$item[getValueByLang('plugin_content_')]!!}</p>
                <div class="thumbs_avata">
                    <img src="{{asset($item['plugin_image'])}}">
                    <div class="extra_avata_des">
                        <span>{{$item[getValueByLang('plugin_title_')]}}</span>
                        <span class="author-description">{{$item[getValueByLang('plugin_btn_name_')]}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>