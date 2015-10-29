<?php
$profile = $data["profile"];
$callouts = $profile->homecalls;
$themeName = Config::get('app_parametters.theme_name');
$homeItem = $data["home_item"];
$isDedicated = Config::get("app_parametters.isDedicated");
$metaInfo = $data["page_meta_info"];
?>
@extends('themes.genesis.layout.app')
@include('themes.genesis.partials._header_meta_tags')
@section('content')
    <div class="container-fluid ">
        @if($callouts->isEmpty())
            @include('themes.'.$themeName.'.home.partials.defaultcallout')
        @else
            @include('themes.'.$themeName.'.home.partials.callouts')
        @endif
    </div>
@endsection