@extends('themes.genesis.layout.app')
<?php
    $saleable = $data["saleable"];
?>
@section('page_title')
    <h1 data-icon="&#xe6ae">Servicio: {{$saleable->title}}</h1>
@endsection
@section('content_intro')
    <p >
         {!!str_limit($saleable->description,100,"...")!!}
    </p>
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
            <div class="col-sm-3 col-md-3 ">
                <h1><a href="#characteristics" data-icon="&#xe741" class="pull-right section-jumper"></a>
                @include('themes.genesis.productos_servicios._detail.partials._section_nav')</h1>
            </div>
        </div>
    </div>


@endsection