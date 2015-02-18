<h1 >Panel de control </h1>
<hr>
<h2>Bienvenida/o <span ng-bind="user.username"></span></h2>

<p>Este es tu panel de control del contenido de tu Sitio Web Personal.
    A continuación, puedes acceder a las diferentes opciones de edición:</p>


<!--div alert class="alert alert-success" msge="noProfileMsge" ng-show="showAlert"></div-->


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