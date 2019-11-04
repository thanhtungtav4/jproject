@foreach($data as $item)
    <div class="col-lg-3 col-md-6 col-sm-6 col-12 col-xs-6 item_solution_box">
    <a  target="_blank" >

        <div class="box_solution-home">
            <div class="content-show">
                <div class="item_img_solution_box">
                    <img class="img-fluid" src="{{asset($item['plugin_image'])}}">
                </div>
                <div class="icon_box">
                    @if (!empty($item['icon_image']))
                        <div class="item_icon">
                            <img src="{{asset($item['icon_image'])}}">
                        </div>
                    @endif
                    @if (!empty($item['icon2_image']))
                    <div class="item_icon">
                        <img src="{{asset($item['icon2_image'])}}">
                    </div>
                     @endif
                     @if (!empty($item['icon3_image']))
                    <div class="item_icon">
                        <img src="{{asset($item['icon3_image'])}}">
                    </div>
                     @endif
                </div>
                <div class="title_img_home">{!! $item[getValueByLang('plugin_title_')] !!}</div>
            </div>
            <div class="hidden-box-solution ">
                <p class="title-hidden">{{$item[getValueByLang('plugin_title_')]}}</p>
                @if (!empty(getValueByLang('plugin_content_other_')))
                {!! $item[getValueByLang('plugin_content_other_')] !!}
                @endif
            </div>
        </div>

    </a>
    </div>
@endforeach
