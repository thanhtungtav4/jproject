<div class="banner_sub" id="home">
    <div class="txt_h1">
        <h1>{{$data}}</h1>
        <div class="border_bottom_home"></div>
    </div>
    <!--</section>-->
    <section class="breadcrumb_box container">
        <div class="bg_top_main">
            @if ((\Route::current()->getName() != 'frontend.about.contact_en') and (\Route::current()->getName() != 'frontend.about.contact_vi'))
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{asset('/')}}{{Config::get('app.locale')}}">@lang('frontend::index.home')</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$data}}</li>
                </ol>
            </nav>
            @endif

        </div>
    </section>
</div>
