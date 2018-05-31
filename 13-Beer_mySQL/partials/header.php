<?php 
 // Configuration de PDO pour la BDD
 // On utilise la notation absolue pour se repérer
 require(__DIR__.'/../config/database.php');
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    <title>Bière Shop</title>
  </head>
  <body>

  <nav class="navbar navbar-expand-lg navbar-light d-flex">
  <div class="container">
    <a class="navbar-brand" href="#"><strong>Mon Bière Shop</strong></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse  justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="index.php">Accueil</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="beer_list.php">Les Bières</a>
        </li>
        </ul>
    </div>
  </div>
</nav>