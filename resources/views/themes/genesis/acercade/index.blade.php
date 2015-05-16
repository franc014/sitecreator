@extends('themes.genesis.layout.app')
@section('page_title_window')
    Biografía
@endsection
@section('page_title')
    <h1 data-icon="&#xe671">Biografía</h1>
@endsection
@section('content_intro')
    <p>
        Presentando a...
    </p>
@endsection
@section('content')
    <?php
    $profile = $data["profile"];
    $isContactPage = false;
    ?>
    <div class="container-fluid site-container">
        <div class="row about-content" >
            @if($profile->biography!="")
            <div class="col-sm-7 about-text" >
                @if($profile->firstname!="" && $profile->lastname!="")
                    <h1 >{{$profile->firstname." ".$profile->lastname}}</h1>
                @else
                    <h1>{{$profile->user->username}}</h1>
                @endif
                <p >
                   {{$profile->biography}}
                </p>
            </div>

            <div class="col-sm-5 col-md-5 about-image">
                <div class="row">
                    <div class="col-sm-12 ">
                        <img width="320" height="320" src="{{$profile->biophoto}}" class="img-responsive ">
                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-12 ">
                        <div class="contact-widget row-gap-about-widgets"  >
                            @include("themes.genesis.partials.contact_info._contact_widget")
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <a  href="/{{$profile->user->username}}/contacto" data-icon="&#xe645" class="contact-collaout row-gap-about-widgets" >Contactar</a>
                    </div>

                </div>

            </div>
            @else
                <div class="row " style=" margin-top: 100px" >
                        <div class="col-sm-7 " >
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

@endsection