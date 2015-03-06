<div class="row">
    <h1 class="col-sm-7">Productos y Servicios </h1>
    <span class="col-sm-5 pull-right top-new-button" >
        <a href="" ng-click="newDetails()"
             class="btn btn-md btn-success pull-right">Nuevo Producto o Servicio</a>
    </span>
</div>
<hr>
<div >
    <div class="row" >
        <div class="col-md-12 col-lg-12">
            @include('admin.services.partials._saleables_list')
        </div>
    </div>
    <div class="row" >
        <div class="col-md-12 col-lg-12" >
            <div saleable-details ng-show="showDetails"></div>
        </div>
    </div>
</div>

