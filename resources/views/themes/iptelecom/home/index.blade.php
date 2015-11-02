<?php
use Illuminate\Support\Facades\Config;
$profile = $data["profile"];
$callouts = $profile->homecalls;
$themeName = Config::get('app_parametters.theme_name');

$homeItem = $data["home_item"];
$isDedicated = Config::get("app_parametters.isDedicated");
$in_home = true;
$metaInfo = $data["page_meta_info"];
?>
@extends('themes.iptelecom.layout.app')
@include('themes.iptelecom.partials._header_meta_tags')
@section('content')


    @include('themes.iptelecom.main.partials._banner')

    @include('themes.iptelecom.main.partials._marketing')

    @include('themes.iptelecom.main.partials._productos_servicios')


    @include('themes.iptelecom.main.partials._contact')





@stop

