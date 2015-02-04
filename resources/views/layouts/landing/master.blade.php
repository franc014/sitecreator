<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>profesional.xyz</title>
	<link rel="stylesheet" href="/css/admin/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="/css/landing/styles.css" />
	<link rel="stylesheet" href="/js/landing/nivoslider/nivo-slider.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="/js/landing/nivoslider/themes/default/default.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="/js/landing/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />

</head>


<body>

<div class="container">
	@include('layouts.landing.partials._header')
	@yield('main_content')


</div>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script type="text/javascript" src="/js/landing/nivoslider/jquery.nivo.slider.pack.js"></script>
<script type="text/javascript" src="/js/landing/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<script type="text/javascript" src="/js/landing/fancybox/jquery.easing-1.3.pack.js"></script>
<script type="text/javascript" src="/js/landing/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>

<script type="text/javascript">
	$(window).load(function() {
		$('#slider').nivoSlider();
	});
</script>

<script type="text/javascript">
	$(window).load(function() {
		$("*[rel=fancybox]").fancybox();
	});
</script>


</body>

</html>