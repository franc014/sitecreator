<?php
$ventages = $data["ventages"];
?>
@if(!$ventages->isEmpty())
<div class="saleable-ventages-container" id="ventages">
    <div class="container ventages-content" >

        <div class="row">
            <div class="col-sm-12">
                <h1  data-icon="&#xe69e">Beneficios
                    @include('themes.genesis.productos_servicios._detail.partials._top_jumper')
                    @include('themes.genesis.productos_servicios._detail.partials._section_nav')

                </h1>
            </div>
        </div>

        <div class="row">
            @foreach($ventages as $ventage)
            <div class="col-sm-4">
                <div class="thumbnail ventages-thumbnail" >

                    <div class="caption">
                        <!--h3 class="ventages-thumbnail-title">Thumbnail label</h3-->

                        <p class="clearfix thumbnail-text" >
                            <img data-anijs="if: mouseover, do: flipInY animated"
                                 class="media-object img-circle center-block img-responsive" width="50" height="50"
                                 src="{{$ventage->iconpath}}" alt="servicio">
                            {{$ventage->detail}}
                        </p>
                    </div>
                </div>
                <!--div class="panel panel-default service-box " >
                    <div class="panel-body">
                        <!--img src="http://lorempixel.com/50/50/" class="center-block"-->
                        <!--h3>{{--$saleable->title--}}</h3-->
                        <!--p >
                        {{--$ventage->detail--}}
                        </p>

                    </div>

                </div-->

            </div>
            @endforeach

        </div>


    </div>
</div>
@endif