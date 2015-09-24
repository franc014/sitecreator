<?php
$restsaleables = $data["restsaleables"];
$isDedicated = Config::get("app_parametters.isDedicated");
?>
@if(!$restsaleables->isEmpty())
<div class="saleable-services-container" id="services">
    <div class="container services-content" >

        <div class="row">
            <div class="col-sm-12">
                <h1 data-icon="&#xe6ae">Otros Servicios
                    @include('themes.genesis.productos_servicios._detail.partials._top_jumper')
                    @include('themes.genesis.productos_servicios._detail.partials._section_nav')
                </h1>
            </div>

        </div>

        <div class="row">
            <div class="col-sm-12 col-md-12">
                @include('themes.genesis.productos_servicios._detail.partials._cat_tabs')

            </div>
        </div>
        <div id="content-filtered">
               @include('themes.genesis.productos_servicios._detail.partials._services_list')
        </div>
    </div>
</div>

@endif
