@foreach(array_chunk($projects->all(), 4) as $row)
    <div class="row " >
        @foreach( $row as $project)
            <div class="col-sm-3 ">
                <div style="background: linear-gradient(
                        rgba(52, 73, 94, 0.8),
                        rgba(52, 73, 94, 0.8)
                        ), url({{$project->photo['cloudpath']}});" class="panel panel-default project-box mix
                @foreach($project->categories as $cat)
                    category-{{$cat['id'].' '}}
                @endforeach
                " >

                    <div class="panel-body" >

                        <!--img src="http://lorempixel.com/50/50/" class="center-block"-->
                        <h2>{{$project->title}}</h2>
                        <hr>
                        @if(!$isDedicated)
                        <p >
                            {!!str_limit($project->description,100,"...")!!}<a href="/{{$username}}/project/{{$project->slug}}">Ver proyecto</a>
                        </p>
                        @else
                            <p >
                                {!!str_limit($project->description,100,"...")!!}<a href="/project/{{$project->slug}}">Ver proyecto</a>
                            </p>
                        @endif

                    </div>
                    {{--<div class="panel-footer" >

                        @if(!$isDedicated)
                            <a href="/{{$username}}/project/{{$project->title}}"
                               class="pull-right know-more">
                                Conocer en detalle
                            </a>
                        @else
                            <a href="/project/{{$project->title}}"
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