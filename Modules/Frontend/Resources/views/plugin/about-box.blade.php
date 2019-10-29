{{--{{dd($data[0])}}--}}
<section class="about py-5">
    <div class="container bottom_about py-md-31">
        <div class="row ">
            <div class="col-lg-4 col-md-8 dental">
                <img src="{{asset($data[0]['plugin_image'])}}" class="img-fluid" alt="" />
            </div>
            <div class="col-lg-8">
                <div class="box_service">
                    <p class="text_service">{!! $data[0][getValueByLang('plugin_title_')] !!}</p>
                    <p class="text_service_bold">{!! $data[0][getValueByLang('plugin_content_')] !!}</p>
                    <div class="border_bottom_home"></div>
                    <p class="text_extra">{!! $data[0][getValueByLang('plugin_content_other_')] !!}</p>
                </div>
            </div>

        </div>
    </div>
</section>
<section class="list-group-product container">
    <div class="row">
        <div class="col-lg-4">
            <div class="abt-grid">
                <div class="row">
                    <div class="col-3">
                        <div class="abt-icon">
                            <img src="{{asset($data[0]['icon_image'])}}">
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="abt-txt">
                            {!! $data[0][getValueByLang('plugin_text_icon_')] !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 my-lg-0 my-4">
            <div class="abt-grid">
                <div class="row">
                    <div class="col-3">
                        <div class="abt-icon">
                            <img src="{{asset($data[0]['icon2_image'])}}">
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="abt-txt">
                            {!! $data[0][getValueByLang('plugin_text_icon2_')] !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="abt-grid">
                <div class="row">
                    <div class="col-3">
                        <div class="abt-icon">
                            <img src="{{asset($data[0]['icon3_image'])}}">
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="abt-txt">
                            {!! $data[0][getValueByLang('plugin_text_icon3_')] !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>