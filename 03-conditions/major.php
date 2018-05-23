<?php

$age = 233;

if ($age >= 18) {
    echo "Vous pouvez entrer";
} elseif ($age > 15 && $age < 18) {
    echo "Vous êtes presque majeur";
} elseif ($age > 13 && $age < 16) {
    echo "Vous êtes jeune";
} else {
    echo "Interdit";
} 