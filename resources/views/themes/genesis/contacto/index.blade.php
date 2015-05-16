@extends('themes.genesis.layout.app')
@section('page_title_window')
    Contacto
@endsection
@section('page_title')
    <h1 data-icon="&#xe607" >Contacto</h1>
@endsection
@section('content_intro')
    <p>
        Envíanos tus sugerencias, comentarios o requerimientos...
    </p>
@endsection
@section('content')
    <?php
    $isContactPage = true;

    ?>
    <div class="container site-container" >
        <div class="row " >

            <div class="col-sm-12 col-md-12 ">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="form-content">
                            @include("themes.genesis.partials.contact_info._contact_form")
                        </div>
                    </div>
                    <br>
                    <div class="col-sm-3">
                        <div class="contact-widget" data-anijs="if: load,on: window, do: rubberBand animated">
                            @include("themes.genesis.partials.contact_info._contact_widget")
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    
@endsection