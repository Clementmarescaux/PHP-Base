<?php

// Inclure le fichier config/database.php
// Inclure le fichier partials/header.php

require('partials/header.php');

if (!isset($_GET['q']) || empty($_GET['q'])) {
    // Redirection vers la liste des bières
    header('Location: beer_list.php');
    exit();
 }

?> 

<div class="bg bg3">
    <div class="container pt-5">
        <h1>Votre sélection</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <?php
            $q = $_GET['q'];
            echo sprintf('<h2 class="mb-5">Résultat de votre recherche pour : %s</h2>', $q);

            //requête préparée sécurisée
            $query = $db->prepare('SELECT * FROM beer WHERE `name` LIKE :q'); // permet de se prémunir des injection SQL (plutot que query)
            $query->bindvalue(':q', '%'.$q.'%', PDO::PARAM_STR); // on s'assure que l'id est entier
            $query->execute();
            $beer = $query->fetchAll();
    
        ?>
    </div>
</div>
<div class="container">
    <div class="row">
        <?php foreach ($beer as $b) { 
            echo '<div class="col-md-3">';
                echo '<div class="no-border card mb-4">';
                    echo '<img class="beer-img card-img-top d-block m-auto" src="'.$b['image'].'"/>';
                        echo  '<div class="text-center card-body">';
                            echo '<strong>' . $b['name'] . '</strong>';
                                echo '<div><a class="btn" href="beer_single.php?id='.$b['id'].'">Voir +</a></div>';
                            // Ajouter un bouton (a href) "voir +"
                            //Quand on clique dessus, on se rend sur la page beer_single.php 
                            // Il faut que l'URL ressemble à beer_single.php?id=IDdelabiere
                        echo '</div>';
                echo '</div>';
            echo '</div>';
        } ?>
    </div>
</div>

<?php
// inclure le fichier s'occupant des logs
require('utils/logs.php');

// Inclure le fichier partials/footer.php
require('partials/footer.php');
?>