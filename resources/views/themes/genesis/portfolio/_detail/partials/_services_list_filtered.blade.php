@foreach(array_chunk($restsaleables->all(), 3) as $row)
    <div class="row " >
        @foreach( $row as $saleable)
            <div class="col-sm-4 ">
                <div class="panel panel-default service-box mix category-1 category-2" >
                    <div class="panel-body">
                        <!--img src="http://lorempixel.com/50/50/" class="center-block"-->
                        <h3>{{$saleable['title']}}</h3>
                        <p >
                            @if(!$isDedicated)
                                {!!str_limit($saleable->description,80,"...")!!}<a href="/{{$saleable->user->username}}/productos_servicios/{{$saleable->title}}/{{$saleable->id}}">Leer más</a>
                            @else
                                {!!str_limit($saleable['description'],80,"...")!!}<a href="/productos_servicios/{{$saleable['title']}}/{{$saleable['id']}}">Leer más</a>
                            @endif
                        </p>

                    </div>
                    <div class="panel-footer" >
                        <a href="#contact-form" class="btn btn-success btn-md" href="#">Solicitar</a>
                        @if(!$isDedicated)
                            <a href="/{{$saleable->user->username}}/productos_servicios/{{$saleable->title}}/{{$saleable->id}}" class="pull-right know-more">
                                Conocer en detalle
                            </a>
                        @else
                            <a href="/productos_servicios/{{$saleable['title']}}/{{$saleable['id']}}" class="pull-right know-more">
                                Conocer en detalle
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endforeach