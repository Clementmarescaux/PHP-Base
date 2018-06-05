<?php

// Inclure le fichier config/database.php
// Inclure le fichier partials/header.php

require('partials/header.php');

$id = $_GET['id'];
    
//requête préparée sécurisée
$query = $db->prepare('SELECT * FROM beer WHERE id = :id'); // permet de se prémunir des injection SQL (plutot que query)
$query->bindvalue(':id', $id, PDO::PARAM_INT); // on s'assure que l'id est entier
$query->execute();
$beer = $query->fetch();
$countSQL++;

// Récupérer la marque de la bière
$query = $db->query('SELECT * FROM brand WHERE id = '.$beer['brand_id']);
$brand = $query->fetch();
$countSQL++;


$query = $db->prepare('SELECT * FROM ebc WHERE id = :id'); // permet de se prémunir des injection SQL (plutot que query)
$query->bindvalue(':id', $beer['ebc_id'], PDO::PARAM_INT); 
$query->execute();
$ebc = $query->fetch();
$countSQL++;

?>
<!-- Le contenu de la page -->
<div class="head">
    <div class="container">
        <h1 class="d-flex justify-content-end text-left">
            <?php echo 'La ' . $beer['name']; ?>           
        </h1>        
    </div>   
</div>
<div class="container">
    <div class="row">
                <div class="col-md-6">
            <?php echo '<img class="img-fluid" src="'.$beer['image'].'"/>'; ?>
                </div>
                <div class="col-md-6">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Nom : </strong> <?php echo $beer['name']; ?></li>
                        <li class="list-group-item"><strong>Degrés : </strong><?php echo $beer['degree']; ?> </li>
                        <li class="list-group-item"><strong>Volume : </strong><?php echo $beer['size'] / 10; ?> cl</li>
                        <li class="list-group-item"><strong>Prix : </strong><?php echo $beer['price']; ?> €</li>
                        <li class="list-group-item"><strong>Marque : </strong><?php echo $brand['name']; ?></li>
                        <li class="list-group-item" >
                                <?php
                                    $type = null;
                                    switch ($ebc['code']) {
                                        case 4 :
                                        $type = 'Blonde';
                                        break;
                                        case 26 :
                                        $type = 'Brune';
                                        break;
                                        case 39 :
                                        $type = 'Ambrée';
                                        break;
                                        case 57 :
                                        $type = 'Noire';
                                        break;
                                    }


                                ?>
                            <strong> Type : </strong>
                            <?php echo $type; ?>
                            <span class="d-inline-block float-right" style="background-color: #<?php echo $ebc['color']; ?>; width: 200px; height: 25px; border-radius: 30px;"></span>
                        </li>
                    </ul>
                </div>


    </div>
</div>
<?php
// Inclure le fichier partials/footer.php

require('partials/footer.php');