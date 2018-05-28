<?php

/*
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
*/

$students = [
    0 => [
        'name' => 'Brian',
        'marks' => [4, 2, 12, 8, 16, 14, 3, 0, 3]
    ],
    1 => [
        'name' => 'Kimberley',
        'marks' => [14, 12, 2, 18, 6, 14, 13, 10, 8]
    ],
    2 => [
        'name' => 'Jamy',
        'marks' => [18, 19, 12, 18, 16, 14, 13, 19, 19]
    ],
    3 => [
        'name' => 'Eliott',
        'marks' => [14, 19, 17, 16, 19, 14, 19, 10, 19]
    ]
];

var_dump($students);

foreach($students as $student) {  
    echo '<br/>' . $student['name'] . ' a eu : ';
    foreach($student['marks'] as $key => $mark) {
        echo $mark;      
        if ($key == count($student['marks']) - 2) {
            echo ' et ';
        } elseif ($key == count($student['marks']) - 1) {
            echo '.';
        } else {
            echo ', ';
        }
    }  
}



$jamyAverage = round(array_sum($students[2]['marks']) / count($students[2]['marks']), 2);

echo '<br/> <br/> Jamy a ' . $jamyAverage . '/20 de moyenne générale <br/>';



foreach($students as $student) { 
    $studentAverage = round(array_sum($student['marks']) / count($student['marks']), 2);

    echo '<br/>' . $student['name'] . ' a ' . $studentAverage . ' de moyenne générale';

    if ($studentAverage > 10 && $studentAverage < 15 ) {
        echo '<br/><li><strong>' . $student['name'] . ' a la moyenne </strong></li><br/>';
    } elseif ($studentAverage > 15) {
        echo '<br/><li><strong>' . $student['name'] . ' a une très bonne moyenne !</strong></li><br/>';
    } else {
        echo '<br/><li><strong>' . $student['name'] . ' n\'a pas la moyenne !!</strong></li><br/>';
    }
}


$markMax = 0;
foreach($students as $student) {
    foreach($student['marks'] as $mark) {  
    
        if ($mark > $markMax) {
            $markMax = $mark;
        }
    }
}

$markToCheck = 0;
$markIsChecked = false;

var_dump($markMax);
foreach($students as $student) {
    foreach($student['marks'] as $mark) {  
   
        if ($mark === $markMax) {
           echo $student['name'] . ' a la meilleure note de la classe : ' . $markMax . '<br/>';
          // break; // arrête la boucle quand l'élève a au moins une fois la meilleure note.
        break 2; // arrête les deux boucles
        }
    }
}

if ($markToCheck) {
    echo "quelqu'un a eu 20";
} else {
    echo "personne n'a eu 20";
}

/* TRI A BULLES

echo '<br/>';

$marks = [4, 25, 1, 36, 24];
$i = 0;
$count = count($marks) - 1;
var_dump ($marks);

while ($i < $count) {
    if ($marks[$i] > $marks[$i + 1]) {
        $tmp = $notes[$i]; // on stocke le 4
        $marks[$i] > $marks[$i + 1]; // on met le 25 à la place du 4
        $marks[$i + 1] > $tmp;
        $i = 0;
    } else {
        $i++;
    }
}
var_dump ($marks);

*/








