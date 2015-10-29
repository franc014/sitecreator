<?php
$profile = $data["profile"];
$metaInfo = $data["page_meta_info"];
$bio = $biography;
?>
@extends('themes.genesis.layout.app')
@include('themes.genesis.partials._header_meta_tags')
@section('page_title')
    <h1 data-icon="&#xe671">Biografía</h1>
@endsection
@section('content_intro')
    <p>
        Presentando a...
    </p>
@endsection
@section('content')


    <div class="container site-container">

        <div class="row about-content">
            @if($bio->detail!="")
                <div class="col-sm-7 about-text">
                    @if($profile->firstname!="" && $profile->lastname!="")
                        <h1>{{$profile->firstname." ".$profile->lastname}}</h1>
                    @else
                        <h1>{{$profile->user->username}}</h1>
                    @endif
                    <p>
                        {!!$bio->detail!!}
                    </p>
                </div>

                <div class="col-sm-5 col-md-5 about-image">
                    @if($profile->biophoto <> "")
                        <div class="row">
                            <div class="col-sm-12 ">
                                <img width="320" height="320" src="{{$profile->biophoto}}" class="img-responsive ">
                            </div>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-sm-12 ">
                            <div class="contact-widget row-gap-about-widgets">
                                @include("themes.genesis.partials.contact_info._contact_widget")
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <a href="/{{$profile->user->username}}/contacto" data-icon="&#xe645"
                               class="contact-collaout row-gap-about-widgets">Contactar</a>
                        </div>

                    </div>

                </div>
            @else
                <div class="row " style=" margin-top: 100px">
                    <div class="col-sm-7 ">
                        <!--div class="alert alert-warning" style="margin: 0 0 0 130px; height: 100px" >
                            <p style="line-height: 2; font-size: 18px">No se han encontrado datos que desplegar.
                            Por favor, Si eres Administrador del Sitio, actualízalo pronto....</p>

                        </div-->
                        @include("themes.genesis.partials.alerts.no_items")
                    </div>
                </div>
            @endif
        </div>
    </div>

@overwrite