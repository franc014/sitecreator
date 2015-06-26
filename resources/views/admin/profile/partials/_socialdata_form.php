<div >
    <h4>Perfiles de redes sociales: <span class="intro-text pull-right"><a href="#profile-options" data-icon="&#xe741"></a></span></h4>
    <span class="intro-text"></span>
    <form role="form"  id="socialForm" name="socialForm" ng-submit="updateSocialInfo()"  >
        <div alert class="alert alert-danger" msge="result" ng-show="ShowServerErrors"></div>
        <ul class="list-group" ng-repeat="(key, value) in errors">
            <li class="list-group-item list-group-item-danger"> {{value[0]}} </li>
        </ul>

        <div ng-class="{'alert alert-success': has_success}" ng-bind="success_msg"></div>

        <div class="row">
            <div class="form-group col-sm-6" ng-class="{'has-error':errorBody}">
                <label class="control-label" for="facebook">Facebook </label><br>
                <div >
                    <input class="form-control" type="text" id="facebook" ng-model="profile.facebook" >
                </div>
            </div>
            <div class="form-group col-sm-6" ng-class="{'has-error':errorBody}">
                <label class="control-label" for="twitter">Twitter</label><br>
                <div >
                    <input class="form-control" type="text" id="twitter" ng-model="profile.twitter" >
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-6" ng-class="{'has-error':errorBody}">
                <label class="control-label" for="phone">Tumblr </label><br>
                <div >
                    <input class="form-control" type="text" id="tumblr" ng-model="profile.tumblr" >
                </div>
            </div>
            <div class="form-group col-sm-6" ng-class="{'has-error':errorBody}">
                <label class=" control-label" for="pinterest">Pinterest</label><br>
                <div >
                    <input class="form-control" type="text" id="pinterest" ng-model="profile.pinterest" >
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-6" ng-class="{'has-error':errorBody}">
                <label class="control-label" for="gplus">Google Plus </label><br>
                <div >
                    <input class="form-control" type="text" id="gplus" ng-model="profile.gplus" >
                </div>
            </div>
            <div class="form-group col-sm-6" ng-class="{'has-error':errorBody}">
                <label class="control-label" for="youtube">YouTube </label><br>
                <div >
                    <input class="form-control" type="text" id="youtube" ng-model="profile.youtube" >
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-6" ng-class="{'has-error':errorBody}">
                <label class="control-label" for="dribble">Dribbble </label><br>
                <div >
                    <input class="form-control" type="text" id="dribbble" ng-model="profile.dribbble" >
                </div>
            </div>
            <div class="form-group col-sm-6" ng-class="{'has-error':errorBody}">
                <label class="control-label" for="picassa">Picassa </label><br>
                <div >
                    <input class="form-control" type="text" id="picassa" ng-model="profile.picassa" >
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-sm-6" ng-class="{'has-error':errorBody}">
                <label class="control-label" for="instagram">Instagram </label><br>
                <div >
                    <input class="form-control" type="text" id="instagram" ng-model="profile.instagram" >
                </div>
            </div>
            <div class="form-group col-sm-6" ng-class="{'has-error':errorBody}">
                <label class="control-label" for="flickr">Flickr </label><br>
                <div >
                    <input class="form-control" type="text" id="flickr" ng-model="profile.flickr" >
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-6" ng-class="{'has-error':errorBody}">
                <label class="control-label" for="github">GitHub </label><br>
                <div >
                    <input class="form-control" type="text" id="github" ng-model="profile.github" >
                </div>
            </div>
            <div class="form-group col-sm-6" ng-class="{'has-error':errorBody}">
                <label class="control-label" for="linkedin">Linked In </label><br>
                <div >
                    <input class="form-control" type="text" id="linkedin" ng-model="profile.linkedin" >
                </div>
            </div>

        </div>
        <div class="row">
            <div class="form-group col-sm-6" ng-class="{'has-error':errorBody}">
                <label class="control-label" for="treehouse">Treehouse </label><br>
                <div >
                    <input class="form-control" type="text" id="treehouse" ng-model="profile.treehouse" >
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

