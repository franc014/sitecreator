<div ng-show="!showDetails">
    <h4>
        <!--span class="intro-text pull-right">
            A continuación se presentan todos los servic
        </span-->
    </h4>
    <div alert class="alert alert-info " msge="result" ng-show="showNoItemsAlert"></div>
    <div alert class="alert alert-{{result.result}} message" msge="result.message" ng-show="ShowResultAlert"></div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>Listado:   </h4>

        </div>
        <div class="panel-body">
            <table class="table table-responsive" data-toggle="table"  >
                <thead>
                <tr>
                    <th data-field="title" data-align="right">Título</th>
                    <th data-field="description">Descripción</th>
                    <th data-field="detail"></th>
                    <th data-field="delete"></th>
                </tr>
                </thead>
                <tbody ng-repeat="saleable in saleables">
                    <tr >
                        <td ng-bind="saleable.title"></td>
                        <td >
                            <span ng-bind-html="saleable.description | limitTo : 148 : 0"></span>
                            <a href="" ng-click="editDetails(saleable)" ng-if="saleable.description.length >= 148">Ver todo...</a>
                        </td>
                        <td><a href="" ng-click="editDetails(saleable)" data-icon="&#xe606">Detalle</a></td>
                        <td><a href="" ng-click = "removeSaleable(saleable)" data-icon="&#xe6ac">Eliminar</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <hr>
</div>

