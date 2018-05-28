<?php

// Créer une fonction en PHP
// les arguments peuvent avoir une valeur par défaut et ne sont donc plus obligatoire
function addition($argument1 = 1, $argument2 = 2) {
    return $argument1 + $argument2;
}

addition(); // On appelle la fonction
echo addition();

function nbCarre($argument) {
    return $argument * $argument;
}

echo nbCarre(3);

function circleArea($rayon) {
   return M_PI * ($rayon * $rayon);
}
echo '<br/>';
echo circleArea(12);

function rectangleArea($largeur, $longueur) {
    return $largeur * $longueur;
 }
 echo '<br/>';
 echo rectangleArea(3, 2);

 function tva($prix, $rate, $taxes) {
     
     $HT = 'HT';
     $TTC = 'TTC';


     if ($taxes === $HT) {
        return $prix * (1 + $rate / 100) . '€ TTC';
     } elseif ($taxes === $TTC) {
        return $prix  / (1 + $rate / 100) . '€ HT';
     } else {
         return 'Renseigner HT ou TTC en troisième argument';
     }     
 }

 echo '<br/>';
 echo tva(10, 20, 'TTC');