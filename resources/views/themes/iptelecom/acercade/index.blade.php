@extends('themes.iptelecom.layout.contentmaster')

@section('page_title_window')
    Acerca de Ip Telecom
@endsection
@section('page_info_title')
    Acerca de Ip Telecom
@stop
@section('page_content')
    <?php
    $profile = $data["profile"];
    //$version = $data["version"];
    $bio = $biography;
    //dd($bio);
    //$isContactPage = false;
    ?>



    {{--<div class="container site-container">

        <div class="row about-content" >
            @if($bio->detail!="")
            <div class="col-sm-7 about-text" >
                @if($profile->firstname!="" && $profile->lastname!="")
                    <h1 >{{$profile->firstname." ".$profile->lastname}}</h1>
                @else
                    <h1>{{$profile->user->username}}</h1>
                @endif
                <p >
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
    </div>--}}
    <!-- Content Block
     ================================================== -->
    <section class="content-block page-bg">


        <div class="overlay tint">


            <div class="container">
                @if($bio!==null)

                    <div class="row">


                        <div class="col-sm-8 col-md-8 col-sm-offset-2 col-md-offset-2 ">

                            <h1 class="no-margin-t center-block">Nuestra Empresa</h1>
                            <hr class="separator">
                            <div class="bio">{!!$bio->detail!!}</div>
                            <div class="btn-group" role="group" >
                                <div class="btn-group" role="group">
                                    <a href="/productos-y-servicios" class="btn btn-md btn-primary "><i class="fa fa-folder-open-o">
                                            Conoce nuestros servicios</i></a>
                                </div>

                                <div class="btn-group" role="group">
                                    <a href="/contacto" class="btn btn-md btn-secondary "><i class="fa fa-envelope-o">
                                            Contáctanos</i></a>
                                </div>
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
        <!-- /Container -->

        <!-- /Overlay -->

    </section>
    <!-- /Content Block
    ================================================== -->

@overwrite