<!-- Footer
      ================================================== -->
<footer id="footer" style="background-color: #009ADA">

    <!-- Top -->
    {{--<div class="top">

        <!-- Container -->
        <div class="container">

            <!-- Row -->
            <div class="row">

                <!-- Column -->
                <!--div class="col-sm-3 col-md-3">
                    <h5>flickr stream</h5>
                    <ul id="footer-flickr-stream" class="clearfix photo-stream"></ul>
                </div-->
                <!-- Column /END -->

                <!-- Column -->
                <!--div class="col-sm-3 col-md-3">
                    <h5>latest tweets</h5>
                    <div id="footer-tweets"></div>
                </div-->
                <!-- Column /END -->

                <!-- Column -->
                <div class="col-sm-4 col-md-4">
                    <h5>Información</h5>
                    <ul class="links underline">
                        <li><a href="/about">ACERCA DE IPTELCOM</a></li>
                        --}}{{--@foreach($footerinfo as $footer)
                            <li><a href="/contenttype/{{$footer->pagelink}}">{{$footer->type}}</a></li>
                        @endforeach--}}{{--

                    </ul>
                </div>
                <!-- Column /END -->

                <!-- Column -->
                <div class="col-sm-4 col-md-4">

                            <div class="media">
                                <img class="media-object pull-left" src="{{$profile->user->gravatar}}" alt="IP Telecom" width="100" height="100">
                                <div class="media-body basic-info">
                                    <p ><a class="infoitem" href="tel:{{$profile->phone}}">Teléfono: {{$profile->phone}}</a></p>
                                    <p ><a class="infoitem" href="mailto:{{$profile->email}}">Email: {{$profile->email}}</a></p>
                                </div>
                            </div>

                </div>
                <!-- Column /END -->

                <!-- Column -->
                <div class="col-sm-4 col-md-4">
                    <h5>boletín informativo</h5>
                    <p>Recibe invitaciones a eventos tecnológicos, promociones e información de nuevos servicios. Por favor déjanos tu email.</p>
                    --}}{{--@include('main.partials._subscriberform')--}}{{--
                </div>
                <!-- Column /END -->

            </div>
            <!-- /Row -->

        </div>
        <!-- /Container -->

    </div>--}}
    <!-- /Top -->

    <!-- Bottom -->
    <div class="bottom">

        <!-- Container -->
        <div class="container">

            <!-- ul class="social-buttons colored-bg-on-hover round clearfix">
                <li><a href="#"><i class="fa fa-skype"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
            </ul -->

            <span  class="copy-text" >Copyright &copy; 2015 Ip Telecom [Quito-Ecuador]. Todos los derechos reservados.</span>


        </div>
        <!-- /Container -->

    </div>
    <!-- /Bottom -->

</footer>
<!-- /Footer
================================================== -->