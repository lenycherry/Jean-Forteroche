<?php

namespace blog\controller;

use blog\model\ChapterManager;
use blog\model\CommentManager;
use blog\classes\View;

class ChapterController
{

    public function showChapter($params)
    {

        extract($params);
        $chapterManager = new ChapterManager();
        $commentManager = new CommentManager();
        $currentChapter = $chapterManager->findChapter($id);
        $chapters = $chapterManager->findAllChapter(); //stock le résultat de la fonction findAllChapter
        $comments = $commentManager->findAllCommentPerChapter($id); //stock le résultat de la fonction findAllComment
        $myView = new View('chapter');
        $myView->render(array('chapters' => $chapters, 'currentChapter' => $currentChapter, 'comments' => $comments)); //execute render (mise en mémoire tampon du contenu désiré)

    }

    public function showCreateChapter()// affiche la page de création de chapitre tinyMCE
    {
        $manager = new ChapterManager();
        $chapters = $manager->findAllChapter();
        $myView = new View('createChapter');
        $myView->render(array('chapters' => $chapters));
    }

    public function showEditChapter($params)
    {
        extract($params);
        if(isset($id)){
            $manager = new ChapterManager();
            $currentChapter = $manager->findChapter($id);
        }else{
            $myView = new View();
            $myView->redirect('createChapter');
        }
        $chapters = $manager->findAllChapter();
        $myView = new View('editChapter');
        $myView->render(array('chapters' => $chapters,'currentChapter' => $currentChapter));
    }
    
    public function addChapter($params) 
    {
        $dataChapter = $_POST['values'];
        $manager = new ChapterManager();
        $manager->addChapter($dataChapter);
        session_start();
        $_SESSION['flash']['success'] = 'Ce chapitre a bien été ajouté';
        $myView = new View();
        $myView->redirect('adminPanel');
    }
    public function updateChapter($params)
    {
        $dataChapter = $_POST['values'];
        $manager = new ChapterManager();
        $manager->updateChapter($dataChapter);
        session_start();
        $_SESSION['flash']['success'] = 'Ce chapitre a bien été édité';
        $myView = new View();
        $myView->redirect('adminPanel');
    }
    public function deleteChapter($params)
    {
        extract($params);
        $manager = new ChapterManager();
        $manager->deleteChapter($id);
        session_start();
        $_SESSION['flash']['success'] = 'Ce chapitre a bien été supprimé';
        $myView = new View();
        $myView->redirect('adminPanel');
    }
}
