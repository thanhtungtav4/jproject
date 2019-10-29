@if (isset($data))
    @foreach($data as $index => $item)
        @if ($index % 2 == 0)
            <section class="vm-ware">
                <div class="container">
                    <div class="row box">
                        <div class="col-md-6 order-last pt-5 pb-5 bg-box-img-r">
                            <div class="box-style shadow bg-white rounded">
                                <img src="{{ asset($item['plugin_image']) }}" alt="">
                            </div>
                        </div>
                        <div class="col-md-6 order-first p-5 bg-box-txt">
                            <article class="art art-2 m-4">
                                <h4 class="title-4">{{ $item[getValueByLang('plugin_title_')] }}</h4>
                                <hr>
                                <div class="text-muted">
                                    {!! $item[getValueByLang('plugin_content_')] !!}
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </section>
        @else
            <section class="vm-ware">
                <div class="container">
                    <div class="row box">
                        <div class="col-md-6 pt-5 pb-5 bg-box-img-l">
                            <div class="over-left">
                                <div class="box-style shadow bg-white rounded">
                                    <img src="{{ asset($item['plugin_image']) }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6  p-5 bg-box-txt">
                            <article class="art art-2 m-4">
                                <h4 class="title-4">{{ $item[getValueByLang('plugin_title_')] }}</h4>
                                <hr>
                                <div class="text-muted">
                                    {!! $item[getValueByLang('plugin_content_')] !!}
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endforeach
@endif
