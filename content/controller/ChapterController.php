<?php

namespace blog\controller;

use blog\model\ChapterManager;
use blog\classes\View;

class ChapterController
{

    public function showChapter($params)
    {

        $url = explode('/', $_GET['r']);
        $id = $url[1];

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
}
