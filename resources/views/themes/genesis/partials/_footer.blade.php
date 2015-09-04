
<footer class="user-footer" style="z-index: 20000; position: absolute; width: 100%">
    <?php
        $profile = $data["profile"];
        $socialItems = $data["socialitems"];
        //dd($socialItems);
    ?>
    <div class="container footer-content">
        <div class="row ">
            @if(!empty($socialItems))
            <div class="col-sm-4 " data-anijs="if: load,on: window, do: fadeInDown animated">
                <div class="row ">
                    <div class="col-sm-12" >
                        <p class="footer-intro">
                            Puede encontrar más información en:</p>
                    </div>
                </div>
                @foreach(array_chunk($socialItems, 3) as $row)
                <div class="row social-items">
                    @foreach($row as $socialItem => $socialValue)

                        <div class="col-sm-2">
                            @if($socialValue[0]["social"]!="treehouse")
                                <a target="_blank" href="{{$socialValue[0]["account"]}}" data-icon="&#xe{{htmlentities($socialValue[0]["icon"])}}">
                                </a>
                            @else
                                <a target="_blank" href="{{$socialValue[0]["account"]}}" data-icon-x="&#xe7eb">
                                </a>
                            @endif
                        </div>

                    @endforeach
                </div>
                @endforeach
            </div>
            @endif
            <div class="col-sm-4">

            </div>
            <!--div class="col-sm-4 " >
                <div class="row ">
                    <div class="col-sm-12" >
                        <p class="footer-intro">
                            Links de interés:</p>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-sm-12">
                        <ul class="list-unstyled">
                            <li><a href="">sitio1</a></li>
                            <li><a href="">sitio2</a></li>
                            <li><a href="">sitio3</a></li>
                        </ul>
                    </div>
                </div>
            </div-->

            <div class="col-sm-4 " data-anijs="if: load,on: window, do: fadeInDown animated">
                <div class="row ">
                    <div class="col-sm-12" >
                        <p class="footer-intro">
                            Datos de contacto:</p>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-sm-12">
                        <p class="footer-text" data-icon="&#xe642"> Teléfono: <a href="tel:{{$profile->phone}}">{{$profile->phone}}</a></p>
                        <p class="footer-text" data-icon="&#xe658"> Celular: <a href="tel:{{$profile->cellular}}">{{$profile->cellular}}</a></p>
                        <p class="footer-text" data-icon="&#xe785"> Email: <a href="mailto:{{$profile->user->email}}">{{$profile->user->email}}</a></p>
                        <p class="footer-text" data-icon="&#xe648"> Quito-Ecuador</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="owner-footer" >
            <div class="container-fluid footer-content" >
                <div class="row ">
                    <div class="col-sm-6 col-sm-offset-4" data-anijs="if: load,on: window, do: fadeInDown animated">
                        <!--p class="footer-text copy-right">Este sitio es generado desde <a href="">www.profesional.xyz</a>. Visítalo!.
                            El mejor lugar para proyectar tu imagen profesional en Internet.</p-->
                        <p class="footer-text copy-right">Desarrollado orgullosamente con <a target="_blank" href="http://laravel.com/">LARAVEL</a> framework</p>
                        <p class="footer-text copy-right ">Derechos reservados &#169; <span >Juan Francisco Andrade Álvarez - 2015 </span></p>


                    </div>
                </div>

            </div>
        </div>
</footer>

