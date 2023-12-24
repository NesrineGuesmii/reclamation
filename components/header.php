<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Reclamation</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Accueil <span class="sr-only">(current)</span></a>
      </li>
     
    </ul>
    <form class="form-inline my-2 my-lg-0" action="Traitement/logout.php" method="POST">
        <div class="dropdown mr-3">
            <button class="btn btn-secondary " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?= session_data(); ?>
            </button>
            
        </div>
      <button class="btn btn-danger my-2 my-sm-0" type="submit">Déconnexion</button>
    </form>
  </div>
</nav>