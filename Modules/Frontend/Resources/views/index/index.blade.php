@extends('frontend::layouts.master') @section('title', $page[getValueByLang('page_title_')]) @section('content')
    <!-- Header -->
    @if(!empty($data['solution-list']))
        <div class="banner" id="home">
            <div class="text_home">
                <p class="text_banner">{{ $dataShareConfig['wellcome_line_1'][getValueByLang('')] }}</p>
                <div class="box_text_banner">
                    <div>
                        <span class="text_banner_animation">{{$dataShareConfig['wellcome_line_2'][getValueByLang('')] }}</span></div>
                </div>
                <div class="border_bottom_home_home"></div>
                <section class="home_box">
                    <section class="main_content">
                        <div class="container business_box">
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
            <p class="clients_text">{{$dataShareConfig['clients_tititle'][getValueByLang('')]}}</p>
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
                                <label for="fullname">{{ __('Họ và tên') }}</label>
                                <input type="text" class="form-control" id="fullname" placeholder="" name="fullname" value="{{ old('fullname') }}"> @if ($errors->has('fullname'))
                                    <label class="text-danger">{{ $errors->first('fullname') }}</label>
                                @endif
                                <label for="email">@lang('frontend::index.Email')</label>
                                <input type="text" type="email" class="form-control" id="email" placeholder="" name="email" value="{{ old('email') }}" oninvalid="this.setCustomValidity('Please Enter valid email')"> @if ($errors->has('email'))
                                    <label class="text-danger">{{ $errors->first('email') }}</label>
                                @endif
                                <label for="subject">@lang('frontend::index.Subject')</label>
                                <input type="text" class="form-control" id="subject" placeholder="" name="subject"> @if ($errors->has('subject'))
                                    <label class="text-danger">{{ $errors->first('subject') }}</label>
                                @endif
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="note">@lang('frontend::index.Note')</label>
                                    <textarea class="form-control" id="note" name="note" rows="4"></textarea>
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
