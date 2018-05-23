<?php

$quinze = 1;
$cinq = 23;
$huit = 45;

$resultat1 = $quinze + $cinq + $huit;
$resultat2 = $quinze * ($cinq + $huit);
$resultat3 = ($huit + $cinq) / $quinze;

echo $quinze . '+' . '5 +' . '8 =' . ($resultat1). "<br/>";
echo $quinze . 'x' . "(" . $cinq . '+' . $huit . ")" . '=' . ($resultat2) . "<br/>";

echo "(" . $huit . '+'. $cinq . ")" . "/" . $quinze . '=' . ($resultat3) . "<br/>";

if ($resultat1 < 20 || $resultat2 < 20 || $resultat3 < 20  ) {
    echo 'une des opérations renvoie moins de 20';
} 