<div >
    <h4>Datos personales: <span class="intro-text pull-right"><a href="#profile-options" data-icon="&#xe741"></a></span></h4>
    <span class="intro-text"></span>
    <form role="form"  id="personalForm" name="personalForm" ng-submit="updatePersonalInfo()"  >
        <div alert class="alert alert-danger" msge="result" ng-show="ShowServerErrors"></div>

        <ul class="list-group" ng-repeat="(key, value) in errors">
            <li class="list-group-item list-group-item-danger"> {{value[0]}} </li>
        </ul>

        <div ng-class="{'alert alert-success': has_success}" ng-bind="success_msg"></div>

        <div class="row">
            <div class="form-group col-sm-6" ng-class="{'has-error':errorBody}">
                <label class="control-label" for="firstname">Nombres </label><br>
                <div >
                    <input class="form-control" type="text" id="firstname" ng-model="profile.firstname" required>
                </div>
            </div>
            <div class="form-group col-sm-6" ng-class="{'has-error':errorBody}">
                <label class="control-label" for="lastname">Apellidos</label><br>
                <div >
                    <input class="form-control" type="text" id="lastname" ng-model="profile.lastname" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-6" ng-class="{'has-error':errorBody}">
                <label class="control-label" for="phone">Teléfono </label><br>
                <div >
                    <input class="form-control" type="phone" id="phone" ng-model="profile.phone" required>
                </div>
            </div>
            <div class="form-group col-sm-6" ng-class="{'has-error':errorBody}">
                <label class=" control-label" for="cellular">Celular</label><br>
                <div >
                    <input class="form-control" type="phone" id="cellular" ng-model="profile.cellular" required>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="form-group col-sm-12" ng-class="{'has-error':errorBody}">
                <label class="control-label" for="address">Dirección</label><br>
                <div>
                    <textarea class="form-control" id="address" ng-model="profile.address" required></textarea>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-sm-4" ng-class="{'has-error':errorBody}">
                <label class="control-label" for="country">País: </label><br>
                <div >
                    <input class="form-control" type="text" id="country" ng-model="profile.country" required>
                </div>
            </div>
            <div class="form-group col-sm-4" ng-class="{'has-error':errorBody}">
                <label class=" control-label" for="state">Estado (Provincia): </label><br>
                <div >
                    <input class="form-control" type="text" id="state" ng-model="profile.state" required>
                </div>
            </div>
            <div class="form-group col-sm-4" ng-class="{'has-error':errorBody}">
                <label class="control-label" for="city">Ciudad: </label><br>
                <div >
                    <input class="form-control" type="text" id="city" ng-model="profile.city" required>
                </div>
            </div>
        </div>



        <div class="row">
            <div class="form-group col-sm-12" >
                <div class="col-sm-4 pull-left">
                    <button type="submit" class="btn btn-primary"  >Guardar</button>
                </div>
            </div>
        </div>
    </form>
    <hr>
</div>

