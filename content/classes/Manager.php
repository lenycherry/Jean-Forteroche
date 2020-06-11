<?php

namespace blog\classes;

use Exception;
use PDO;

class Manager //gère la connection à la bdd
{
    protected $bdd;

    public function __construct()
    {
        try{
        $this->bdd = new PDO('mysql:host=localhost;dbname=jeanforteroche_blog;charset=utf8', 'root', '');
        }
        catch (Exception $e)
        {
            die('Erreur : ' .$e->getMessage());
        }
    }

}