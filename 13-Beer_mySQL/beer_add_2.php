<?php

require('partials/header.php');

$query = $db->query('SELECT * FROM beer');

$beers= $query->fetchAll();

?>

<div class="bg2">
    <div class="container">
        <h1>Ajouter une bière</h1>
    </div>
</div>



<form action="" method="POST" name="add-beer">
<div class="container pt-5">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
            <?php
            $fields = ['name' => 'Nom', 'degree' => 'Degrés', 'price' => 'Prix'];
            foreach ($fields as $field => $label) { ?>
                <div class="form-group">
                            <label for="<?php echo $field; ?>"><strong><?php echo $label; ?> : </strong></label>
                            <input type="text" class="form-control" id="<?php echo $field;?>" placeholder="Nom de la bière" name="<?php echo $field;?>">
                
            <?php } ?>
            </div>  
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="size"><strong>Format : </strong></label>
                <select class="form-control" id="size" name="size">
                    <option hidden readonly value="">Format de la bière</option>
                    <option value="250">25 cl</option>
                    <option value="330">33 cl</option>
                    <option value="500">50 cl</option>
                    <option value="750">75 cl</option>
                    <option value="1000">1 L</option>
                </select>

                <label for="brand"><strong>Marque : </strong></label>
                <input type="text" class="form-control" list="bieres" id="brand" placeholder="Marque de la bière" name="brand">

                <datalist  id="bieres" name="ebc">
                    <option value="Chimay - 1"></option>
                    <option value="Duvel - 2"></option>
                    <option value="Kwak - 3"></option>
                    <option value="Guiness - 4"></option>
                    <option value="Ch'ti - 5"></option>       
                </datalist>

               <label for="type"><strong>Type : </strong></label>
                <input class="form-control" list="type1" type="text" id="type" placeholder="Couleur de la bière" name="type">
                <datalist  id="type">
                    <option value="Blonde - 1"></option>
                    <option value="Ambrée - 2"></option>
                    <option value="Brune - 3"></option>
                    <option value="Noire - 4"></option>
                </datalist>
            
            </div>
        </div>
    </div>
</div>
<div class="row">
        <div class="col">
            <button id="submit" type="submit" class="btn col">J' ajoute ma bière !</button>
        </div>
    </div>
</form>
<?php
var_dump($_POST); 