<?php

require 'vendor/autoload.php';

use blog\classes\Routeur;


$request = $_GET['r'];//réecriture de l'url 

$routeur = new Routeur($request);
$routeur->renderController();





