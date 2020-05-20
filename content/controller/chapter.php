<?php

namespace blog\controller;

use blog\classes\View;
use blog\model\ChapterManager;

class Chapter
{
    public function showChapter($params)
    {
        var_dump($params);
        exit();
        $manager = new ChapterManager();
     //   $chapter = $manager->findChapter($id);
        $myView = new View('chapter');
        $myView->render();
    }
}
