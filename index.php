<?php
session_start();
/*$json = file_get_contents('https://ip.seeip.org/jsonip'); //pour recuperer l'adresse ip
//Decode JSON
$json_data = json_decode($json, true); // pour decoder
$ip = $json_data["ip"]; //la valeur retourner est un dictionnaire, donc j'appelle la cle ip pour recuperer la valeur ip
$ip = trim($ip); // je supprime les espaces avant et apres*/

include_once('modele/connexion.php');
include_once('controlleurs/traitement_login.php');
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
      <h1 class="h3 mb-3 fw-normal text-primary">Se connecter</h1>

      <div class="form-floating">
        <input type="email" class="form-control" id="floatingInput" placeholder="Email" name="mail">
        <label for="floatingInput">Email</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="pass">
        <label for="floatingPassword">Password</label>
      </div>

      <div class="checkbox mb-3">
        <label class="text-danger"> <?php if (isset($message)) {
                                      echo $message;
                                    }  ?> </label>
      </div>
      <button class="w-100 btn btn-lg btn-warning" type="submit" name="connexion">CONNEXION</button>
      <!--p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p-->
    </form>
  </main>



</body>

</html>