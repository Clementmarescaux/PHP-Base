<?php

// Password hash

$password = 'test';
$hash = password_hash($password, PASSWORD_DEFAULT);

var_dump($hash);

// Pour vérifier que le mot de passe est valide :
   var_dump(password_verify('test', $hash));