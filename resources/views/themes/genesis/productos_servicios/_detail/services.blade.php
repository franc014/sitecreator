<?php
$restsaleables = $data["restsaleables"];
?>
@if(!$restsaleables->isEmpty())
<div class="saleable-services-container" id="services">
    <div class="container services-content" >

        <div class="row">
            <div class="col-sm-12">
                <h1 data-icon="&#xe6ae">Otros Servicios
                    <a href="#characteristics" data-icon="&#xe741" class="pull-right section-jumper"></a>
                    @include('themes.genesis.productos_servicios._detail.partials._section_nav')
                </h1>
            </div>

        </div>

            @foreach(array_chunk($restsaleables->all(), 3) as $row)
                <div class="row " >
                    @foreach( $row as $saleable)
                        <div class="col-sm-4 ">
                            <div class="panel panel-default service-box " >
                                <div class="panel-body">
                                    <!--img src="http://lorempixel.com/50/50/" class="center-block"-->
                                    <h3>{{$saleable->title}}</h3>
                                    <p >
                                        {!!str_limit($saleable->description,80,"...")!!}<a href="/{{$saleable->user->username}}/productos_servicios/{{$saleable->title}}/{{$saleable->id}}">Leer más</a>
                                    </p>

                                </div>
                                <div class="panel-footer" >
                                    <a href="#contact-form" class="btn btn-success btn-md" href="#">Solicitar</a>
                                    <a href="/{{$saleable->user->username}}/productos_servicios/{{$saleable->title}}/{{$saleable->id}}" class="pull-right know-more">Conocer en detalle</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach

    </div>
</div>
@endif
