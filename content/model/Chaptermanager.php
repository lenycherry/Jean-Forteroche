<?php
namespace blog\model;
use blog\classes\Manager;

class ChapterManager extends Manager {

    public function findAllParams()
    {
        $bdd = $this->bdd;
       $query = "SELECT * FROM chapter";
       $req = $bdd->prepare($query);
       $req->execute();
    }

}