
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" >

    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/admin/home">
                <img width="25" height="25" src="{{$loggedUser['photo']}}" /> {{$loggedUser['username']}}</a>
            <ul class="user-menu" >
                <li class="dropdown pull-right">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> Cuenta <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="/admin/profile"><span class="glyphicon glyphicon-user"></span> Perfil</a></li>
                        <li><a href="/admin/configuration"><span class="glyphicon glyphicon-cog"></span> Configuración</a></li>
                        <li><a href="/auth/logout"><span class="glyphicon glyphicon-log-out"></span> Salir</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div><!-- /.container-fluid -->
</nav>