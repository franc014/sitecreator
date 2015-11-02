<?php
$isContactPage = true;
$metaInfo = $data["page_meta_info"];
?>
@extends('themes.iptelecom.layout.contentmaster')
@include('themes.genesis.partials._header_meta_tags')

@section('page_info_title')
    Contáctanos!
@stop
@section('page_content')

    <section class="content-block default-bg content-display-detail" id="characteristics">
        <div class="container service-main-details">
            {{--<div class="container-fluid service-main-details"  id="characteristics">--}}
            <div class="row">
                <div class="section-title">
                    <h1>CONTÁCTANOS!</h1>

                    <h4>Si deseas conocer más de IP Telecom y sus servicios, será un gusto comunicarnos contigo.</h4>
                </div>
                @include('themes.iptelecom.partials.contact_info._contact_form')
            </div>
        </div>
    </section>

@endsection