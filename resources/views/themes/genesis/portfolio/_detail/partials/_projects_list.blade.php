@foreach(array_chunk($projects->all(), 3) as $row)
    <div class="row " >
        @foreach( $row as $project)
            <div class="col-sm-4 ">
                <div class="panel panel-default service-box mix
                @foreach($project->categories as $cat)
                    category-{{$cat['id'].' '}}
                @endforeach
                " >
                    <div class="panel-body">
                        <!--img src="http://lorempixel.com/50/50/" class="center-block"-->
                        <h3>{{$project->title}}</h3>
                        <p >
                            @if(!$isDedicated)
                                {!!str_limit($project->description,80,"...")!!}<a href="/{{$project->user->username}}/productos_servicios/{{$project->title}}/{{$project->id}}">Leer más</a>
                            @else
                                {!!str_limit($project->description,80,"...")!!}<a href="/productos_servicios/{{$project->title}}/{{$project->id}}">Leer más</a>
                            @endif
                        </p>

                    </div>
                    <div class="panel-footer" >
                        <a href="#contact-form" class="btn btn-success btn-md" href="#">Solicitar</a>
                        @if(!$isDedicated)
                            <a href="/{{$project->user->username}}/productos_servicios/{{$project->title}}/{{$project->id}}" class="pull-right know-more">
                                Conocer en detalle
                            </a>
                        @else
                            <a href="/productos_servicios/{{$project->title}}/{{$project->id}}" class="pull-right know-more">
                                Conocer en detalle
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endforeach