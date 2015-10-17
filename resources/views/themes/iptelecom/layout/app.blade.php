<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="google-site-verification" content="JfYtPo3f1GliHrKu8JIUlQPewhIG_XkMFUYY5i0hhTo" />
    <title>Ip Telecom | @yield('page_title_window')</title>
    <link rel="shortcut icon" href="{{ asset('/img/favicons/iptelecom/favicon.ico') }}">
    <!-- Pace
    ================================================== -->
    <link href="/js/themes/iptelecom/pace/themes/custom/pace-theme-center-atom.css" rel="stylesheet">

    <!-- Bootstrap core CSS
    ================================================== -->

    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic' rel='stylesheet'
          type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,400italic,700,900' rel='stylesheet'
          type='text/css'>
    <!-- Custom styles for this template
    ================================================== -->
    <link href="/css/themes/iptelecom/prettyPhoto.css" rel="stylesheet">
    <link href="/css/themes/iptelecom/bxslider.css" rel="stylesheet">
    <link href="/css/themes/iptelecom/default.css" rel="stylesheet">


    <!-- Animation Effects
    ================================================== -->
    <link href="/css/themes/iptelecom/animate.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/themes/iptelecom/sweet-alert.css">



</head>

<body class="overlay">

<!-- Page Wrapper
================================================== -->
<div id="page-wrapper" class="boxed">
    @include('themes.iptelecom.partials._header')
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
    @include('themes.iptelecom.partials._footer')
</div>
<!-- /Page Wrapper
================================================== -->
@section('javascripts')
    @include('themes.iptelecom.partials._javascripts')
@show
<script src="/js/themes/iptelecom/sweet-alert.min.js"></script>
<script src="/js/themes/iptelecom/animations.js"></script>
<script src="/js/themes/iptelecom/ganalytics.js"></script>
<script>
    //success alert values
    var title = "{!! session('success-message-title') !!}";
    var body = "{!! session('flash-success-message') !!}";
</script>
<script src="/js/themes/iptelecom/alerts.js"></script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5605cbe06a48a6ba" async="async"></script>
<!-- /JavaScript
================================================== -->
</body>
</html>
