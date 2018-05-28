<?php

// LES SUPERGLOBALES

// On peut accéder aux données dans l'url avec la variable $_GET

var_dump($_GET);


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($id == 5) {
        echo 'utilisateur 5';
    }
}



if (isset($_GET['name'])) {
    $name = $_GET['name'];
    echo 'Hello ' . $name;
}

// On a également accès à $_POST

var_dump($_POST);

?>
<form method="POST">
    <label for="age">Votre âge</label>
    <input type="text" id="age" name="age" placeholder="saisir votre age" />
    <button>Envoyer</button>
</form>