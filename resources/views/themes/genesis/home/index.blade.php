@extends('themes.genesis.layout.app')
@section('page_title_window')
    Biografía
@endsection


@section('content')
    <?php
    $profile = $data["profile"];
    $callouts = $profile->homecalls;
    $themeName = Config::get('app_parametters.theme_name');
    $homeItem = $data["home_item"];
    $isDedicated = Config::get("app_parametters.isDedicated");
    ?>

    <div class="container-fluid ">
        @if($callouts->isEmpty())
            @include('themes.'.$themeName.'.home.partials.defaultcallout')
        @else
            @include('themes.'.$themeName.'.home.partials.callouts')
        @endif
    </div>

@endsection