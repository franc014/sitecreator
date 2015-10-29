<?php
$projects = $data["portfolio"];
$username = $data["username"];
$isContactPage = false;
$isDedicated = Config::get("app_parametters.isDedicated");
$metaInfo = $data["page_meta_info"];
?>
@extends('themes.genesis.layout.app')
@include('themes.genesis.partials._header_meta_tags')
@section('page_title')
    <h1 data-icon="&#xe6ae">Portafolio</h1>
@endsection
@section('content_intro')
    <p>
        Portafolio de Proyectos
    </p>
@endsection
@section('content')

    <div class="container site-container2 " style="margin-top: 220px">
        <h1>Algunos de mis proyectos de Desarrollo de Aplicaciones Web y Móviles.

        </h1>
        @include('themes.genesis.portfolio._detail.partials._cat_tabs')

        <div class="row">
            <div class="col-sm-12 col-md-12 service-content" style="margin-top: 0">
                @if(!$projects->isEmpty())
                    <div id="content-filtered">
                        @include('themes.genesis.portfolio.partials._projects_list')
                    </div>
                @else
                    @include("themes.genesis.partials.alerts.no_items")
                @endif
            </div>
            {{--<div class="col-sm-3 col-md-3" >
                <div class="contact-widget row-gap-when-top"  >
                    @include("themes.genesis.partials.contact_info._contact_widget")
                </div>
            </div>--}}

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