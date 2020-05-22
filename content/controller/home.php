<?php

namespace blog\controller;

use blog\classes\View;
use blog\model\ChapterManager;

class Home
{
    public function showHome()
    {
        //On récupère les données de chapter dans la bdd en passant par un manager
        // on stock le résultat de la fonction findAllChapter dans un tableau $chapters
        $manager = new ChapterManager();
        $chapters = $manager->findAllChapter(); 
        $myView = new View('home');
        $myView->render(array('chapters' => $chapters));// lance la fonction render( mise en mémoire du contenu dans une var $content) avec la clè chapters et la valeur tableau$chapters
    }
}
