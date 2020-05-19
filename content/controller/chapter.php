<?php
namespace blog\controller;

use blog\classes\View;

class Chapter{
    public function showChapter(){
    $myView = new View('');
    $myView->render();
    }
}