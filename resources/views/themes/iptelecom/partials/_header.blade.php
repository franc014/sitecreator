<?php
$profile = $data["profile"];
//dd($profile->user->username);
$homeItem = $data["home_item"];
$isDedicated = Config::get("app_parametters.isDedicated");
//$version = $data["version"];

?>
<!-- Header
    ================================================== -->
<header id="header">

    <!-- Main Navigation -->
    <div  id="main-nav" class="navbar navbar-default hide-icons " >

        <!-- Container -->
        <div class="container"  >

            <!-- header -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="fa fa-bars fa-lg"></span>
                </button>
                <a href="/" >
                    <img src="{{$profile->user->gravatar}}" width="70" height="90" class="ent-logo">
                </a>
            </div>
            <!-- /header-->

            <!-- nav-collapse -->
            <div class="navbar-collapse collapse">

                <!-- Nav Buttons -->
                <ul class="nav navbar-nav nav-buttons navbar-right">
                    <li><a class="nav-btn bg-1" href="/contacto"><i class="fa fa-envelope"></i><span class="xs-only">contact</span></a></li>
                </ul>
                <!-- /Nav Buttons -->

                <!-- Nav Buttons -->
                <!--ul class="nav navbar-nav nav-buttons navbar-right">
                    <li><a class="nav-btn bg-1" href="shop-index.html"><i class="fa fa-th-large"></i><span>our store</span></a></li>
                </ul-->
                <!-- /Nav Buttons -->

                <!-- Links -->
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
                        @foreach($navItems as $item)
                            <li data-anijs="if: load,on: window, do: fadeInDown animated">
                                @if(!$isDedicated)
                                    <a href="/{{$profile->user->username}}/{{$item->url}}">{{$item->menualias}}</a>
                                @else
                                    <a href="/{{$item->url}}">{{$item->menualias}}</a>
                                @endif
                            </li>
                        @endforeach
                    @else
                        @foreach($navItems as $item)
                            <li data-anijs="if: load,on: window, do: fadeInDown animated">
                                @if(!$isDedicated)
                                    <a href="/{{$profile->user->username}}/{{$item->url}}">{{$item->menualias}}</a>
                                @else
                                    <a href="/{{$item->url}}">{{$item->menualias}}</a>
                                @endif
                            </li>
                        @endforeach
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li data-anijs="if: load,on: window, do: fadeInDown animated"><a href="/auth/logout">SALIR</a></li>
                            </ul>
                        </li>
                        @endif
                    <!--li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-file-text"></i>pages<i class="fa fa-angle-down parent-symbol"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="about.html">About Us</a></li>
                            <li><a href="services.html">Services</a></li>
                            <li><a href="sidenav.html">side bar</a></li>
                            <li><a href="faq.html">FAQ</a></li>
                            <li><a href="404.html">404</a></li>
                            <li><a href="features.html">features</a></li>
                            <li><a href="icons.html">icons</a></li>
                            <li><a href="login.html">Login</a></li>
                            <li><a href="register.html">Register</a></li>
                        </ul>
                    </li-->

                    <!--li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-comments"></i>blog<i class="fa fa-angle-down parent-symbol"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="blog.html">Blog Posts</a></li>
                            <li><a href="post.html">Single Post</a></li>
                        </ul>
                    </li-->
                </ul>
                <!-- Links -->

            </div>
            <!-- /nav-collapse-->

        <!-- Text Slider -->
                    {{--<div class="text-slider no-js">
                        <div class="row">
                            <div class="col-md-5">

                            </div>
                            <div class="col-md-7">
                            <!-- Bxslider -->
                            <ul class="bxslider pull-left" id="text-slider" data-call="bxslider"
                            data-options="parentSelector:'.text-slider', removeParentClass:'no-js', prevText:'', nextText:'', pager:true, controls:false, mode:'horizontal', auto:true, autoReload:true">
                                @foreach($banners as $banner)

                                <li >
                                    <div class="slide pull-left"  >
                                        <p class="pull-left banner-text" >{{$banner->message}}</p>
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

                                <a href="/contenttype/services" class="scroll-to btn btn-primary"><i ></i>CONÓCELAS</a>
                                <!--a href="#about" class="scroll-to btn btn-white"><i class="fa fa-print"></i>start now</a-->
                            </div>
                            <!-- Buttons -->
                            </div>
                        </div>
                    </div>--}}
                    <!-- /Text Slider -->


        </div>
        <!-- /Container-->



    </div>
    <!-- /Main Navigation -->

</header>
<!-- /Header
================================================== -->