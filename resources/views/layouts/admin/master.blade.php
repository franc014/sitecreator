<!DOCTYPE html>
<html >
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>profesional.xyz-ADMIN-@yield('page_title')</title>

    <link href="/css/admin/bootstrap.min.css" rel="stylesheet">
    <link href="/css/admin/datepicker3.css" rel="stylesheet">
    <!--link href="/css/admin/uploadfile.css" rel="stylesheet"-->
    <link href="/css/admin/jquery.fileupload.css" rel="stylesheet">
    <link href="/css/admin/styles.css" rel="stylesheet">
    <link href="/css/admin/mods.css" rel="stylesheet">
    <!--link href="/css/admin/validations.css" rel="stylesheet"-->
    <link href="/css/admin/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/admin/textAngular.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="/js/admin/html5shiv.js"></script>
    <script src="/js/admin/respond.min.js"></script>

    <![endif]-->
    <link href="/css/admin/validations.css" rel="stylesheet">
    <link href="/css/global/nganimations.css" rel="stylesheet">


</head>

<body ng-app="prfXyzApp" ng-cloak>
@include('layouts.admin.partials._header')
@include('layouts..admin.partials._sidebar')
<div ng-show="showSpinner" id="spinner" class="sk-spinner sk-spinner-double-bounce place-spinner">
    <div class="sk-double-bounce1"></div>
    <div class="sk-double-bounce2"></div>
</div>
<div class="alert alert-danger system-alert" ng-show="showSystemAlert"><lead ng-bind-html="systemAlert"></lead></div>
@yield('main_content')


@section('javascripts')
    <script src="/js/admin/jquery-1.11.1.min.js"></script>
    <script src="/js/admin/jquery-ui.min.js"></script>
<script src="/js/adminapp.js"></script>
    {{--<script src="/js/abundle.js"></script>--}}
<script src="/js/admin/bootstrap.min.js"></script>

<script>
!function ($) {
        $(document).on("click","ul.nav li.parent > a > span.icon", function(){
            $(this).find('em:first').toggleClass("glyphicon-minus");
        });
        $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
    }(window.jQuery);

    $(window).on('resize', function () {
        if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
    });
    $(window).on('resize', function () {
        if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
    })
</script>
@show
</body>

</html>
