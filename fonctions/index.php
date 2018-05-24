<?php

$date = date('l d M Y', strtotime('now'));
$heure = date('G', strtotime('now'));
$minutes = date('i', strtotime('now'));
$secondes = date('s', strtotime('now'));

echo "<br/>";
echo $date . ", il est " . $heure . "h" . $minutes . " et " . $secondes . " secondes!";