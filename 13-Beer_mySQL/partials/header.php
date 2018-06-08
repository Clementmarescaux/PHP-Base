<?php 
 // Configuration de PDO pour la BDD
 // On utilise la notation absolue pour se repérer
 session_start();
 require(__DIR__.'/../config/database.php');
 require(__DIR__.'/../config/functions.php');

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css"/>
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

        <form method="GET" action="search.php" class=" form-inline my-2 my-lg-0">
                <input name="q" class="d-none d-lg-inline-block form-control my-2 my-sm-0 ml-2" type="search" placeholder="Rechercher sur le site" aria-label="Search">
                <button class="d-none d-lg-inline-block btn ml-2 my-2 my-sm-0 mr-5" type="submit" value="SAISIE">GO !</button>
        </form>
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle <?php echo ($page == 'beer_list' || $page == 'beer_add') ? 'active' : '' ?>" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Bières</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="beer_list.php">Bières list</a>
                    <a class="dropdown-item" href="beer_add.php">Ajouter une bière</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle <?php echo ($page == 'brewery_list' || $page == 'brewery_add') ? 'active' : '' ?>" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Brasseries</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="brewery_list.php">Les brasseries</a>
                    <a class="dropdown-item" href="brewery_add.php">Ajouter une brasserie</a>
                </div>
            </li>
            
            <?php
                if (empty($_SESSION['user'])) { 
                    ?>
                    <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle <?php echo ($page == 'register') || $page == 'login' ? 'active' : '' ?>" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Utilisateur</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="register.php">Inscription</a>
                    <a class="dropdown-item" href="login.php">Login</a>
                </div>
                </li> 
                <?php } else { ?>
                    <span class="navbar-text d-none d-xl-inline-block">
                        <strong class="welcomeLogin">
                            <?php echo ('Bonjour ' . $_SESSION['user']['login']); ?>
                        </strong>
                     </span>
                    <li class="nav-item <?php echo ($page == 'logout') ? 'active' : '' ?>">
                        <a class="nav-link" href="logout.php">Se déconnecter <i class="fa fa-sign-out" aria-hidden="true"></i></a>
                    </li>
                    
               <?php } ?>

        </ul>
    </div>
  </div>
</nav>


<?php
// echo ('<br/ ><br/> <br/> <br/ > <br/>');
// var_dump($_SESSION);
 // var_dump($_SERVER['HTTP_REFERER']);
// GERER LE ITEM ACTIVE
 // ====> var_dump(basename($_SERVER['REQUEST_URI'], '.php')); 
 // $page = basename($_SERVER['REQUEST_URI'], '.php');
 // sur les li : if ($page == 'beer_add') { echo 'active'; }
 ?>