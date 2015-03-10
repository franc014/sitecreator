@extends('layouts.admin.master')
@section('page_title')
    Productos y Servicios
@stop
@section('main_content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" ng-controller="SaleableCtrl">

        <div class="row" >
            <div class="col-md-10 col-lg-10" >
                @include('admin.services.partials._body')


            </div>

        </div>

        <!--/.row-->

        <div class="row" >
            <div class="col-lg-12">

            </div>
        </div>

    </div>	<!--/.main-->

@stop
@section('javascripts')
    @parent




@stop
