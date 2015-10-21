<?php
$prices = $data["prices"];
?>

<section class="content-block default-bg saleable-prices-container content-display-detail" id="prices">
    <div class="container  prices-content">

        <div class="row">
            <div class="col-sm-12">
                <h1  data-icon="&#xe63b" style="color: #FFFFFF">Precios
                    @include('themes.iptelecom.productos_servicios._detail.partials._top_jumper')
                    @include('themes.iptelecom.productos_servicios._detail.partials._section_nav')
                </h1>
            </div>

        </div>
            @if(empty($prices))
            @foreach(array_chunk($prices->all(), 3) as $row)
                <div class="row " >
                    @foreach( $row as $price)
                        <div class="col-sm-4 ">
                            <div class="panel panel-default price-box " >
                                <div class="panel-body">
                                    <!--img src="http://lorempixel.com/50/50/" class="center-block"-->
                                    <h3>USD {{$price->ammount}}</h3>
                                    @if($price->discount!=0)
                                    <h4>{{$price->discount}}</h4>
                                    @endif
                                    <p >
                                        {!!str_limit($price->description,100,"")!!}
                                    </p>

                                </div>
                                <div class="panel-footer" >
                                    <a href="/contacto" class="btn btn-success btn-md" href="#">Solicitar</a>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        @else
            <div class="row " >

                    <div class="col-sm-4 col-sm-offset-4">
                        <div class="panel panel-default price-box " >
                            <div class="panel-body">

                                <p >
                                   Para ofrecerle una descripción detallada del precio de este servicio o
                                   producto, por favor, déjeme sus datos y pronto me comunicaré.
                                </p>

                            </div>
                            <div class="panel-footer" >
                                <a href="/contacto" class="btn btn-primary btn-md center-block fa fa-envelope-o" href="#"> Contactar</a>

                            </div>
                        </div>
                    </div>

            </div>
        @endif
    </div>


</section>