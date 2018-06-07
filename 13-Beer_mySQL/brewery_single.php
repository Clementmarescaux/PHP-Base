<?php

// Inclure le fichier config/database.php
// Inclure le fichier partials/header.php
require('partials/header.php');
$id = $_GET['id'];


    $query = $db->prepare('SELECT * FROM brewery WHERE id = :id'); 
    $query->bindvalue(':id', $id, PDO::PARAM_INT); 
    $query->execute();
    $brewery = $query->fetch();

?>

<div class="bg bg5">
    <div class="container pt-5">
        <h1 class="d-flex justify-content-center text-left"><?php echo $brewery['name']; ?></h1>
    </div>
</div>
    <h2>Fiche contact</h2>
    <ul>
        <li class="d-block">Adresse : <?php echo $brewery['address']; ?></li>
        <li class="d-block">Ville : <?php echo $brewery['city']; ?></li>
        <li class="d-block">Code postal : <?php echo $brewery['zip']; ?></li>
        <li class="d-block">Pays : <?php echo $brewery['country']; ?></li>
    </ul>


<?php
// Inclure le fichier partials/footer.php

require('partials/footer.php');