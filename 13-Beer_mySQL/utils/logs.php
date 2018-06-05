<?php

// Vérifier si le dossier log existe à la racine du projet
// S'il n'existe pas on doit le créer

$folder = __DIR__.'/../log'; // C:/xampp/htdocs/PHP-base/13-Beer_mySQL/log

if(!is_dir($folder)) {
    mkdir($folder); // On crée le dossier s'il n'existe pas
}

if (isset($_GET['q'])) {
    // Définis le fichier de log pour la recherche
    $filename = $folder.'./search.log'; // C:/xampp/htdocs/PHP-base/13-Beer_mySQL/log/search.log

    // On ouvre le fichier et on place le curseur à la fin
    $file = fopen($filename, 'a+');

    // On écrit dans le fichier. On ajoute une ligne
    //--> [Recherche] Un utilasateur a cherché "Duvel" le 05/06/2018 à 11h45
    $q = $_GET['q'];
    $log = '[Recherche] Un utilasateur a cherché "'.$q.'" le ' . date('d/m/Y à H\hi') . PHP_EOL; // php_eol permet de revenir à la ligne à chaque entrée;
    fwrite($file, $log);
    fclose($file);
}