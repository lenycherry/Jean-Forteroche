<?php

namespace blog\controller;

use blog\classes\View;
use blog\model\ChapterManager;

class Home
{
    public function showHome()
    {
        $manager = new ChapterManager();
        $chapters = $manager->findAllChapter(); //stock le résultat de la fonction findAllChapter
        $myView = new View('home');
        $myView->render(array('chapters' => $chapters));
    }
}
