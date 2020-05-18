<?php
namespace blog\controller;

use blog\classes\View;

class Home{
    public function showHome (){
    $myView = new View('home');
    $myView->render();
    }
}