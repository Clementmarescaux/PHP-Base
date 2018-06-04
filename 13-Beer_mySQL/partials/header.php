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
    <link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">

    <title>Bière Shop</title>
  </head>
  <body>

  <nav class="navbar navbar-expand-lg navbar-light d-flex fixed-top">
  <div class="container">
    <a class="navbar-brand" href="index.php"><img id="logo" src="img/logo.png"/><strong class="typo-logo">Mon Bière Shop</strong></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse  justify-content-end" id="navbarNav">

        <?php $page = basename($_SERVER['REQUEST_URI'], '.php'); ?>

        <ul class="navbar-nav">
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control my-2 my-sm-0 ml-2" type="search" placeholder="Rechercher sur le site" aria-label="Search">
                <button class="btn ml-2 my-2 my-sm-0 mr-5" type="submit">GO !</button>
            </form>
            <li class="nav-item <?php echo ($page == 'index') ? 'active' : '' ?>">
                <a class="nav-link" href="index.php">Accueil</a>
            </li>
            <li class="nav-item <?php echo ($page == 'beer_list') ? 'active' : '' ?>">
                <a class="nav-link" href="beer_list.php">Les Bières</a>
            </li>
            <li class="nav-item <?php if ($page == 'beer_add') { echo 'active'; } ?>">
                <a class="nav-link" href="beer_add.php">Ajouter une bières</a>
            </li>
            
        </ul>
    </div>
  </div>
</nav>


<?php

// GERER LE ITEM ACTIVE
 // ====> var_dump(basename($_SERVER['REQUEST_URI'], '.php')); 
 // $page = basename($_SERVER['REQUEST_URI'], '.php');
 // sur les li : if ($page == 'beer_add') { echo 'active'; }
 ?>