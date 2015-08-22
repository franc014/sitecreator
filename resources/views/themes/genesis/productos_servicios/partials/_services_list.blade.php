@foreach(array_chunk($saleables->all(), 3) as $row)
    <div class="row " >
        @foreach( $row as $saleable)
            <div class="col-sm-4 ">
                <div class="panel panel-default service-box mix
                @foreach($saleable->categories as $cat)
                    category-{{$cat['id'].' '}}
                @endforeach
                " >
                    <div class="panel-body">
                        <!--img src="http://lorempixel.com/50/50/" class="center-block"-->
                        <h3>{{$saleable->title}}</h3>
                        @if(!$isDedicated)
                        <p >
                            {!!str_limit($saleable->description,100,"...")!!}<a href="/{{$username}}/productos_servicios/{{$saleable->title}}/{{$saleable->id}}">Leer más</a>
                        </p>
                        @else
                            <p >
                                {!!str_limit($saleable->description,100,"...")!!}<a href="/productos_servicios/{{$saleable->title}}/{{$saleable->id}}">Leer más</a>
                            </p>
                        @endif

                    </div>
                    <div class="panel-footer" >
                        <a href="#contact-form" class="btn btn-success btn-md" href="#">Solicitar</a>
                        @if(!$isDedicated)
                            <a href="/{{$username}}/productos_servicios/{{$saleable->title}}/{{$saleable->id}}"
                               class="pull-right know-more">
                                Conocer en detalle
                            </a>
                        @else
                            <a href="/productos_servicios/{{$saleable->title}}/{{$saleable->id}}"
                               class="pull-right know-more">
                                Conocer en detalle
                            </a>
                        @endif

                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endforeach