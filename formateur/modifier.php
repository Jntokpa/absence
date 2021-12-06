<?php
session_start();
/*$json = file_get_contents('https://ip.seeip.org/jsonip'); //pour recuperer l'adresse ip
//Decode JSON
$json_data = json_decode($json, true); // pour decoder
$ip = $json_data["ip"]; //la valeur retourner est un dictionnaire, donc j'appelle la cle ip pour recuperer la valeur ip
$ip = trim($ip); // je supprime les espaces avant et apres*/

include_once('../modele/connexion.php');
include_once('controlleurs/traitement_modifier.php');
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.84.0">
  <title>Signin Template · Bootstrap v5.0</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">



  <!-- Bootstrap core CSS -->
  <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="assets/dist/css/signin.css" rel="stylesheet">
</head>

<body class="text-center">

  <main class="form-signin">
    <form method="POST" action="">
      <!--img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"-->
      <h1 class="h3 mb-3 fw-normal text-primary">Informations</h1>

      <input type="hidden" class="form-control" name="id" value="<?= $id; ?>">
      <div class="col-md-12">
        <label for="nom" class="form-label">NOM</label>
        <input type="text" class="form-control" id="nom" name="nom" value="<?= $nom; ?>">
      </div>
      <div class="col-md-12">
        <label for="prenom" class="form-label">PRENOMS</label>
        <input type="text" class="form-control" id="prenom" name="prenom" value="<?= $prenom; ?>">
      </div>
      <div class=" col-md-12">
        <label for="sexe" class="form-label">SEXE</label>

        <select id="sexe" class="form-select" name="sexe">
          <?php
          if ($sexe == "M") {
            echo '<option value="">Choisir</option>';
            echo '<option value="M" selected>M</option>';
            echo '<option value="F">F</option>';
          } else {
            if ($sexe == "F") {
              echo '<option value="">Choisir</option>';
              echo '<option value="M">M</option>';
              echo '<option value="F" selected>F</option>';
            } else {
              echo '<option value="">Choisir</option>';
              echo '<option value="M">M</option>';
              echo '<option value="F">F</option>';
            }
          }

          ?>
        </select>
      </div>
      <div class="col-md-12">
        <label for="contact" class="form-label">CONTACT</label>
        <input type="text" class="form-control" id="contact" name="contact" value="<?= $contact; ?>">
      </div>
      <div class=" col-md-12">
        <label for="mail" class="form-label">EMAIL</label>
        <input type="email" class="form-control" id="mail" name="mail" value="<?= $mail; ?>">
      </div>
      <div class=" col-md-12">
        <label for="pass" class="form-label">PASSWORD</label>
        <input type="text" class="form-control" id="pass" name="pass" value="<?= $pass; ?>">
      </div>
      <div class="checkbox mb-3">
      </div>
      <div class=" col-12">
        <button type="submit" class="btn btn-warning" name="modifier">Modifier</button>
        <a href="ajout_apprenant.php" class="btn btn-primary">Retour</a>
      </div>

      <!--p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p-->
    </form>
  </main>



</body>

</html>