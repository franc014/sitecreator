<nav class="navbar navbar-default navbar-fixed-top">
    <?php
        $profile = $data["profile"];
        //dd($profile->user->username);
        $homeItem = $data["home_item"];
    //dd($homeItem);
    ?>
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/{{$profile->user->username}}/{{$homeItem->url}}" data-anijs="if: load,on: window, do: fadeInDown animated">
                <img src="{{$profile->user->gravatar}}" width="50" height="50" class="brand-icon">
                @if($profile->firstname!="" && $profile->lastname!="")
                    <span class="brand-name">{{$profile->firstname." ".$profile->lastname}}</span>
                @else
                    <span class="brand-name">{{$profile->user->username}}</span>
                @endif
            </a>

        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav navbar-right" >

                @if (Auth::guest())
                    @foreach($navItems as $item)
                    <li data-anijs="if: load,on: window, do: fadeInDown animated"><a href="/{{$profile->user->username}}/{{$item->url}}">{{$item->menualias}}</a></li>
                    @endforeach
                @else
                    @foreach($navItems as $item)
                        <li data-anijs="if: load,on: window, do: fadeInDown animated"><a href="/{{$profile->user->username}}/{{$item->url}}">{{$item->menualias}}</a></li>
                    @endforeach
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li data-anijs="if: load,on: window, do: fadeInDown animated"><a href="/auth/logout">SALIR</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
    <section class="subheader hidden-xs hidden-sm"  >
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div data-anijs="if: load,on: window, do: flipInY animated">
                    @yield('page_title')
                    @yield('content_intro')

                </div>
            </div>
        </div>

    </section>
</nav>
