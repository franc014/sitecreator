<?php
$projects = $data["restofprojects"];
?>
@if(!$projects->isEmpty())
<div class="saleable-ventages-container" id="other-projects">
    <div class="container ventages-content" >

        <div class="row">
            <div class="col-sm-12">
                <h1  data-icon="&#xe6aa">Otros proyectos
                    @include('themes.genesis.portfolio._detail.partials._top_jumper')
                    @include('themes.genesis.portfolio._detail.partials._section_nav')
                </h1>
            </div>
        </div>

        @foreach(array_chunk($projects->all(), 3) as $row)
            <div class="row " >
                @foreach( $row as $project)
                    <div class="col-sm-4 ">
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
                                <h3>{{$project->title}}</h3>
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


    </div>
</div>
@endif