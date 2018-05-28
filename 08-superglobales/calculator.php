
<form method="POST">
    <label for="nombre1">nombre 1</label>
    <input type="text" id="nombre1" name="nombre1" /><br/><br/>

    <select name="choice">
        <option  value="addition">+</option>
        <option  value="soustraction">-</option>
        <option  value="division">/</option>
        <option  value="multiplication">*</option>
    </select>

    <label for="nombre2">nombre 2</label>
    <input type="text" id="nombre2" name="nombre2" /><br/><br/>
    <button value="calculer">Calculer</button>
</form>

<?php

var_dump($_POST);

if(!empty($_POST)) {
    $nombre1 = $_POST['nombre1'];
    $nombre2 = $_POST['nombre2'];
    $choice = $_POST['choice'];

    if (!is_numeric($nombre1) || !is_numeric($nombre1)) {
        echo 'Les nombres saisis ne sont pas valides';
        exit();
    }

    if ($nombre2 == 0 && $choice == 'division') {
        echo 'attention, division par 0!';
        exit();
    }

    switch ($choice) {
        case 'addition' : echo $nombre1 + $nombre2;
        break;
        case 'soustraction' : echo $nombre1 - $nombre2;
        break;
        case 'division' : echo $nombre1 / $nombre2;
        break;
        case 'multiplication' : echo $nombre1 * $nombre2;
        break;
    }


/*
    
    if ($_POST['choice'] == 'addition') {
        echo $_POST['nombre1'] + $_POST['nombre2'];
    } elseif ($_POST['choix'] == 'soustraction') {
        echo $_POST['nombre1'] - $_POST['nombre2'];
    } elseif ($_POST['choix'] == 'division') {
        echo $_POST['nombre1'] / $_POST['nombre2'];
    } elseif ($_POST['choix'] == 'multiplication') {
        echo $_POST['nombre1'] * $_POST['nombre2'];
    }
    */
}
    

