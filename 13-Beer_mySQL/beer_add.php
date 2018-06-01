<?php
/*
Créer page beer add
inclure header et footer

titre ajouter une bière
ajout formulaire avec :
    - nom
    - degrés
    - volume
    - prix
    - marque
    - type

    -SUBMIT

Ne pas oublier la méthodse du formulaire
Lorsque le formulaire est soumis récupérer la valeur des champs

*/

require('partials/header.php');

$query = $db->query('SELECT * FROM beer');

$beers= $query->fetchAll();

?>

<div class="bg2">
    <div class="container pt-5">
        <h1>Ajouter une bière</h1>
    </div>
</div>
<?php
    $name = null;
    $degree = null;
    $price =  null;
    $size = null;
    $brand = null;
    $type = null;

    // détecter quand le form est soumis
    // On peut utiliser $_SERVER
    if (!empty($_POST)) {
        $name = $_POST['name']; // Doit faire au moins 3 caractères
        $degree = $_POST['degree']; // Doit faire entre 0 et 20
        $price = $_POST['price']; // Doit faire entre 0.5€ et 99.99€
        $size = $_POST['size']; // Doit faire 250, 330 ou 750
        $brand = $_POST['brand']; // Doit exister dans la base de données
        $type = $_POST['type']; // Doit exister dans la base de données

    

    // Raccourci avec interpolation de variables
    foreach ($_POST as $key => $field) {
        $$key = $field;
    }
}
?>

<form action="" method="POST">
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="name"><strong>Nom : </strong></label>
                <input type="text" class="form-control" id="name" placeholder="Nom de la bière" name="name" value="<?php echo $name ?>">
                <label for="degree"><strong>Degrés : </strong></label>
                <input type="text" class="form-control" id="degree" placeholder="Pourcentage d'alcool" name="degree" value="<?php echo $degree ?>">

                <label for="size"><strong>Format : </strong></label>
                <select class="form-control" id="size" name="size">
                    <option hidden readonly value="">Format de la bière</option>
                    <option <?php if ($size == 250) { echo 'selected'; } ?> value="250">25 cl</option>
                    <option <?php if ($size == 330) { echo 'selected'; } ?> value="330">33 cl</option>
                    <option <?php if ($size == 500) { echo 'selected'; } ?> value="500">50 cl</option>
                    <option <?php if ($size == 750) { echo 'selected'; } ?> value="750">75 cl</option>
                    <option <?php if ($size == 1000) { echo 'selected'; } ?> value="1000">1 L</option>
                </select>
            </div>           
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="price"><strong>Prix : </strong></label>
                <input type="text" class="form-control" id="price" placeholder="En euros" name="price" value="<?php echo $price ?>">

                <label for="brand"><strong>Marque : </strong></label>
                <input type="text" class="form-control" list="brands" id="brand" placeholder="Marque de la bière" name="brand" value="<?php echo $brand; ?>">

                 <datalist  id="brands" name="ebc">
                    <option value="Chimay - 1"></option>
                    <option value="Duvel - 2"></option>
                    <option value="Kwak - 3"></option>
                    <option value="Guiness - 4"></option>
                    <option value="Ch'ti - 5"></option>       
                </datalist>

                <label for="type"><strong>Type : </strong></label>
                <input class="form-control" list="types" type="text" id="type" placeholder="Couleur de la bière" name="type" value="<?php echo $type; ?>">
                <datalist  id="types">
                    <option value="Blonde - 1"></option>
                    <option value="Ambrée - 2"></option>
                    <option value="Brune - 3"></option>
                    <option value="Noire - 4"></option>
                </datalist>
            </div>    
        </div>
    </div>
    <div class="row">
        <div class="col">
            <button id="submit" type="submit" class="btn col">J' ajoute ma bière !</button>
        </div>
    </div>
</div>
</form>
<?php


    if (!empty($_POST)) {
    // Définir un tableau d'erreur vide qui va se remplir après chaque erreur
    $errors=  [];
   
    if (strlen($name) < 3) {
       $errors['name'] = 'Doit faire au moins 3 caractères';     
       
    }
    if ($degree > 20 OR $degree < 0 OR !is_numeric($price)) {
        $errors['degree'] = 'Doit faire entre 0 et 20';     
        
     }
     if ($price >= 100 OR $price < 0.5 OR !is_numeric($price)) {
        $errors['price'] = 'Doit faire entre 0.5€ et 99.99€';     
      
     }
     if (!in_array($size, [250, 330, 500, 750, 1000])) { // revient à faire : $size != 250 AND $size != 500 AND $size != 750 AND $size != 330 AND $size != 1000
        $errors['size'] = 'Merci de sélectionner un format.';        
     } 
     
     $brand_id = intval(substr($brand, -1));
    
   
     $query = $db->prepare('SELECT * FROM brand WHERE id = :id');
     $query->bindvalue(':id', $brand_id, PDO::PARAM_INT);
     $query->execute();
     $brand = $query->fetch();
    


     if (!$brand) {
        $errors['brand'] = ' la marque n\'est pas connue dans la base de donnée';
   
     }

     $type_id = intval(substr($type, -1));

     $query = $db->prepare('SELECT * FROM ebc WHERE id = :id');
     $query->bindvalue(':id', $type_id, PDO::PARAM_INT);
     $query->execute();
     $type = $query->fetch();
    

     if (!$type) {
        $errors['type'] = 'le type n\'est pas connue dans la base de donnée';     
        
         
     }
     var_dump($errors);  

     // S'il n'y a pas d'erreur dans le formulare
     if (empty($errors)) {
        $query = $db->prepare('
        INSERT INTO beer (`name`, degree, size, `image`, price, brand_id, ebc_id)
        VALUES (:name, :degree, :size, :image, :price, :brand_id, :ebc_id)
        ');
        $query->bindvalue(':name', $name, PDO::PARAM_STR);
        $query->bindvalue(':degree', $degree, PDO::PARAM_STR);
        $query->bindvalue(':size', $size, PDO::PARAM_INT);
        $query->bindvalue(':image', 'img/chimay-chimay-blanche.jpg', PDO::PARAM_STR);
        $query->bindvalue(':price', $price, PDO::PARAM_STR);
        $query->bindvalue(':brand_id', $brand_id, PDO::PARAM_INT);
        $query->bindvalue(':ebc_id', $type_id, PDO::PARAM_INT);

        if($query->execute()) { // On insère la bière dans la BDD
            echo '<div class="alert alert-success">La bière a bien été ajoutée.</div>';
        } 


      
     }
}
// vérifier les champs


// var_dump($_POST); 
require('partials/footer.php');