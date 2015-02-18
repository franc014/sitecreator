@extends('layouts.admin.master')
@section('page_title')
    Biografía
@stop
@section('main_content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" ng-controller="HomeCtrl">
        <!--div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
                <li class="active">Dashboard</li>
            </ol>
        </div--><!--/.row-->

        <div class="row" >
            <div class="col-md-8 col-lg-8" >
                @include('admin.biography.partials._body')
            </div>

        </div>
        <div class="col-md-4 col-lg-4">
            <div content-selector></div>
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
    <script src="/js/admin/jquery.ui.widget.js"></script>
    <script src="/js/admin/jquery.fileupload.js"></script>
    <script src="/js/admin/fileUploads.js"></script>

@stop
