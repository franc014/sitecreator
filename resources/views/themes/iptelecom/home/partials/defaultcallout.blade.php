<div>

    <div class="row">

        <div class="col-sm-12 col-md-12">
            <div class="home-jumbotron" >
                <p >
                    Conoce nuestros servicios

                </p>
                <div class="home-jumbotron-callouts">
                    @if($isDedicated)

                        <a data-icon="&#xe6ae" href="/productos_servicios" class="btn
                            btn-default btn-lg btn-warning
                            ">Servicios</a>
                        <a data-icon="&#xe645" href="/contacto" class="btn btn-default
                             btn-lg btn-success
                            ">Contactar</a>
                    @else
                        <a data-icon="&#xe6ae" href="/{{$profile->user->username}}/productos_servicios" class="btn btn-default btn-lg btn-warning col-sm-offset-1 col-sm-4 col-md-4">Servicios</a>
                        <a data-icon="&#xe645" href="/contacto" class="btn btn-default btn-lg btn-success col-sm-offset-1 col-sm-4 col-md-4">Contactar</a>
                    @endif
                </div>
            </div>

        </div>

    </div>
</div>