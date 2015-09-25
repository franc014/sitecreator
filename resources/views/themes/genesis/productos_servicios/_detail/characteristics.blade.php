<?php
$details = $data["details"];
$isContactPage = false;

?>
<div class="container-fluid service-main-details"  id="characteristics">
    <div class="row">

        <div class="col-sm-7 col-md-7 service-description">
            <h1>
                {{$saleable->title}}
            </h1>
            <div class="saleable-labeling">
                <span class="label label-{{$saleable->tagtype}} " >{{$saleable->tagtype}}</span>
                <span >@include('themes.genesis.productos_servicios._detail.partials._section_nav')</span>
            </div>

            <div>
                {!! $saleable->description !!}

            </div>
            @if(!$details->isEmpty())
                <div>
                    <h2>Características</h2>
                    @foreach($details as $detail)
                        <div class="media">
                            <div class="media-left " >
                                <img   data-anijs="if: mouseover, do: flipInY animated" class="media-object img-circle icon-feature" width="80" height="80" src="{{$detail->iconpath}}" alt="servicio">
                            </div>
                            <div class="media-body ">
                                <p class="service-detail ">
                                    {{$detail->detail}}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif


            <!-- Go to www.addthis.com/dashboard to customize your tools -->


        </div>

        <div class="col-sm-5 col-md-5 targets" >
            @include('themes.genesis.productos_servicios._detail.targets')

        </div>
        <!--div class="col-sm-6">

            <ul class="nav nav-pills pull-right service-menu">
                <li role="presentation" class="service-menu-item img-circle">
                    <a href="#" data-icon="&#xe697" >

                    </a>
                </li>

                <li role="presentation" class="service-menu-item img-circle">
                    <a href="#" data-icon="&#xe697" >

                    </a>
                </li>
            </ul>
        </div-->
    </div>


    <div class="row " style="padding:0 40px 10px 40px" >
        <div class="col-sm-4 col-md-4 ">
            <div class="pull-left">
                <a href="#contact-form" style="border-radius: 0" class="btn btn-success btn-lg " href="#">Solicitar</a>
            </div>

        </div>
        @include('themes.genesis.partials.share_links')

    </div>

</div>

