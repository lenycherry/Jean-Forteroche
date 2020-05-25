<?php

namespace blog\controller;

use blog\model\ChapterManager;
use blog\classes\View;
use blog\model\Chapter;

class ChapterController
{

    public function showChapter($params)
    {

        $url = explode('/', $_GET['r']);
        $id = $url[2];
        $manager = new ChapterManager();
        $currentChapter = $manager->findChapter($id);
        $chapters = $manager->findAllChapter(); //stock le résultat de la fonction findAllChapter
        $myView = new View('chapter');
        $myView->render(array('chapters' => $chapters, 'currentChapter' => $currentChapter)); //execute render (mise en mémoire tampon du contenu désiré)

    }

    public function createChapter()
    {
        $manager = new ChapterManager();
        $chapters = $manager->findAllChapter();
        $myView = new View('createChapter');
        $myView->render(array('chapters' => $chapters));
    }

    public function editChapter()
    {
        $url = explode('/', $_GET['r']);
        $id = $url[1];
        $manager = new ChapterManager();
        $chapters = $manager->findAllChapter();
        $currentChapter = $manager->findChapter($id);
        $myView = new View('editChapter');
        $myView->render(array('chapters' => $chapters, 'currentChapter' => $currentChapter));
    }
    public function addChapter()
    {
        $dataChapter = $_POST['values'];
        $manager = new ChapterManager();
        $manager->addChapter($dataChapter);
        $chapters = $manager->findAllChapter();
        $myView = new View('home');
        $myView->render(array('chapters' => $chapters));
    }
}
