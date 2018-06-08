<?php


require('partials/header.php');

?>
<div class="head">
    <div class="container pt-5">
        <h1 class="d-flex justify-content-center text-left">Éditer la brasserie</h1>
        
    </div>
</div>
<?php
if (empty($_GET['id']) || !$brewery = breweryExists($_GET['id'])) {
    // Permet de renvoyer une 404 si la brasserie n'existe pas
    header('HTTP/1.0 404 Not Found');
    // La 404 personnalisée
    echo '<div class="container"><h4>404 : La page demandée n\'existe pas</h4></div>';
    require('partials/footer.php');
    exit; // On arrête le script PHP ici car la page 404 est terminée
} ?>

    <div class="container">
        <h4><?php echo $brewery['name'] ?></h4>
    </div>>



<?php

$name = $brewery['name']; // Doit faire au moins 3 caractères
$address = $brewery['address']; // Doit faire 10 caractères
$city = $brewery['city']; // Doit faire au moins 3 caractères
$zip = $brewery['zip']; // Doit faire 1 à 5 caractères
$country = $brewery['country']; // Select

    // détecter quand le form est soumis
    // On peut utiliser $_SERVER
    if (!empty($_POST)) {
        
        $name = $_POST['name']; // Doit faire au moins 3 caractères
        $address = $_POST['address']; // Doit faire 10 caractères
        $city = $_POST['city']; // Doit faire au moins 3 caractères
        $zip = $_POST['zip']; // Doit faire 1 à 5 caractères
        $country = $_POST['country']; // Select
    }
    
    if (!empty($_POST)) {
        // Définir un tableau d'erreur vide qui va se remplir après chaque erreur
        $errors=  [];
       
        if (strlen($name) < 3) {
           $errors['name'] = 'Doit faire au moins 3 caractères';        
        }
    
        if (strlen($address) <= 10) {
            $errors['address'] = 'Doit faire au moins 10 caractères';        
         }
    
         if (strlen($city) < 5) {
            $errors['city'] = 'Doit faire au moins 5 caractères';        
         }
         
         if (strlen($zip) < 1 OR strlen($zip) > 6 ) {
            $errors['zip'] = 'Doit faire 1 à 5 caractères';        
         }
         
         $allowedCountries = ['Allemagne', 'Angleterre', 'France', 'Italie', 'Belgique'] ;
         if (!in_array($country, $allowedCountries)) { 
            $errors['country'] = 'Merci de sélectionner un Pays.';        
         } 
         
        
         // var_dump($errors);  
        
        
        
         if ($errors){
            echo '<div class="alert alert-danger">😭😭<br/>TRY AGAIN !';
          //  foreach ($errors as $error) {
           //     echo '<p>'. $error . '</p>';
           // }      
            echo '</div>';
         }
     // S'il n'y a pas d'erreur dans le formulare
         if (empty($errors)) {
    
                $query = $db->prepare('UPDATE brewery SET `name` = :name, address = :address, city = :city, zip = :zip, country = :country WHERE id= :id');
                $query->bindvalue(':id', $brewery['id'], PDO::PARAM_INT);
                $query->bindvalue(':name', $name, PDO::PARAM_STR);
                $query->bindvalue(':address', $address, PDO::PARAM_STR);
                $query->bindvalue(':city', $city, PDO::PARAM_STR);
                $query->bindvalue(':zip', $zip, PDO::PARAM_STR);
                $query->bindvalue(':country', $country, PDO::PARAM_STR);
               
    
            if ($query->execute()) { // On insère la brasserie dans la BDD
              
    
                echo '<div class="alert alert-success">🍺🍺<br/>Fiche brasserie mise à jour : Cheers!! </div>';
            } 
         }
    }
?>

<form action="" method="POST" enctype="multipart/form-data">
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="name"><strong>Nom : </strong></label>
                <input type="text" class="form-control <?php echo isset($errors['name']) ? 'is-invalid' : null ?>" id="name" placeholder="Nom" name="name" value="<?php echo $name ?>">
                <?php if (!empty($errors)) { echo '<div class="invalid-feedback">Le nom doit avoir plus de 3 caractères </div>';} ?>

                <label for="address"><strong>Adresse : </strong></label>
                <input type="text" class="form-control <?php echo isset($errors['address']) ? 'is-invalid' : null ?>" id="address" placeholder="Adresse" name="address" value="<?php echo $address ?>">
                <?php if (!empty($errors)) { echo '<div class="invalid-feedback">L\'adresse doit avoir plus de 3 caractères </div>';} ?>
            </div>           
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="city"><strong>Ville : </strong></label>
                <input type="text" class="form-control <?php echo isset($errors['city']) ? 'is-invalid' : null ?>" id="city" placeholder="Ville" name="city" value="<?php echo $city ?>">
                <?php if (!empty($errors)) { echo '<div class="invalid-feedback">Doit faire au moins 5 caractères </div>';} ?>

                <label for="zip"><strong>Code postal : </strong></label>
                <input type="text" class="form-control <?php echo isset($errors['zip']) ? 'is-invalid' : null ?>" id="zip" placeholder="Code postal" name="zip" value="<?php echo $zip ?>">
                <?php if (!empty($errors)) { echo '<div class="invalid-feedback">Doit faire 1 à 5 caractères </div>';} ?>

                <label for="country"><strong>Pays : </strong></label>
                <select class="form-control <?php echo isset($errors['country']) ? 'is-invalid' : null ?>" id="country" name="country">
                    <option hidden readonly value="">Pays</option>
                    <option <?php if ($country == 'Allemagne') { echo 'selected'; } ?> value="Allemagne">Allemagne</option>
                    <option <?php if ($country == 'Angleterre') { echo 'selected'; } ?> value="Angleterre">Angleterre</option>
                    <option <?php if ($country == 'France') { echo 'selected'; } ?> value="France">France</option>
                    <option <?php if ($country == 'Italie') { echo 'selected'; } ?> value="Italie">Italie</option>
                    <option <?php if ($country == 'Belgique') { echo 'selected'; } ?> value="Belgique">Belgique</option>
                 </select>
                 <?php if (!empty($errors)) { echo '<div class="invalid-feedback">Merci de sélectionner un pays. </div>';} ?>
            </div>    
        </div>
    </div>
    <div class="row">
        <div class="col">
            <button  id="submit" type="submit" class="btn col">Je mets à jour !</button>
        </div>
    </div>
</div>
</form>
<?php


   
// vérifier les champs


// var_dump($_FILES);

// var_dump($_POST); 
require('partials/footer.php');