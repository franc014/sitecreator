<?php
$saleables = $data["saleables"];

$username = $data["username"];
$isContactPage = false;
$isDedicated = Config::get("app_parametters.isDedicated");

?>
<!-- Content Block
      ================================================== -->
<section class="content-block page-bg dark-bg">

    <!-- Overlay -->
    <div class="overlay default">

        <!-- Container -->
        <div class="container">

            <!-- Title -->
            <div class="section-title">
                <h1 style="color: #FFFFFF">SERVICIOS</h1>

                <p>Muchos años de experiencia avalan
                    la calidad en los proyectos que realizamos.</p>
            </div>
            <!-- Title /END -->

            <!-- Portfolio Slider -->
            <div class="portfolio-slider no-js">

                    @if(!$saleables->isEmpty())
                        <div id="content-filtered">
                            @include('themes.iptelecom.productos_servicios.partials._services_list')

                        </div>
                        <a style="margin: 0 300px" href="/productos-y-servicios" class="scroll-to btn btn-primary"><i
                                class="fa fa-folder-open"></i>CONOCE TODOS LOS SERVICIOS</a>
                    @else
                {{--<!-- BxSlider -->
                <ul class="bxslider" id="portfolio" data-call="bxslider" data-options="{parentSelector:'.portfolio-slider', removeParentClass:'no-js', slideMargin:30, nextText:'', prevText:'', pager:false, controls:true}" data-breaks="[{screen:0, slides:1}, {screen:460, slides:2}, {screen:768, slides:3}, {screen:1200, slides:4}]">
                    @foreach($saleables as $saleable)

                    <li>
                        <!-- Project -->
                        <div class="project">

                            <img alt="{{$saleable->title}}" src="http://lorempixel.com/400/200/sports/" width="220" height="153" >
                            <!-- Overlay -->
                            <div class="overlay">
                                <div class="v-center">
                                    <div class="center">
                                        <a href="/content/{{$saleable->title}}" ><i class="fa fa-expand"></i></a>
                                        <h4>{{$saleable->title}}</h4>
                                        --}}{{--<span>{{$saleable->category->name}}</span>--}}{{--
                                    </div>
                                </div>
                            </div>
                            <!-- /Overlay -->
                        </div>
                        <!-- /Project -->
                    </li>
                    @endforeach
                </ul>
                <!-- BxSlider -->--}}
                
                    <div class="alert alert-warning fa fa-exclamation-triangle " style="margin: 0 300px"> Aun no ha registrado ningún servicio</div>
                @endif
            </div>
            <!-- /Portfolio Slider -->

        </div>
        <!-- /Container -->

    </div>
    <!-- /Overlay -->

</section>
<!-- /Content Block
================================================== -->