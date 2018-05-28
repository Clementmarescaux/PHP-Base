<?php

function acronym($string) {
    
    $words = explode( ' ', $string); 
    $firstLetters = '';
    var_dump($words);
    

    foreach($words as $word) {
        $firstLetters .= $word[0];
    }

    return $firstLetters;
    
   
   // strpos('World of Warcraft');
}

echo(acronym('Peter Has Problems in san Fransisco. ursula now needs you!'));

function present($verb) {
    $root = substr($verb, 0, -2);
    $ending = substr($verb, -2);
    
    $subjects = [
        'Je' => 'e',
        'Tu' => 'e',
        'Il' => 'e',
        'Nous' => 'ons',
        'Vous' => 'ez',
        'Ils / Elles' => 'ent'
];

    foreach ($subjects as $subjects => $ending) {
        echo $subjects . ' ' . $root . $ending . '<br/>';
    }
    
}

echo present( 'chercher');
