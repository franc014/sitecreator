@extends('themes.genesis.layout.app')
@section('page_title_window')
    Productos y Servicios

@endsection
@section('page_title')
    <h1 data-icon="&#xe6ae">Productos y Servicios</h1>
@endsection
@section('content_intro')
<p>
    Es un gusto poder apoyarte en tus proyectos profesionales.
    Es por eso que ponemos a tu disposición la siguiente gama de servicios tecnológicos.
</p>
@endsection
@section('content')
    <?php
        $saleables = $data["saleables"];
        //dd($saleables->all());
        $username = $data["username"];
        $isContactPage = false;
        empty($saleables);
    ?>
    <div class="container site-container2" >
        <div class="row">
            <div class="col-sm-9 col-md-9 service-content">
                @if(empty($saleables))
                @foreach(array_chunk($saleables->all(), 3) as $row)
                    <div class="row " >
                        @foreach( $row as $saleable)
                                <div class="col-sm-4 ">
                                    <div class="panel panel-default service-box " >
                                        <div class="panel-body">
                                            <!--img src="http://lorempixel.com/50/50/" class="center-block"-->
                                            <h3>{{$saleable->title}}</h3>
                                            <p >
                                                {!!str_limit($saleable->description,100,"...")!!}<a href="/{{$username}}/productos_servicios/{{$saleable->title}}/{{$saleable->id}}">Leer más</a>
                                            </p>

                                        </div>
                                        <div class="panel-footer" >
                                            <a href="#contact-form" class="btn btn-success btn-md" href="#">Solicitar</a>
                                            <a href="/{{$username}}/productos_servicios/{{$saleable->title}}/{{$saleable->id}}" class="pull-right know-more">Conocer en detalle</a>
                                        </div>
                                    </div>
                                </div>
                        @endforeach
                    </div>
                @endforeach
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