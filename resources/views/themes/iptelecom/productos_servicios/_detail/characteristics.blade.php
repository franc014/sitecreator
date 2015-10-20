<?php
$details = $data["details"];
$isContactPage = false;

?>
<section class="content-block default-bg content-display-detail" id="characteristics">
    <div class="container ">
        {{--<div class="container-fluid service-main-details"  id="characteristics">--}}
        <div class="row service-main-details">

            <div class="col-sm-9 col-md-9 service-description">
                <h1>
                    {{trim($saleable->title)}}
                </h1>

                <div class="saleable-labeling">
                    <span class="label label-{{$saleable->tagtype}} ">{{$saleable->tagtype}}</span>
                    <span>@include('themes.iptelecom.productos_servicios._detail.partials._section_nav')</span>
                </div>

                <div>
                    {!!str_replace('<p><br/></p>',"",trim($saleable->description)) !!}

                </div>
                @if(!$details->isEmpty())

                        <h2>Características</h2>
                        @foreach($details as $detail)
                            <div class="media">
                                <div class="media-left media-middle pull-left">
                                    <img data-anijs="if: mouseover, do: flipInY animated"
                                         class="media-object  icon-feature "
                                         src="{{$detail->iconpath}}" alt="servicio">
                                </div>
                                <div class="media-body ">

                                    <p class="service-detail ">
                                        {!! str_replace('<p><br/></p>',"",trim($detail->detail)) !!}
                                    </p>
                                </div>
                            </div>
                        @endforeach

                    @endif


                            <!-- Go to www.addthis.com/dashboard to customize your tools -->


            </div>

            <div class="col-sm-5 col-md-5 targets">
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


        <div class="row " >
            <div class="col-sm-6 col-md-6 ">
                <div class="pull-left">
                    <a href="/contacto" style="border-radius: 0" class="btn btn-success btn-lg "
                       href="#">Solicitar</a>
                </div>
                @include('themes.genesis.partials.share_links')
            </div>


        </div>

    </div>
</section>
