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
    <script src="/js/admin/jquery.ui.widget.js"></script>
    <script src="/js/admin/jquery.fileupload.js"></script>
    <!--script >var imageLoadPath = "/profile/uploadedlogo";</script-!!>
    <script src="/js/admin/fileUploads.js"></script>

@stop
