@extends('frontend::layouts.master')
@section('title', $page[getValueByLang('page_title_')])
@section('content')
    <div class="m-blog">
        <div class="m-header">
            <div class="m-title">
                <h3>{{ $page[getValueByLang('page_title_')] }}</h3>
            </div>
        </div>
    </div>
    @if (isset($data['content-box']) && count($data['content-box']) > 0)
        @include('frontend::plugin.content-box', ['data' => $data['content-box'], 'displayButton' => false])
    @endif
    <section class="vm-ware">
        <div class="container">
            @if (isset($data['item-box']) && count($data['item-box']) > 0)
                @include('frontend::plugin.item-box',['data' => $data['item-box']])
            @endif
        </div>
    </section>
    @if (isset($product) && count($product) > 0)
        <section class="page-section box-shadow">
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-lg-7 text-center">
                        <h4 class="title-4">{{$page[getValueByLang('page_sub_title_1_')]}}</h4>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    @include('frontend::plugin.product',[
                        'data' => $product,
                        'perRow' => 4
                    ])
                </div>
            </div>
        </section>
    @endif
    <section class="vm-ware-botton">
        <div class="container">
            @if (isset($data['footer-box']) && count($data['footer-box']) > 0)
                @include('frontend::plugin.footer-box', ['data' => $data['footer-box']])
            @endif
        </div>
    </section>
@endsection
