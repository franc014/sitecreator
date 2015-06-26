
<div>
    <div class="panel panel-default">
        <div class="panel-body" style="background-color: #2C3E50">
            <div class="row">
                <div class="col-sm-6 col-md-6">
                    <h4>Versión Actual:
                        <span>ACME</span>
                        <a href="" ng-click="showResumeForm=true"><span data-icon="&#xe605"></span></a>
                        <a href="" ng-click="deleteResume()"><span data-icon="&#xe6ac"></span></a>
                    </h4>
                    <h4>Fecha de creación: <span>2015-06-01</span></h4>
                </div>
                <div class="col-sm-6 col-md-6">
                    <h4>Editar Otra versión:
                        <select>
                            <option>uno</option>
                            <option>dos</option>
                        </select>
                    </h4>
                    <button class="btn btn-md btn-success" ng-click="showResumeForm=true" ng-show="!showResumeForm">Nuevo Résumé</button>

                </div>
            </div>
            <div class="row" ng-show="showResumeForm">
                <div class="col-sm-12 col-md-12">
                    <form role="form"  id="Form" name="postForm" ng-submit="updateUser()" class="content-form-edit">
                        <div class="row">
                            <div class="form-group col-sm-12" ng-class="{'has-error':errorBody}">
                                <label class="control-label" for="resumename">Nombre de la versión</label><br>
                                <div >
                                    <input class="form-control" type="text" id="resumename" ng-model="user.username" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-sm-12" >
                                    <div class="col-sm-4"><button type="submit" class="btn btn-primary"  >Guardar</button></div>
                                    <div class="col-sm-offset-4 col-sm-4 "><a href="" ng-click = "showResumeForm=false"  >Cancelar</a></div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>




</div>



