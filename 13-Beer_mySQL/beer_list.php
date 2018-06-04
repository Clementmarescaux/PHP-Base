<?php

// Inclure le fichier config/database.php
// Inclure le fichier partials/header.php

require('partials/header.php');

$query = $db->query('SELECT * FROM beer');

$beers= $query->fetchAll();

// var_dump($beers);
?>
<!-- Le contenu de la page -->
<div class="bg2">
    <div class="container pt-5">
        <h1>La bière list</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <?php foreach ($beers as $beer) { 
            echo '<div class="col-md-3">';
                echo '<div class="no-border card mb-4">';
                    echo '<img class="beer-img card-img-top d-block m-auto" src="'.$beer['image'].'"/>';
                        echo  '<div class="text-center card-body">';
                            echo '<strong>' . $beer['name'] . '</strong>';
                                echo '<div><a class="btn" href="beer_single.php?id='.$beer['id'].'">Voir +</a></div>';
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
// Inclure le fichier partials/footer.php

require('partials/footer.php');