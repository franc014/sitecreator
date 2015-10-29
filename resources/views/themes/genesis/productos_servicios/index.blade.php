<?php
$saleables = $data["saleables"];
$metaInfo = $data["page_meta_info"];
$username = $data["username"];
$isContactPage = false;
$isDedicated = Config::get("app_parametters.isDedicated");

?>
@extends('themes.genesis.layout.app')
@include('themes.genesis.partials._header_meta_tags')
@section('page_title')
    <h1 data-icon="&#xe6ae">Productos y Servicios</h1>
@endsection
@section('content_intro')
<p>
    Es un gusto poder apoyarle en sus proyectos profesionales.
    Es por eso que ponemos a tu disposición la siguiente gama de servicios.
</p>
@endsection
@section('content')

    <div class="container site-container2" >

        @include('themes.genesis.productos_servicios._detail.partials._cat_tabs')

        <div class="row">
            <div class="col-sm-9 col-md-9 service-content">
                @if(!$saleables->isEmpty())
                    <div id="content-filtered">
                        @include('themes.genesis.productos_servicios.partials._services_list')
                    </div>
                @else
                    @include("themes.genesis.partials.alerts.no_items")
                @endif
            </div>
            <div class="col-sm-3 col-md-3" >
                <div class="contact-widget row-gap-when-top"  >
                    @include("themes.genesis.partials.contact_info._contact_widget")
                </div>
            </div>

        </div>

    </div>
    <div class="container-fluid form-container-option-one" id="contact-form">
        <div class="row">
            <div class="col-sm-9 col-md-9 form-content-section">
                @include("themes.genesis.partials.contact_info._contact_form")
            </div>
        </div>
    </div>
@endsection