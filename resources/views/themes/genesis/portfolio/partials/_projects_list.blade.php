@foreach(array_chunk($projects->all(), 3) as $row)
    <div class="row " >
        @foreach( $row as $project)
            <div class="col-sm-4 ">
                <div style="background: linear-gradient(
                        rgba(41, 128, 185, 0.7),
                        rgba(127, 140, 141, 0.7)
                        ), url({{$project->photo['cloudpath']}});" class="panel panel-default project-box mix
                @foreach($project->categories as $cat)
                    category-{{$cat['id'].' '}}
                @endforeach
                " >

                    <div class="panel-body" >

                        <!--img src="http://lorempixel.com/50/50/" class="center-block"-->
                        <h3>{{$project->title}}</h3>
                        @if(!$isDedicated)
                        <p >
                            {!!str_limit($project->description,100,"...")!!}<a href="/{{$username}}/project/{{$project->title}}/{{$project->id}}">Leer más</a>
                        </p>
                        @else
                            <p >
                                {!!str_limit($project->description,100,"...")!!}<a href="/project/{{$project->title}}/{{$project->id}}">Leer más</a>
                            </p>
                        @endif

                    </div>
                    {{--<div class="panel-footer" >

                        @if(!$isDedicated)
                            <a href="/{{$username}}/project/{{$project->title}}/{{$project->id}}"
                               class="pull-right know-more">
                                Conocer en detalle
                            </a>
                        @else
                            <a href="/project/{{$project->title}}/{{$project->id}}"
                               class="pull-right know-more">
                                Conocer en detalle
                            </a>
                        @endif

                    </div>--}}
                </div>
            </div>
        @endforeach
    </div>
@endforeach