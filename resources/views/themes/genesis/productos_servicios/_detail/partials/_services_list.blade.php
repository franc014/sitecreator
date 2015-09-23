@foreach(array_chunk($restsaleables->all(), 3) as $row)
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
                        <p >
                            @if(!$isDedicated)
                                @if($saleable->type==0)
                                    {!!str_limit($saleable->description,80,"...")!!}<a href="/{{$saleable->user->username}}/producto/{{$saleable->slug}}">Leer más</a>
                                @else
                                    {!!str_limit($saleable->description,80,"...")!!}<a href="/{{$saleable->user->username}}/servicio/{{$saleable->slug}}">Leer más</a>
                                @endif
                            @else
                                @if($saleable->type==0)
                                    {!!str_limit($saleable->description,80,"...")!!}<a href="/producto/{{$saleable->slug}}">Leer más</a>
                                @else
                                    {!!str_limit($saleable->description,80,"...")!!}<a href="/servicio/{{$saleable->slug}}">Leer más</a>
                                @endif
                            @endif
                        </p>

                    </div>
                    <div class="panel-footer" >
                        <a href="#contact-form" class="btn btn-success btn-md" href="#">Solicitar</a>
                        @if(!$isDedicated)
                            @if($saleable->type==0)
                                <a href="/{{$saleable->user->username}}/producto/{{$saleable->slug}}" class="pull-right know-more">
                                    Conocer en detalle
                                </a>
                            @else
                                <a href="/{{$saleable->user->username}}/servicio/{{$saleable->slug}}" class="pull-right know-more">
                                    Conocer en detalle
                                </a>
                            @endif
                        @else
                            @if($saleable->type==0)
                                <a href="/producto/{{$saleable->slug}}" class="pull-right know-more">
                                    Conocer en detalle
                                </a>
                            @else
                                <a href="/servicio/{{$saleable->slug}}" class="pull-right know-more">
                                    Conocer en detalle
                                </a>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endforeach