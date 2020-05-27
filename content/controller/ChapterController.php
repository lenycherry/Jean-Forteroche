<?php

namespace blog\controller;

use blog\model\ChapterManager;
use blog\classes\View;
use blog\model\Chapter;

class ChapterController
{

    public function showChapter($params)
    {

        extract($params);
        $manager = new ChapterManager();
        $currentChapter = $manager->findChapter($id);
        $chapters = $manager->findAllChapter(); //stock le résultat de la fonction findAllChapter
        $myView = new View('chapter');
        $myView->render(array('chapters' => $chapters, 'currentChapter' => $currentChapter)); //execute render (mise en mémoire tampon du contenu désiré)

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
    
    public function addChapter($params) // Transfère les infos dans la Bdd. Redirige vers home (temporaire)
    {
        $dataChapter = $_POST['values'];
        $manager = new ChapterManager();
        $manager->addChapter($dataChapter);
        $chapters = $manager->findAllChapter();
        $myView = new View();
        $myView->redirect('home');
    }
    public function updateChapter($params) // Transfère les infos dans la Bdd. Redirige vers home (temporaire)
    {
        $dataChapter = $_POST['values'];
        $manager = new ChapterManager();
        $manager->updateChapter($dataChapter);
        $chapters = $manager->findAllChapter();
        $myView = new View();
        $myView->redirect('home');
    }
    public function deleteChapter($params)
    {
        extract($params);
        $manager = new ChapterManager();
        $manager->deleteChapter($id);
        $myView = new View();
        $myView->redirect('adminPanel');
    }
}
