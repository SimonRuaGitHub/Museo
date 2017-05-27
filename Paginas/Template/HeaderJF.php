<div class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <ul class="nav navbar-nav navbar-left">
            <a class="navbar-brand" href="#"><span>MuseumLucky</span></a>
            <li>
                <a href="RestauracionMuseo.php">Registrar Restaurador</a>
            </li>
            <li>
                <a href="ListadoRestauradores.php">Mantenimiento registros</a>
            </li>
          </ul>
        </div>
        <div class="collapse navbar-collapse" id="navbar-ex-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li>
                <a href="#"><span class="glyphicon glyphicon-user"></span> <?php print $_SESSION['user_name'] ?></a>
            </li>
            <li>
              <form class="navbar-form navbar-left">
                <a id="btnCerrarSesion" class="btn btn-danger" href="CerrarSesion.php">
                   <span class="glyphicon glyphicon-triangle-left" aria-hidden="true"></span> Cerrar sesion
                </a>
             </form>  
            </li>
          </ul>
        </div>
      </div>
    </div>

