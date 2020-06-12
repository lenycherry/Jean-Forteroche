<?php

namespace blog\model;

use blog\classes\Manager;
use blog\classes\Chapter;
use PDO;

class ChapterManager extends Manager //gère la connection à la bdd par son parent et à la table chapter
{

    public function findAllChapter()
    {
        $req = $this->bdd->prepare("SELECT *,DATE_FORMAT(create_date, '%d/%m/%Y à %Hh%i') AS create_date,DATE_FORMAT(edit_date, '%d/%m/%Y à %Hh%i') AS edit_date FROM chapters ORDER BY id");
        $req->execute();
        $chapters = $req->fetchAll();
        return $chapters;
    }

    public function findChapter($id)
    {
        $req = $this->bdd->prepare("SELECT *, DATE_FORMAT(create_date, '%d/%m/%Y à %Hh%i') AS create_date,DATE_FORMAT(edit_date, '%d/%m/%Y à %Hh%i') AS edit_date FROM chapters WHERE id = :id ");
        $req->bindValue(':id', $id, PDO::PARAM_INT); // définition de la valeur de :id soit le param $id de la fonction en var int
        $req->execute();
        $result = $req->fetch(PDO::FETCH_ASSOC); //stock le résultat de la requête dans la var result
        $currentChapter = new Chapter();
        // hydratation du chapitre demandé
        $currentChapter->setId($result['id']);
        $currentChapter->setTitle($result['title']);
        $currentChapter->setContent($result['content']);
        $currentChapter->setCreateDate($result['create_date']);
        $currentChapter->setEditDate($result['edit_date']);
        return $currentChapter;
    }

    public function addChapter($dataChapter)
    {
        $title = $dataChapter['title'];
        $content = $dataChapter['content'];
        $req = $this->bdd->prepare('INSERT INTO chapters (title, content) VALUES(:title, :content)');
        $req->bindValue(':title', $title, PDO::PARAM_STR);
        $req->bindValue(':content', $content, PDO::PARAM_STR);
        $req->execute();
    }

    public function updateChapter($dataChapter)
    {
        $title = $dataChapter['title'];
        $content = $dataChapter['content'];
        $id = $dataChapter['id'];
        $req = $this->bdd->prepare('UPDATE chapters SET title = :title, content = :content, edit_date = NOW() WHERE id = :id');
        $req->bindValue(':title', $title, PDO::PARAM_STR);
        $req->bindValue(':content', $content, PDO::PARAM_STR);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
    }

    public function deleteChapter($id)
    {
        $req = $this->bdd->prepare('DELETE FROM chapters WHERE id = :id');
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
    }
}
