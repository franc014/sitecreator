<hr>
<div >
    <h4>Contenidos y navegación:<span class="intro-text pull-right"></span></h4>

    <div alert class="alert alert-{{result.result}} message"
         msge="result.message" ng-show="ShowResultAlert"
        >

    </div>
    <form  class = "content-form-edit" ng-show="showEditContentItem" role="form"  id="userContentForm" name="userContentForm" ng-submit="updateUserContent()"  >
        <h3>Editando {{content.contenttype.type}}</h3>
        <div alert class="alert alert-danger" msge="result" ng-show="ShowServerErrors"></div>

        <ul class="list-group" ng-repeat="(key, value) in errors">
            <li class="list-group-item list-group-item-danger"> {{value[0]}} </li>
        </ul>

        <div ng-class="{'alert alert-success': has_success}" ng-bind="success_msg"></div>

        <div class="row">
            <div class="form-group col-sm-12">
                <label class="control-label" for="menualias">Nombre en menú</label><br>
                <div >
                    <input class="form-control" type="text" id="menualias" ng-model="content.menualias" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-sm-12">
                <label class="control-label" for="pagetitle">Título de la Página</label><br>
                <div >
                    <input class="form-control" type="text" id="pagetitle" ng-model="content.pagetitle" ng-maxlength="70" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-sm-12">
                <label class="control-label" for="pagedescription">Descripión de la Página</label><br>
                <div >
                    <textarea rows="6" class="form-control" type="text" id="pagedescription"  ng-maxlength="160" ng-model="content.pagedescription" required></textarea>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-sm-12">
                <label class="control-label" for="ashome">Establecer como home</label><br>
                <div >
                    <input  type="checkbox" id="ashome" ng-checked="content.ishome"
                            ng-model="content.ishome"/>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-sm-12" >
                <div class="col-sm-4"><button type="submit" class="btn btn-primary"  >Guardar</button></div>
                <div class="col-sm-4"><a href="" ng-click="showEditContentItem=false">Cancelar</a></div>
            </div>
        </div>
    </form>
    <hr>
    <table class="table table-responsive" data-toggle="table"  >
        <thead>
        <tr>
            <th data-field="content">Contenido</th>
            <th data-field="alias">Nombre de menú</th>
            <th data-field="deactivate">Activar/Desactivar</th>
            <th data-field="putashome">Establecer como Home</th>
        </tr>
        </thead>
        <tbody ng-repeat="content in usercontenttypes">

            <tr ng-class="{'is-home-tag': content.ashome==1,
            'is-content-disbled-tag':content.active==0}">

                <td  ng-bind="content.contenttype.type"></td>
                <td ng-bind="content.menualias"></td>


                <td>
                    <div ng-if="content.ashome!=1" class="checkbox data-grid-checkbox" >
                        <input type="checkbox" id="deactivate" ng-click="changeStateContent($event,content)"
                               ng-checked="content.activebool" ng-model="content.activebool"
                                />

                    </div>
                </td>
                <td>
                    <div ng-if="content.ashome!=1 && content.active==1 " class="checkbox data-grid-checkbox" >
                        <input  type="checkbox" id="tohome" ng-checked="content.ishome"
                                    ng-model="content.ishome" ng-click="setAsHome($event,content)"/>

                    </div>
                </td>
                <td><a href="" ng-if="content.activebool" ng-click="editUserContent(content)" data-icon="&#xe606">Editar</a></td>
            </tr>

        </tbody>
    </table>
    <div class="row content-tag-description" >
        <div class="col-sm-12">
            Identificadores:
            <span class="label is-home-tag" >Contenido como Página principal (Home)</span>
            <span class="label is-content-disbled-tag" >Contenido Inactivo</span>
            <span class="label is-content-enabled-tag" >Contenido Activo</span>
        </div>
    </div>
</div>

