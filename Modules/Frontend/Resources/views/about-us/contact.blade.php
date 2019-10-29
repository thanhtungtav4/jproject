@extends('frontend::layouts.master')
@section('title', $page[getValueByLang('page_title_')])
@section('content')
    @include('frontend::inc.banner', ['data' => $page[getValueByLang('page_title_')]])
    <section class="main_content">
        <div class="container">
            <section class="main_content contact_box_section">
                <div class="contact_form">
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
                            <div class="form-group col-md-6">
                                <label for="fullname">{{ __('Họ và tên') }}</label>
                                <input type="text" class="form-control" id="fullname" placeholder="" name="fullname" value="{{ old('fullname') }}">
                                @if ($errors->has('fullname'))
                                    <label class="text-danger">{{ $errors->first('fullname') }}</label>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">@lang('frontend::index.Email')</label>
                                <input type="text" type="email" class="form-control" id="email" placeholder="" name="email" value="{{ old('email') }}" oninvalid="this.setCustomValidity('Please Enter valid email')"> @if ($errors->has('email'))
                                    <label class="text-danger">{{ $errors->first('email') }}</label>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="subject">@lang('frontend::index.Subject')</label>
                            <input type="text" class="form-control" id="subject" placeholder="" name="subject"> @if ($errors->has('subject'))
                                <label class="text-danger">{{ $errors->first('subject') }}</label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="note">@lang('frontend::index.Note')</label>
                            <textarea class="form-control" id="note" name="note" rows="4"></textarea>
                        </div>

                        <div class="form-group btn_contact_box">
                            <button class="btn btn_contact" type="submit">@lang('frontend::index.Send')</button>
                        </div>
                    </form>
                </div>
            </section>
            <section class="map_contact container">
                <div class="map_box">
                    {!! $dataShareConfig['map_value_iframe'][getValueByLang('')] !!}
                </div>
                <p class="map_icon_contact"> {{$dataShareConfig['main_company'][getValueByLang('')]}}</p>
            </section>
        </div>
    </section>
@endsection
@section('after_script')

@endsection
