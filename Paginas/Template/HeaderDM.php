<div class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><span>Museumlucky</span></a>
        </div>
          
        <div class="collapse navbar-collapse" id="navbar-ex-collapse">
          <ul class="nav navbar-nav">
	    <li><a id="nvValorObras"  href="#">Consultar valor total obras</a></li>
            <li><a id="nvGestionPrestamo"  href="#">Ceder Obras</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li>
              <a><span class="glyphicon glyphicon-user"></span> <?php print $_SESSION['user_name'] ?></a>
            </li>
            <li>
                  <form class="navbar-form navbar-left">
                   <a id="btnCerrarSesion" class="btn btn-danger" href="CerrarSesion.php">
		       <span class="glyphicon" aria-hidden="true"></span>&nbsp;Cerrar sesion
		   </a>
                 </form>  
            </li>
          </ul>
        </div>
      </div>
    </div>
