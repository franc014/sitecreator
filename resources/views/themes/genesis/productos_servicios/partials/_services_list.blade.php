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
                            @if($saleable->type==0)
                                <p >
                                    {!!str_limit($saleable->description,100,"...")!!}<a href="/{{$username}}/producto/{{$saleable->slug}}">Leer más</a>
                                </p>
                            @else
                                <p >
                                    {!!str_limit($saleable->description,100,"...")!!}<a href="/{{$username}}/servicio/{{$saleable->slug}}">Leer más</a>
                                </p>
                            @endif
                        @else
                            @if($saleable->type==0)
                                <p >
                                    {!!str_limit($saleable->description,100,"...")!!}<a href="/producto/{{$saleable->slug}}">Leer más</a>
                                </p>
                            @else
                                <p >
                                    {!!str_limit($saleable->description,100,"...")!!}<a href="/servicio/{{$saleable->slug}}">Leer más</a>
                                </p>
                            @endif
                        @endif

                    </div>
                    <div class="panel-footer" >
                        <a href="#contact-form" class="btn btn-success btn-md" href="#">Solicitar</a>
                        @if(!$isDedicated)
                            @if($saleable->type==0)
                                <a href="/{{$username}}/producto/{{$saleable->slug}}"
                                   class="pull-right know-more">
                                    Conocer en detalle
                                </a>
                            @else
                                <a href="/{{$username}}/servicio/{{$saleable->slug}}"
                                   class="pull-right know-more">
                                    Conocer en detalle
                                </a>
                            @endif
                        @else
                            @if($saleable->type==0)
                                <a href="/producto/{{$saleable->slug}}"
                                   class="pull-right know-more">
                                    Conocer en detalle
                                </a>
                            @else
                                <a href="/servicio/{{$saleable->slug}}"
                                   class="pull-right know-more">
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