<?php
class MyConfig
{
    public static function start()
    {
//Liens absolus
$root = $_SERVER['DOCUMENT_ROOT'];//obtenir la racine du serveur
$host = $_SERVER['HTTP_HOST'];//obtenir l'url demandé

//création de constante des dossiers en lien absolu
define('HOST','http://'.$host.'/P4_lenoir_celia/content/');
define('ROOT', $root.'P4_lenoir_celia/content/');

define('CONTROLLER', ROOT.'controller/');
define('VIEW', ROOT.'view/');
define('MODEL', ROOT.'model/');
define('ASSETS', HOST.'assets/');
    }
}