<div ng-controller="BioCtrl">
    <h4>Detalle:</h4>
    <span class="intro-text">Escribe tu biografía. Si lo requieres, puedes sustituirla
    como un Cover Letter para presentarte a un empleador o socio:</span>


    <form role="form" ng-fab-form-options="customFormOptions" id="postForm" name="postForm" ng-submit="updateBio()"  >


        <div ng-class="{'alert alert-success': has_success}" ng-bind="success_msg"></div>

        <div class="form-group" ng-class="{'has-error':errorBody}">

        <textarea required id="body" name="body" class="form-control" rows="20" ng-model="profile.biography"
              placeholder="Ingresa la descripción aquí"></textarea>
            <span class="help-block" ng-show="errorBody" ng-bind="errorBody"></span>
        </div>
        <div alert class="alert alert-{{result.result}}" msge="result.message" ng-show="ShowResultAlert"></div>
        <div class="form-group" >
            <button type="submit" class="btn btn-primary" ng-disabled="disableSaveButton" >Guardar</button>

        </div>
    </form>
    <hr>
</div>

