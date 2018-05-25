<?php

// phpinfo(); permet d'avoir toutes les informations sur php (plugins installés etc.

$date = date('l d M Y', strtotime('now'));
$heure = date('G', strtotime('now'));
$minutes = date('i', strtotime('now'));
$secondes = date('s', strtotime('now'));

echo "<br/>";
echo $date . ", il est " . $heure . "h" . $minutes . " et " . $secondes . " secondes!";

echo '<br/>';
echo date('l d F Y', strtotime('+ 10 days'));
