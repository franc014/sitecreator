<!DOCTYPE html>
<html lang="en" ng-app="prfXyzSiteApp">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="ZlgY77YUSaEM_HK042TwcvMNPJgkjF8u8nlk9Fz-2ms" />

	<title>Juan Andrade | @yield('page_title_window')</title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" >
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <link href="/css/themes/genesis/genesis.css" rel="stylesheet">
    <link rel="stylesheet" href="http://anijs.github.io/lib/animationcss/animate.css">
    <link rel="stylesheet" type="text/css" href="/css/themes/genesis/sweet-alert.css">
    <link href="/js/themes/genesis/pace/themes/custom/pace-theme-barber-shop.css" rel="stylesheet">
    <link href="/css/global/nganimations.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
    @if(isset($isHome) && $isHome)
        <nav class="navbar-home navbar-default navbar-fixed-top"  >
    @else
        <nav class="navbar navbar-default navbar-fixed-top"  >
    @endif

        @include('themes.genesis.partials._header')
    </nav>
    <section class=" subheader"  >

        <div data-anijs="if: load,on: window, do: flipInY animated">
            @yield('page_title')
            @yield('content_intro')

        </div>


    </section>

    <div id="messageSet" class="none {{ Session::has('flash-success-message') ? 'flash-success-message':''  }}"></div>
    @if($errors->any())
        <div id="errorsSet">
            <ul class="list-unstyled errors-list" style="display: none">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @yield('content')
    @unless(isset($isHome) && $isHome==true)
        @include('themes.genesis.partials._footer')
    @endunless
	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script src="http://d3js.org/d3.v3.min.js"></script>
    <script src="/js/themes/genesis/trianglify.min.js"></script>
    <script src="/js/themes/genesis/sweet-alert.min.js"></script>
    <script src="/js/themes/genesis/sbundle.js"></script>
    <script src="/js/themes/genesis/pace/pace.min.js"></script>
    <script src="/js/themes/genesis/anijs-min.js"></script>
    <script src="/js/themes/genesis/animations.js"></script>
    <script>
        //success alert values
        var title = "{!! session('success-message-title') !!}";
        var body = "{!! session('flash-success-message') !!}";
    </script>
    <script src="/js/themes/genesis/alerts.js"></script>
    <script src="/js/themes/genesis/jquery.mixitup.min.js"></script>
    <script src="/js/themes/genesis/ganalytics.js"></script>

</body>
</html>
