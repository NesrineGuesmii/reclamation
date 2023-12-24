<?php
require "./Traitement/auth.php" ; 
force_user_est_connecter();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Soft UI Dashboard by Creative Tim
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body class="g-sidenav-show  bg-gray-100">

  <?php include('./components/header.php'); ?>

  <?php include('./Traitement/reclamation_get.php'); ?>

  <div class="container p-5">

    <?php if (!empty($_GET)) { ?>
        <?php if (isset($_GET['warning'])) { ?>
                  <div class="alert alert-warning mb-5">
                    <?= $_GET['warning'] ?>
                  </div>
        <?php } ?>
    <?php } ?>


    <?php if ($_GET &&  isset($_GET['success'])) { ?>
                  <div class="alert alert-success mb-5">
                    <?= $_GET['success'] ?>
                  </div>
    <?php } ?>

    <h1 class="mb-5">Liste des réclamations
      <button class="btn btn-sm btn-primary" style="float:right;" data-toggle="modal" data-target="#exampleModal">Créer réclamation</button>
    </h1>
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Titre</th>
          <th scope="col">Description</th>
          <th scope="col">Date de création</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($result as $value) { ?>        
          <tr>
            <th scope="row"><?= $value['id']?></th>
            <td><?= make_encryption("dec", $_SESSION["user_role"], $value['titre']) ?></td>
            <td><?= make_encryption("dec", $_SESSION["user_role"], $value['description']) ?></td>
            <td><?= make_encryption("dec", $_SESSION["user_role"], $value['date_creation']) ?></td>
          </tr>
          <?php } ?>        
      </tbody>
    </table>
  </div>





  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<form action="./Traitement/reclamation.php" method="POST">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Formulaire de Création</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          
        <div class="p-2">
          <h3 class="mb-4">Création de la réclamation</h3>
          <div class="form-group">
            <label for="exampleFormControlInput1">Titre de la réclamation</label>
            <input type="text" name="titre"  class="form-control" id="exampleFormControlInput1" placeholder="Ex: mon_titre">
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Description</label>
            <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>

          <input type="hidden" name="date_creation" value="<?= date("Y-m-d"); ?>">
        
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
      </div>
    </div>
  </div>
  </form>
</div>





  <script src="./assets/js/core/popper.min.js"></script>
  <script src="./assets/js/core/bootstrap.min.js"></script>
  <script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="./assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
