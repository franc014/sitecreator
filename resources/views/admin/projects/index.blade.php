@extends('layouts.admin.master')
@section('page_title')
    Proyectos, Trabajos, Consultorías
@stop
@section('main_content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main"
         ng-controller="PortfolioCtrl">

        <div class="row" >
            <div class="col-md-10 col-lg-10" >
                @include('admin.projects.partials._body')
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
