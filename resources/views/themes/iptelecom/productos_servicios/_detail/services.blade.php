<?php
$restsaleables = $data["restsaleables"];
$isDedicated = Config::get("app_parametters.isDedicated");
?>
@if(!$restsaleables->isEmpty())
    <section class="content-block dark-bg saleable-services-container" id="prices">
        <div class="overlay default">
            <div class="container  services-content">
            {{--<div class="saleable-services-container" id="services">
                <div class="container ">--}}

                    <div class="row">
                        <div class="col-sm-12">
                            <h1 data-icon="&#xe6ae">Otros Servicios
                                @include('themes.iptelecom.productos_servicios._detail.partials._top_jumper')
                                @include('themes.iptelecom.productos_servicios._detail.partials._section_nav')
                            </h1>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            @include('themes.iptelecom.productos_servicios._detail.partials._cat_tabs')

                        </div>
                    </div>
                    <div id="content-filtered">
                        @include('themes.iptelecom.productos_servicios._detail.partials._services_list')
                    </div>
                </div>

            </div>
        </section>
@endif
