<section class="intro-block page-bg" >

    <!-- Overlay -->
    <div class="overlay default " id="main-banner">

        <!-- Container -->
        <div class="container" >

            <!-- Text Slider -->
            <div class="text-slider no-js">
                <div class="row">
                    <div class="col-md-5">

                    </div>
                    <div class="col-md-7">
                    <!-- Bxslider -->
                    <ul class="bxslider pull-left" id="text-slider" data-call="bxslider"
                    data-options="parentSelector:'.text-slider', removeParentClass:'no-js', prevText:'', nextText:'', pager:true, controls:false, mode:'horizontal', auto:true, autoReload:true">
                        @foreach($callouts as $callout)

                        <li >
                            <div class="slide pull-left"  >
                                <p class="pull-left banner-text" >{{$callout->message}}</p>
                                <p class="pull-left banner-subtext" >
                                    Soluciones de calidad para tu empresa o negocio.
                                </p>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    <!-- /Bxslider -->

                    <!--p class="meta">Lorem ipsum dolor sit amet, consectetur elit.</p-->

                    <!-- Buttons -->
                    <div >

                        <a href="/productos-y-servicios" class="scroll-to btn btn-primary"><i ></i>CONÓCELAS</a>
                        <!--a href="#about" class="scroll-to btn btn-white"><i class="fa fa-print"></i>start now</a-->
                    </div>
                    <!-- Buttons -->
                    </div>
                </div>
            </div>
            <!-- /Text Slider -->

        </div>
        <!-- /Container -->

    </div>
    <!-- /Overlay -->

</section>