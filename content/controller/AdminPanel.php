<?php

namespace blog\controller;
use blog\classes\View;
use blog\model\ChapterManager;
use blog\model\CommentManager;

class AdminPanel
{
    public function showAdminPanel()
    {
        //On récupère les données de chapter et comment dans la bdd en passant par un manager
        // on stock le résultat de la fonction findAll'' dans un tableau $chapters et $comments
        //on renvoi tous les chapitres et tous les commentaires à la vue
        $chapterManager = new ChapterManager();
        $commentManager = new CommentManager();
        $chapters = $chapterManager->findAllChapter(); 
        $comments = $commentManager->findAllComment(); 
        $myView = new View('adminPanel');
        $myView->render(array('chapters' => $chapters, 'comments' => $comments));
    }
}