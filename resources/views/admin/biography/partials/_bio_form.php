<div ng-controller="BioCtrl">
    <h4>Detalle:</h4>
    <span class="intro-text">Escribe tu biografía. Si lo requieres, puedes sustituirla
    como un Cover Letter para presentarte a un empleador o socio:</span>
    <hr>

    <form role="form"  id="postForm" name="postForm" ng-submit="updateBio()"  >



        <div ng-class="{'alert alert-success': has_success}" ng-bind="success_msg"></div>

        <div class="form-group" ng-class="{'has-error':errorBody}">


            <text-angular placeholder="Ingresa la descripción aquí" ng-model="profile.biography" id="body" name="body" required></text-angular>
            <span class="help-block" ng-show="errorBody" ng-bind="errorBody"></span>
        </div>
        <div alert class="alert alert-{{result.result}}" msge="result.message" ng-show="ShowResultAlert"></div>
        <div class="form-group" >
            <button type="submit" class="btn btn-primary" ng-disabled="disableSaveButton" >Guardar</button>
            <!--a href="" class="pull-right">Previsualizar Biografía</a-->
        </div>
    </form>
    <hr>
</div>

