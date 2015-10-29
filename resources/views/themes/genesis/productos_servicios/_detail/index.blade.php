@extends('themes.genesis.layout.app')
<?php
    $saleable = $data["saleable"];
?>
@section('page_title_window'){{$saleable->title}}@endsection
@section('page_description'){{str_limit(strip_tags($saleable->description),160,"")}}@endsection
@section('page_title')
    <h1 data-icon="&#xe6ae">Servicios: {{--$saleable->title--}}</h1>
@endsection
@section('content_intro')
    <p>
        Presentamos los siguientes servicios profesionales.
    </p>
    <!--p >
         {!!str_limit($saleable->description,20,"...")!!}
    </p-->
@endsection

@section('content')

    @include('themes.genesis.productos_servicios._detail.characteristics')
    @include('themes.genesis.productos_servicios._detail.ventages')
    @include('themes.genesis.productos_servicios._detail.prices')
    @include('themes.genesis.productos_servicios._detail.services')
    <div class="container-fluid form-container-option-one" id="contact-form">
        <div class="row">
            <div class="col-sm-9 col-md-9 form-content-section">
                @include("themes.genesis.partials.contact_info._contact_form")
            </div>

        </div>
    </div>


@endsection