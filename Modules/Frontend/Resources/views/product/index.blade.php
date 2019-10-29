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
        @include('frontend::plugin.content-box-left-right', ['data' => $data['content-box'], 'displayButton' => false])
    @endif
    @if (isset($listPrice) && count($listPrice) > 0)
    <section class="vm-ware">
        <div class="container">
            <div class="text-center  m-5">
                <h3 class="title-4">{{ $page[getValueByLang('page_sub_title_1_')] }}</h3>
                <hr>
            </div>
            <div class="row slider-price">
                @include('frontend::plugin.product-price.item-box', ['data' => $listPrice])
            </div>
            <span class="pagingInfo_1"></span>
        </div>
    </section>
{{--    @include('frontend::plugin.configurator')--}}
    @endif
    <section class="vm-ware">
        <div class="container">
            @if (isset($data['item-box']) && count($data['item-box']) > 0)
                @include('frontend::plugin.item-box',['data' => $data['item-box']])
            @endif
        </div>
    </section>
    <section class="vm-ware-botton">
        <div class="container">
            @if (isset($data['footer-box']) && count($data['footer-box']) > 0)
                @include('frontend::plugin.footer-box', ['data' => $data['footer-box']])
            @endif
        </div>
    </section>
@endsection
@section('after_script')
    <script>
        $(function() {
            var ram = $( "#ram-handle" );
            $( "#ram" ).slider({
                create: function() {
                    ram.text( $( this ).slider( "value" ) );
                },
                slide: function( event, ui ) {
                    ram.text( ui.value );
                }
            });

            var cpu = $( "#cpu-handle" );
            $( "#cpu" ).slider({
                create: function() {
                    cpu.text( $( this ).slider( "value" ) );
                },
                slide: function( event, ui ) {
                    cpu.text( ui.value );
                }
            });

            var storage = $( "#storage-handle" );
            $( "#storage" ).slider({
                create: function() {
                    storage.text( $( this ).slider( "value" ) );
                },
                slide: function( event, ui ) {
                    storage.text( ui.value );
                }
            });

            var sstorage = $( "#std-storage-handle" );
            $( "#std-storage" ).slider({
                create: function() {
                    sstorage.text( $( this ).slider( "value" ) );
                },
                slide: function( event, ui ) {
                    sstorage.text( ui.value );
                }
            });

            var licenses = $( "#licenses-handle" );
            $( "#licenses" ).slider({
                create: function() {
                    licenses.text( $( this ).slider( "value" ) );
                },
                slide: function( event, ui ) {
                    licenses.text( ui.value );
                }
            });

            var contract = $( "#contract-handle" );
            $( "#contract" ).slider({
                create: function() {
                    contract.text( $( this ).slider( "value" ) );
                },
                slide: function( event, ui ) {
                    contract.text( ui.value );
                }
            });
        });
    </script>
@endsection
