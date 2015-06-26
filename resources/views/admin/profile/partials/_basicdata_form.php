<hr>
<div >
    <h4>Información básica:<span class="intro-text pull-right"><a href="#profile-options" ></a></span></h4>

    <form  role="form"  id="postForm" name="postForm" ng-submit="updateUser()"  >
        <div alert class="alert alert-danger" msge="result" ng-show="ShowServerErrors"></div>
        <div alert class="alert alert-{{result.result}} message"
             msge="result.message" ng-show="ShowResultAlert"
             >

        </div>
        <ul class="list-group" ng-repeat="(key, value) in errors">
            <li class="list-group-item list-group-item-danger"> {{value[0]}} </li>
        </ul>

        <div ng-class="{'alert alert-success': has_success}" ng-bind="success_msg"></div>

        <div class="row">
            <div class="form-group col-sm-12" ng-class="{'has-error':errorBody}">
                <label class="control-label" for="username">Nombre de usuario</label><br>
                <div >
                    <input class="form-control" type="text" id="username" ng-model="user.username" required>
                </div>
            </div>
        </div>
        <!--div class="form-group" ng-class="{'has-error':errorBody}">
            <label class="col-sm-2 control-label" for="password">Cambio de contraseña</label><br>
            <div class="col-sm-10">
                <input class="form-control" type="password" id="password" ng-model="user.password" required>
            </div>
        </div-->
        <div class="row">
            <div class="form-group col-sm-12" ng-class="{'has-error':errorBody}">
                <label class=" control-label" for="email">Email</label><br>
                <div >
                    <input class="form-control" type="text" id="email" ng-model="user.email" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-sm-12" >
                <div class="col-sm-4"><button type="submit" class="btn btn-primary"  >Guardar</button></div>
                <div class="col-sm-offset-4 col-sm-4 "><a href="" ng-click = "showPasswordChange=true"  >Cambiar contraseña</a></div>
            </div>
        </div>
    </form>
    <hr>
</div>

