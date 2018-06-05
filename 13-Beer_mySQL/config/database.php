<?php

// Une constante en PHP = variable qui ne varie pas
// Les constantes sont en maj par convention

define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'beer_pdo');


// Connexion à la BDD

// Le try catch permet de gérer les erreurs
try {
$db = new PDO('mysql:host='.HOST.';dbname='.DB.';charset=utf8', USER, PASS, [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, // active les erreurs sql 
]);

$countSQL = 0;

} catch (Exception $e) {
    echo $e->getMessage();
    //echo '<script>window.open("http://www.google.fr/search?q='.$e->getMessage().'");</script>'; // permet d'ouvrir un nouvel onglet qui lance une recherche sur Google
    echo '<img src="https://media.giphy.com/media/EFXGvbDPhLoWs/giphy.gif"/>';
}

