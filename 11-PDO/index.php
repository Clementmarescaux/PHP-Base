<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
//connexion BDD

$db = new PDO('mysql:host=Localhost;dbname=movie_catalog;charset=UTF8', 'root', '', [
    PDO::ATTR_DEFAULT_FETCH_MODE =>PDO::FETCH_ASSOC
]);
var_dump($db);

$query = $db->query('SELECT * FROM movie');
var_dump($query);

//$movie = $query->fetch();
//var_dump($movie);

$movies = $query->fetchAll();
var_dump($movies);


echo '<ul>';
foreach ($movies as $movie) {
    echo '<li>' . ucfirst($movie['name']) . ', ' . $movie['date']. '</li>';
}
echo '</ul>';



?>

</body>
</html>



