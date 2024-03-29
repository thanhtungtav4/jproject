@extends('frontend::layouts.master') @section('title', $page[getValueByLang('page_title_')]) @section('content')
    <!-- slider -->
    <!-- slider -->
    <!-- Header -->
    <div id="carouselExampleIndicators" class="carousel slide carousel-home" data-ride="carousel">
        <ol class="carousel-indicators" style="bottom: 0px;">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100 img-slider" src="/images/slider.png" alt="First slide">
                <img class="image-text" src="/images/text.png" alt="First slide">
                <img class="image-title" src="/images/title.png" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100 img-slider" src="/images/slider.png" alt="Second slide">
                <img class="image-text" src="/images/text.png" alt="First slide">
                <img class="image-title" src="/images/title.png" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100 img-slider" src="/images/slider.png" alt="Third slide">
                <img class="image-text" src="/images/text.png" alt="First slide">
                <img class="image-title" src="/images/title.png" alt="First slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    @if(!empty($data['solution-list']))
        <div class="banner" id="home">
            <div class="text_home">
                <p class="text_banner">{{ $dataShareConfig['wellcome_line_1'][getValueByLang('')] }} {{$dataShareConfig['wellcome_line_2'][getValueByLang('')] }}</p>
                {{--<div class="box_text_banner">--}}
                    {{--<div>--}}
                        {{--<span class="text_banner_animation">{{$dataShareConfig['wellcome_line_2'][getValueByLang('')] }}</span></div>--}}
                {{--</div>--}}
                <div class="border_bottom_home_home"></div>
                <section class="home_box">
                    <section class="main_content">
                        <div class="container business_box custom-container-box">
                            <div class="row">
                                @include('frontend::plugin.silder-box', ['data' => $data['solution-list']])
                            </div>
                        </div>
                    </section>
                </section>
            </div>
        </div>
    @endif
    <!-- about -->
    {{--{{dd($data['about-home-list'])}}--}}
    @if(!empty($data['about-home-list'])) @include('frontend::plugin.about-box', ['data' => $data['about-home-list']]) @endif
    <!-- //about plugin_title_-->
    <!-- services -->
    <section class="services clients-bg">
        <div class="container py-lg-5">
            {{--<p class="clients_text">{{$dataShareConfig['clients_tititle'][getValueByLang('')]}}</p>--}}
            <p class="clients_text">{{__('Nhận xét của')}} <strong>{{__('Khách Hàng')}}</strong></p>
            <div class="border_bottom_home padding_bottom_red"></div>
            @if(!empty($data['client-home-list'])) @include('frontend::plugin.clients-box', ['data' => $data['client-home-list']]) @endif
        </div>
    </section>
    <!-- contact-->
    <section class="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <p class="from_contact">@lang('frontend::index.Inquiries')</p>
                    <div class="border_bottom_home"></div>
                </div>
                <div class="col-md-10">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif @if (session('failed'))
                        <div class="alert alert-danger" role="alert">
                            <strong>{{ session('failed') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <form class="frm" action="" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="fullname">@lang('frontend::index.namecontact')</label>
                                <input type="text" class="form-control" id="fullname" placeholder="" name="fullname" value="{{ old('fullname') }}"> @if ($errors->has('fullname'))
                                    <label class="text-danger">{{ $errors->first('fullname') }}</label><br>
                                @endif
                                <label for="email">@lang('frontend::index.Email')</label>
                                <input type="text" type="email" class="form-control" id="email" placeholder="" name="email" value="{{ old('email') }}" oninvalid="this.setCustomValidity('Please Enter valid email')"> @if ($errors->has('email'))
                                    <label class="text-danger">{{ $errors->first('email') }}</label><br>
                                @endif
                                <label for="subject">@lang('frontend::index.Subject')</label>
                                <input type="text" class="form-control" id="subject" placeholder="" value="{{ old('subject') }}" name="subject"> @if ($errors->has('subject'))
                                    <label class="text-danger">{{ __('Vui lòng nhập tiêu đề')}}</label>
                                @endif
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="note">@lang('frontend::index.Note')</label>
                                    <textarea class="form-control" id="note" name="note" rows="4">{{ old('note') }}</textarea>
                                    <div class="form-group btn_contact_box">
                                        <button class="btn btn_contact" type="submit">@lang('frontend::index.Send')</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- !contact-->
    <!-- map -->
    <section class="map_box">
        <div class="container">
            <div class="row">
                {!! $dataShareConfig['map_value_iframe'][getValueByLang('')] !!}
            </div>
        </div>
    </section>
    <!-- !map-->
@endsection

@section('after_script')
    <script type="text/javascript">
        if (window.innerWidth < 450){
            $('.img-slider').attr('src','/images/slider_mobile.png');
        }
    </script>
@endsection
