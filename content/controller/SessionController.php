<?php

namespace blog\controller;
use blog\classes\Manager;
use blog\classes\View;

class SessionController
{
public function userRegister()
{
    // S'il y a une session alors on ne retourne plus sur l'accueil
    if (isset($_SESSION['id'])) 
    {
        $myView = new View();
        $myView->redirect('home');
        exit;
    } 
}
}
