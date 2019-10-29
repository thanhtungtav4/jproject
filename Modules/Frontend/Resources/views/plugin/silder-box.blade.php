@foreach($data as $item)
    <div class="col-lg-3 col-md-6 col-sm-6 col-12 col-xs-6 item_solution_box">
    <a href="{!! $item[getValueByLang('plugin_btn_link_')] !!}" target="_blank" >
        <div class="box_solution">
            <div class="item_img_solution_box">
                <img class="img-fluid" src="{{asset($item['plugin_image'])}}">
            </div>
            <div class="icon_box">
                <div class="item_icon">
                    <img src="{{asset($item['icon_image'])}}">
                </div>
                <div class="item_icon">
                    <img src="{{asset($item['icon2_image'])}}">
                </div>
                <div class="item_icon">
                    <img src="{{asset($item['icon3_image'])}}">
                </div>
            </div>
            <div class="title_img_home">{!! $item[getValueByLang('plugin_title_')] !!}</div>
        </div>
    </a>
    </div>
@endforeach
