<?php

namespace blog\classes;
use PDO;

class Manager //gère la connection à la bdd
{
    protected $bdd;

    public function __construct()
    {
        $this->bdd = new PDO('mysql:host=localhost;dbname=jeanforteroche_blog;charset=utf8', 'root', '');
    }

}