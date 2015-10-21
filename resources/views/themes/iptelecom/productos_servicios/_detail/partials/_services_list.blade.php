@foreach(array_chunk($restsaleables->all(), 3) as $row)
    <div class="row ">
        @foreach( $row as $saleable)
            <div class="col-sm-4 ">
                <div class="panel panel-default service-box-desc mix
                @foreach($saleable->categories as $cat)
                    category-{{$cat['id'].' '}}
                @endforeach
                        ">
                    <div class="panel-body">
                        <!--img src="http://lorempixel.com/50/50/" class="center-block"-->
                        <h3>{{$saleable->title}}</h3>

                        <p>
                            @if(!$isDedicated)

                                {!!str_limit($saleable->description,80,"...")!!}<a
                                        href="/{{$saleable->user->username}}/{{$saleable->tagtype}}/{{$saleable->slug}}">Leer
                                    más</a>

                            @else

                                {!!str_limit($saleable->description,80,"...")!!}<a
                                        href="/{{$saleable->tagtype}}/{{$saleable->slug}}">Leer más</a>

                            @endif
                        </p>

                    </div>
                    <div class="panel-footer">
                        <a href="/contacto" class="btn btn-primary btn-md fa fa-paper-plane-o" href="#"> Solicitar</a>
                        @if(!$isDedicated)

                            <a href="/{{$saleable->user->username}}/{{$saleable->tagtype}}/{{$saleable->slug}}"
                               class="pull-right know-more">
                                Conocer en detalle
                            </a>

                        @else

                            <a href="/{{$saleable->tagtype}}/{{$saleable->slug}}" class="pull-right know-more">
                                Conocer en detalle
                            </a>

                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endforeach