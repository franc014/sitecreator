@extends('themes.genesis.layout.app')
@section('page_title_window')
    Biografía
@endsection


@section('content')
    <?php
    $profile = $data["profile"];
    $callouts = $profile->homecalls;

    $homeItem = $data["home_item"];
    $isDedicated = Config::get("app_parametters.isDedicated");
    ?>

    <div class="container-fluid ">
        @if($callouts->isEmpty())
            @include('themes.genesis.home.partials.defaultcallout')
        @else
            @include('themes.genesis.home.partials.callouts')
        @endif
    </div>

@endsection