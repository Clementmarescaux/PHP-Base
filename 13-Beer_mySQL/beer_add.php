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

<div class="bg bg4">
    <div class="container pt-5">
        <h1 class="d-flex justify-content-end text-left">Ajouter une bière</h1>
    </div>
</div>
<?php
    $name = null;
    $degree = null;
    $price =  null;
    $size = null;
    $brand = null;
    $type = null;
    $image = null;

    // détecter quand le form est soumis
    // On peut utiliser $_SERVER
    if (!empty($_POST)) {
        $name = $_POST['name']; // Doit faire au moins 3 caractères
        $degree = $_POST['degree']; // Doit faire entre 0 et 20
        $price = $_POST['price']; // Doit faire entre 0.5€ et 99.99€
        $size = $_POST['size']; // Doit faire 250, 330 ou 750
        $brand = $_POST['brand']; // Doit exister dans la base de données
        $type = $_POST['type']; // Doit exister dans la base de données

     // Erreur si l'image n'est pas uploadée
    

    // Raccourci avec interpolation de variables
    foreach ($_POST as $key => $field) {
        $$key = $field;
    }
}

if (!empty($_FILES['image']['tmp_name'])) {
    $image = $_FILES['image'];
}
?>

<form action="" method="POST" enctype="multipart/form-data">
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="name"><strong>Nom : </strong></label>
                <input type="text" class="form-control" id="name" placeholder="Nom de la bière" name="name" value="<?php echo $name ?>">
                <?php if (isset($errors[`name`])) {
                    
                } ?>
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
            <label for="image" class="label-file"><strong>Choisir une image :</strong> </label><br/>
            <input  class="input-file" type="file" name="image"/>
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

function slugify($string){
    
    $newString = str_replace(' ', '-', $string);
    $newString = str_replace('\'', '', $newString);
    $newString = str_replace(['À','Á','Â','Ã','Ä','Å','Æ','Ç','È','É','Ê','Ë','Ì','Í','Î','Ï','Ð','Ñ','Ò','Ó','Ô','Õ','Ö','Ø','Ù','Ú','Û','Ü','Ý','ß','à','á','â','ã','ä','å','æ','ç','è','é','ê','ë','ì','í','î','ï','ñ','ò','ó','ô','õ','ö','ø','ù','ú','û','ü','ý','ÿ','A','a','A','a','A','a','C','c','C','c','C','c','C','c','D','d','Ð','d','E','e','E','e','E','e','E','e','E','e','G','g','G','g','G','g','G','g','H','h','H','h','I','i','I','i','I','i','I','i','I','i','?','?','J','j','K','k','L','l','L','l','L','l','?','?','L','l','N','n','N','n','N','n','?','O','o','O','o','O','o','Œ','œ','R','r','R','r','R','r','S','s','S','s','S','s','Š','š','T','t','T','t','T','t','U','u','U','u','U','u','U','u','U','u','U','u','W','w','Y','y','Ÿ','Z','z','Z','z','Ž','ž','?','ƒ','O','o','U','u','A','a','I','i','O','o','U','u','U','u','U','u','U','u','U','u','?','?','?','?','?','?'], ['A','A','A','A','A','A','AE','C','E','E','E','E','I','I','I','I','D','N','O','O','O','O','O','O','U','U','U','U','Y','s','a','a','a','a','a','a','ae','c','e','e','e','e','i','i','i','i','n','o','o','o','o','o','o','u','u','u','u','y','y','A','a','A','a','A','a','C','c','C','c','C','c','C','c','D','d','D','d','E','e','E','e','E','e','E','e','E','e','G','g','G','g','G','g','G','g','H','h','H','h','I','i','I','i','I','i','I','i','I','i','IJ','ij','J','j','K','k','L','l','L','l','L','l','L','l','l','l','N','n','N','n','N','n','n','O','o','O','o','O','o','OE','oe','R','r','R','r','R','r','S','s','S','s','S','s','S','s','T','t','T','t','T','t','U','u','U','u','U','u','U','u','U','u','U','u','W','w','Y','y','Y','Z','z','Z','z','Z','z','s','f','O','o','U','u','A','a','I','i','O','o','U','u','U','u','U','u','U','u','U','u','A','a','AE','ae','O','o'], $newString);

    $newString = strtolower($newString);


    return $newString;
}

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
        // Erreur si l'image n'est pas uploadée
    if ($image === null) {
        $errors['image'] = "l'image n'a pas été uploadée";
    }

        //erreur si l'image uploadé n'a pas le bon mimetype
        //utiliser finfo_file

     if ($image) {
        $file = $image['tmp_name']; // l'emplacement temporaire du fichier uploadé
        $finfo = finfo_open(FILEINFO_MIME_TYPE); // Permet d'ouvrir un fichier
        $mimeType = finfo_file($finfo, $file); // Ouvre le fichier et renvoie image/jpg
        $allowedExtensions = ['image/jpg', 'image/jpeg', 'image/gif', 'image/png'];
        if (!in_array($mimeType, $allowedExtensions)) {
            $errors['image'] = "Ce type de fichier n'est pas autorisé";
        }

        // Si la taille de l'image est trop élevée

        if ($image['size'] > 2097152) { // = 2 Mo
            $errors['image'] = "La taille du fichier est trop élevée";
        }
    }

      //  var_dump($errors);  

     // S'il n'y a pas d'erreur dans le formulare
     if ($errors){
        echo '<div class="alert alert-danger">😭😭<br/>Try again !</div>';
     }

     if (empty($errors)) {
        $query = $db->prepare('
        INSERT INTO beer (`name`, degree, size, `image`, price, brand_id, ebc_id)
        VALUES (:name, :degree, :size, :image, :price, :brand_id, :ebc_id)
        ');
        $query->bindvalue(':name', $name, PDO::PARAM_STR);
        $query->bindvalue(':degree', $degree, PDO::PARAM_STR);
        $query->bindvalue(':size', $size, PDO::PARAM_INT);
        $query->bindvalue(':image', null, PDO::PARAM_STR);
        $query->bindvalue(':price', $price, PDO::PARAM_STR);
        $query->bindvalue(':brand_id', $brand_id, PDO::PARAM_INT);
        $query->bindvalue(':ebc_id', $type_id, PDO::PARAM_INT);

        if($query->execute()) { // On insère la bière dans la BDD
          


            // récupérer l'emplacement temporaire du fichier
            $file = $_FILES['image']['tmp_name'];

            // récupérer l'extension du fichier
            $originalName = $_FILES['image']['name'];
            $extension = pathinfo($originalName)['extension']; // Retourne png, jpg, gif

            // Générer le nom de l'image
            // Ch'ti -> chti
            // Ch'ti Ambrée -> chti-ambree

            $brand = slugify($brand['name']);
            $name = slugify($name);
            $filename = $brand.'-'.$name.'.'.$extension;

            // Déplacer le fichier dans le dossier img
            move_uploaded_file($file, __DIR__.'/img/'.$filename);
           
            // Requête pour mettre à jour la bière en BDD afin d'associer l'image
            $query = $db->prepare('UPDATE beer SET `image` = :image WHERE id = :id');
            $query->bindValue(':image', 'img/' .$filename, PDO::PARAM_STR);
            $query->bindValue(':id', $db->lastInsertId(), PDO::PARAM_INT); // On récupère l'ID de la dernière bière ajoutée
            $query->execute();

            echo '<div class="alert alert-success">🍺🍺<br/>Cheers!! </div>';
           
        } 


      
     }
}
// vérifier les champs


// var_dump($_FILES);

// var_dump($_POST); 
require('partials/footer.php');