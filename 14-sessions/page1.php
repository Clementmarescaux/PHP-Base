<?php
session_start(); // indispensable pour utiliser les sessions


var_dump($_SESSION); // Le tableau vide la première fois

$countries = ['fr', 'en'];

$_SESSION['countries'] = $countries;

var_dump($_SESSION);