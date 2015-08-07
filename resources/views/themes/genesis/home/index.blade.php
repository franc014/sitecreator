@extends('themes.genesis.layout.app')
@section('page_title_window')
    Biografía
@endsection


@section('content')
    <?php
    $profile = $data["profile"];
    $homeItem = $data["home_item"];
    $isDedicated = Config::get("app_parametters.isDedicated");
    ?>

    <div class="container-fluid site-container">
        <div id="bg">
            <img class="img-responsive" src="/css/themes/genesis/img/page_images/bg_main.jpg" alt="">
        </div>
        <div class="row">
            <div class="col-sm-2 col-md-2">
            </div>
            <div class="col-sm-8 col-md-8">
                <div class="home-jumbotron" >
                    <p >
                        Presencia en Internet, Aplicaciones Web, y otros Servicios Tecnológicos que le otorgarán valor a
                        su Empresa, Organización o Negocio. Es un gusto plasmar sus ideas en productos de calidad.
                    </p>
                    <div class="row">
                        @if($isDedicated)
                            <a data-icon="&#xe6ae" href="/productos_servicios" class="btn btn-default btn-lg btn-warning
                            col-xs-offset-1 col-md-offset-1 col-sm-4 col-md-4">Servicios</a>
                            <a data-icon="&#xe645" href="/contacto" class="btn btn-default btn-lg btn-success
                            col-xs-offset-1 col-md-offset-1 col-sm-4 col-md-4">Contactar</a>
                        @else
                            <a data-icon="&#xe6ae" href="/{{$profile->user->username}}/productos_servicios" class="btn btn-default btn-lg btn-warning col-sm-offset-1 col-sm-4 col-md-4">Servicios</a>
                            <a data-icon="&#xe645" href="/contacto" class="btn btn-default btn-lg btn-success col-sm-offset-1 col-sm-4 col-md-4">Contactar</a>
                        @endif
                    </div>
                </div>

            </div>
            <div class="col-sm-2 col-md-2">
            </div>
        </div>
    </div>

@endsection