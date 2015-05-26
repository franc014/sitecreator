<?php
$details = $data["details"];
$isContactPage = false;

?>
<div class="container-fluid service-main-details"  id="characteristics">
    <div class="row">

        <div class="col-sm-7 col-md-7 service-description">
            <h1  >{{$saleable->title}}

            </h1>

            <div>
                {!! $saleable->description !!}
                <span>@include('themes.genesis.productos_servicios._detail.partials._section_nav')</span>
            </div>
            @if(!$details->isEmpty())
                <div>
                    <h2>Características</h2>
                    @foreach($details as $detail)
                        <div class="media">
                            <div class="media-left media-middle">
                                <img data-anijs="if: mouseover, do: flipInY animated" class="media-object img-circle" width="80" height="80" src="{{$detail->iconpath}}" alt="servicio">
                            </div>
                            <div class="media-body">
                                <p>
                                    {{$detail->detail}}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
            <br>
            <div>
                <a href="#contact-form" class="btn btn-success btn-lg callout-service-detail" href="#">Solicitar</a>
            </div>
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


    <div class="row ">
        <div class="col-sm-7 service-content">



                <div class="form-content animate-show" ng-show="showContactForm">
                    @include("themes.genesis.partials.contact_info._contact_form")
                </div>

        </div>


    </div>

</div>

