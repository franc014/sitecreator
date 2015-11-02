@extends('themes.iptelecom.layout.contentmaster')
<?php
    $saleable = $data["saleable"];
?>
@section('page_title_window'){{$saleable->title}}@endsection
@section('page_description'){{str_limit(strip_tags($saleable->description),160,"")}}@endsection
@section('page_info_title')
    Servicio: {{$saleable->title}}
@stop


@section('page_content')

    @include('themes.iptelecom.productos_servicios._detail.characteristics')
    @include('themes.iptelecom.productos_servicios._detail.ventages')
    @include('themes.iptelecom.productos_servicios._detail.prices')
    @include('themes.iptelecom.productos_servicios._detail.services')



@endsection