<?php

namespace blog\classes;

class Comment
{
private $id;
private $pseudo;
private $content;
private $create_date;
private $reported;
private $acquit;
private $seen;
private $chapter_id;

public function getId()
{
    return $this->id;
}
public function setId($id)
{
     $this->id = $id;
}
public function getPseudo()
{
    return $this->pseudo;
}
public function setPseudo($pseudo)
{
     $this->pseudo = $pseudo;
}
public function getContent()
{
    return $this->content;
}
public function setContent($content)
{
     $this->content = $content;
}
public function getCreateDate()
{
    return $this->create_date;
}
public function setCreateDate($create_date)
{
     $this->create_date = $create_date;
}
public function getEditDate()
{
    return $this->edit_date;
}
public function setEditDate($edit_date)
{
     $this->edit_date = $edit_date;
}
public function getReporter()
{
    return $this->getReported;
}
public function setReported($reported)
{
     $this->reported = $reported;
}
public function getAcquit()
{
    return $this->getAcquit;
}
public function setAcquit($acquit)
{
     $this->acquit = $acquit;
}
public function getSeen()
{
    return $this->getSeen;
}
public function setSeen($seen)
{
     $this->seen = $seen;
}
public function getChapterId()
{
    return $this->getChapter_id;
}
public function setChapterId($chapter_id)
{
     $this->chapter_id = $chapter_id;
}
}
