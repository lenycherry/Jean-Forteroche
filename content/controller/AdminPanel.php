<?php

namespace blog\controller;
use blog\classes\View;
use blog\model\ChapterManager;

class AdminPanel
{
    public function showAdminPanel()
    {
        //On récupère les données de chapter dans la bdd en passant par un manager
        // on stock le résultat de la fonction findAllChapter dans un tableau $chapters
        $manager = new ChapterManager();
        $chapters = $manager->findAllChapter(); 
        $myView = new View('adminPanel');
        $myView->render(array('chapters' => $chapters));
    }
}