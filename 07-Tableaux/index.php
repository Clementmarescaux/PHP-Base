<?php

$people = [
    'Jean',
    'Eric',
    'Jeanne'
];

echo $people; // ne fonctionne pas : on n'affiche pas un tableau


print_r($people); // affiche tableau sur une ligne


var_dump($people); // pour débuguer avec X debug

echo $people[1]; // Affiche Eric

foreach($people as $index => $person) {
    var_dump($person);
    echo $index. ':' . $person . '<br/>';
}

// Si un index est déclaré, les éléments suivants vont être incrémentés par rapport à cet index
$people = [
    'Jean',
    3 => 'Eric',
    'Jeanne'
];

var_dump($people);

// Stocker des contacts dans ce tableau avec les index nom (string), prénom (string, age (int), téléphone (array => portable (string) et fixe (string)). Il peut y avoir plusieurs contacts.
$people = [];

array_push($people, ['nom' => 'Valgeant', 'prenom' => 'Jean', 'age' => 26, 'phone' => ['mobile' => '0654654654', 'homePhone' => '0340676577']]);

array_push($people, ['nom' => 'White', 'prenom' => 'Jack', 'age' => 29, 'phone' => ['mobile' => '0654654654', 'homePhone' => '0340676577']]);

array_push($people, ['nom' => 'Lenormand', 'prenom' => 'Gérard', 'age' => 33, 'phone' => ['mobile' => '0654654654', 'homePhone' => '0340676577']]);

var_dump($people);


foreach($people as $person) {  
    echo '<br/>' . $person['prenom'] . ' a ' . $person['age'] . ' ans et est joignable au : ';
    //echo $person['phone']['mobile'] . ',' . $person['phone']['homePhone'] . '<br/>';
    foreach ($person['phone'] as $type => $phone) {
        echo $type . ' : ' . $phone . ' / ';
    }
}