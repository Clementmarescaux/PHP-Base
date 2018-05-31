
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

$db = new PDO('mysql:host=Localhost;dbname=movie_catalog;charset=UTF8', 'root', '', [
    PDO::ATTR_DEFAULT_FETCH_MODE =>PDO::FETCH_ASSOC
]);



    $id = $_GET['id'];
    
    $query = $db->query('SELECT * FROM movie WHERE id =' . $id);
    var_dump($query);


    $movie = $query->fetch();
    var_dump($movie);
    echo 'le film est: ' . $movie['name'];

   







    ?>

</body>
</html>

