<div >
    <h4>Cambiar contraseña: <span close-content remove="showPasswordChange=false"></span></h4>

    <span class="intro-text"></span>

    <form class="form-horizontal" role="form"  id="passForm" name="passForm" ng-submit="updatePassword()"  >
        <div alert class="alert alert-{{result.result}}" msge="result.message" ng-show="ShowResultAlert"></div>
        <div alert class="alert alert-danger" msge="result" ng-show="ShowServerErrors"></div>

        <ul class="list-group" ng-repeat="(key, value) in errors">
            <li class="list-group-item list-group-item-danger"> {{value[0]}} </li>
        </ul>

        <div ng-class="{'alert alert-success': has_success}" ng-bind="success_msg"></div>

        <div class="form-group" ng-class="{'has-error':errorBody}">
            <label class="col-sm-2 control-label" for="password">Nueva Contraseña</label><br>
            <div class="col-sm-10">
                <input class="form-control" type="password" id="password" ng-model="password" required>
            </div>
        </div>
        <div class="form-group" >
            <div class="col-sm-offset-2 col-sm-4"><button type="submit" class="btn btn-primary"  >Guardar</button></div>
            <div class="col-sm-offset-2 col-sm-4 "><a href="" ng-click = "showPasswordChange=false"  >Cancelar</a></div>
        </div>
    </form>
    <hr>
</div>

