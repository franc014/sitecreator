@extends('layouts.admin.master')
@section('page_title')
Home
@stop
@section('main_content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" ng-controller="HomeCtrl">
    <!--div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
            <li class="active">Dashboard</li>
        </ol>
    </div--><!--/.row-->

    <div class="row">
        <div class="col-md-8 col-lg-8" >
            <h1 >Panel de control </h1>
            <h2>Bienvenida/o </h2>
            <p>Este es tu panel de control del contenido de tu Sitio Web Personal.
                A continuación, puedes acceder a las diferentes opciones de edición:</p>


            <div alert class="alert alert-success" message="noProfileMsge" ng-show="showAlert">

            </div>
            <div class="row">
                <div class="col-md-6 col-lg-6">
                    <div class="panel panel-default bio-panel" >
                        <div class="panel-heading" >
                            <span class="glyphicon glyphicon-book panel-glyphicon" ></span>Biografía
                        </div>
                        <div class="panel-body">
                            <p>
                                Escribe una breve biografía tuya. Recuerda que no debe ser muy extensa para que
                                los visitantes de tu página no se cansen, y mantengan la atención en la página Web.
                            </p>
                        </div>
                        <div class="panel-footer">
                            <a href="/admin/biography" class="btn btn-info"> Ir a Biografía</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="panel panel-default resume-panel" >
                        <div class="panel-heading" >
                            <span class="glyphicon glyphicon-certificate panel-glyphicon" ></span>Résumé
                        </div>
                        <div class="panel-body">
                            <p> Crea o Edita un résumé. Un résumé es muy similar al Currículum Vítae, pero mucho
                                más práctico. Escribe tu experiencia, estudios, proyectos y habilidades. Si vas a aplicar para
                                algunos trabajos, puedes crear nuevas versiones de tu résumé, incluso a partir de uno ya
                                existente!!
                            </p>
                        </div>
                        <div class="panel-footer">
                            <a href="/admin/resume" class="btn btn-info"> Ir a Résumé</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-6">
                    <div class="panel panel-default services-panel" >
                        <div class="panel-heading" >
                            <span class="glyphicon glyphicon-wrench panel-glyphicon" ></span>Servicios
                        </div>
                        <div class="panel-body">
                            <p>
                                Expone a los usuarios de tu Sitio Web y potenciales clientes, tus productos o servicios.
                            </p>
                        </div>
                        <div class="panel-footer">
                            <a href="/admin/services" class="btn btn-info"> Ir a Servicios</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="panel panel-default projects-panel" >
                        <div class="panel-heading" >
                            <span class="glyphicon glyphicon-briefcase"></span>Proyectos
                        </div>
                        <div class="panel-body">
                            <p>
                                Permite a tus visitantes y potenciales clientes o empleadores, conocer los proyectos en los que has trabajado. Esto es importante pues mediante esta galería puedes mostrar tus habilidades y éxitos adquiridos durante tu vida profesional.
                            </p>
                        </div>
                        <div class="panel-footer">
                            <a href="/admin/projects" class="btn btn-info"> Ir a Proyectos</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-4 col-lg-4">
            <div class="panel panel-blue" style="margin-top: 50px">
                <div class="panel-heading dark-overlay">
                    <span class="glyphicon glyphicon-th"></span>
                    Opciones de contenido <span class="glyphicon glyphicon-info-sign "></span>

                </div>
                <div class="panel-body">
                    <ul class="todo-list">
                        <li class="todo-list-item">
                            <div class="checkbox">
                                <input type="checkbox" id="checkbox" />
                                <label for="checkbox">Biografía</label>
                            </div>

                        </li>
                        <li class="todo-list-item">
                            <div class="checkbox">
                                <input type="checkbox" id="checkbox" />
                                <label for="checkbox">Résumé</label>
                            </div>

                        </li>
                        <li class="todo-list-item">
                            <div class="checkbox">
                                <input type="checkbox" id="checkbox" />
                                <label for="checkbox">Servicios</label>
                            </div>

                        </li>
                        <li class="todo-list-item">
                            <div class="checkbox">
                                <input type="checkbox" id="checkbox" />
                                <label for="checkbox">Proyectos</label>
                            </div>

                        </li>

                    </ul>
                </div>
                <div class="panel-footer">
                    <div class="input-group">

							<span class="input-group-btn">
								<button class="btn btn-primary btn-md" id="btn-todo">Previsualizar Sitio Web</button>
							</span>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">

        </div>
    </div>

</div>	<!--/.main-->
@stop