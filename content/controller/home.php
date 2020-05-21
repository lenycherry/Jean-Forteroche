<?php

namespace blog\controller;

use blog\classes\View;
use blog\model\ChapterManager;

class Home
{
    public function showHome()
    {
        $manager = new ChapterManager();
        $chapters = $manager->findAllChapter(); //stock le résultat de la fonction findAllChapter dans un tableau $chapters
        $myView = new View('home');
        $myView->render(array('chapters' => $chapters));// lance la fonction render( mise en mémoire du contenu dans une var $content) avec la clè chapters et la valeur tableau$chapters
    }
}
