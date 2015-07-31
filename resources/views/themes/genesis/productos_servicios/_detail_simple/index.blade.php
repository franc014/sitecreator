@extends('themes.genesis.layout.app')
@section('page_title_window')
    Email Marketing
@endsection
@section('page_title')
    <div class="container" >
        <div class="row">
            <div class="col-sm-8 center-block pull-right" ><h1 data-icon="&#xe6ae">Email Marketing</h1></div>

        </div>

    </div>
@endsection

@section('content')
    @include('themes.genesis.productos_servicios._detail_simple.characteristics')
    @include('themes.genesis.productos_servicios._detail.ventages')
    @include('themes.genesis.productos_servicios._detail.prices')
    @include('themes.genesis.productos_servicios._detail.services')



@endsection