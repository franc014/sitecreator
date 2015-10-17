@extends('themes.iptelecom.layout.app')
@section('page_title_window')
    Home
@endsection


@section('content')
    <?php
    use Illuminate\Support\Facades\Config;$profile = $data["profile"];
    $callouts = $profile->homecalls;
    $themeName = Config::get('app_parametters.theme_name');

    $homeItem = $data["home_item"];
    $isDedicated = Config::get("app_parametters.isDedicated");
    $in_home = true;
    ?>




    @include('themes.iptelecom.main.partials._banner')

    @include('themes.iptelecom.main.partials._marketing')

    @include('themes.iptelecom.main.partials._productos_servicios')


    @include('themes.iptelecom.main.partials._contact')





@stop

