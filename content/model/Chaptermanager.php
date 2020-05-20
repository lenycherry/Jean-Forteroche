<?php

namespace blog\model;

use blog\classes\Manager;

class ChapterManager extends Manager
{

    public function findAllChapter()
    {
        $bdd = $this->bdd;
        $query = "SELECT * FROM chapters";
        $req = $bdd->prepare($query);
        $req->execute();
        $chapters = $req->fetchAll();
        return $chapters;
    }
}
