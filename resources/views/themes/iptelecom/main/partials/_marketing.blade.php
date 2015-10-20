<?php
$profile = $data["profile"];
//$version = $data["version"];
$bio = $data['biography'];

//$isContactPage = false;
?>
<!-- Content Block
      ================================================== -->
<section class="content-block page-bg">
    <div class="overlay tint">
        <!-- Container -->
        <div class="container">
            <!-- Column -->
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="service-box no-border ">
                    <h1>QUIÉNES SOMOS?</h1>

                    <div class="line color-1-bg"></div>
                    <div style="padding: 20px; font-size: 18px;word-spacing: 2px;">
                        @if($bio===null)
                            <i class="alert alert-warning fa fa-exclamation-triangle"> Aun no ha escrito una biografía.</i>
                        @else
                            {!!str_limit($bio->detail,10000,"......")!!}
                        @endif
                    </div>
                    <div>
                        {{--<a href="/acercade" class="scroll-to btn btn-primary"><i class="fa fa-info-circle"></i>CONOCE
                            MÁS DE IPTELECOM</a>--}}
                        <a href="/productos-y-servicios" class="scroll-to btn btn-primary"><i
                                    class="fa fa-folder-open"></i>EXPLORA NUESTROS SERVICIOS</a>
                        <!--a href="#about" class="scroll-to btn btn-white"><i class="fa fa-print"></i>start now</a-->
                    </div>


                </div>

            </div>
            <!-- /Column -->
            <!-- Row -->
            <div class="row">
                {{--@foreach($marketingchunks as $chunk)
                <!-- Column -->
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="service-box no-border tts-1">
                        <a href="/contenttype/{{$chunk->contenttype->pagelink}}">
                        <i class="icon fa fa-{{$chunk->contenttype->icon}} color-1-bg tts-1-target"></i>
                        <h4 class="u-case">{{ $chunk->title}}</h4></a>
                        <p>{{ $chunk->message}}</p>

                    </div>

                </div>
                <!-- /Column -->
                @endforeach--}}
            </div>
            <!-- /Row-->

        </div>
        <!-- /Container -->
    </div>
</section>
<!-- /Content Block
================================================== -->