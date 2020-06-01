<?php

namespace blog\controller;

use blog\classes\Manager;
use PDO;


class SessionManager extends Manager
{
    public function formRegister()
    {
        // Si la variable "$_Post" contient des informations alors on les extrait
        if (!empty($_POST)) {
            extract($_POST);
            $valid = true;
        }
        // On récupère les informations dans le formulaire register
        if (isset($_POST['register'])) {
            $pseudo = htmlentities(trim($pseudo));
            $mail = htmlentities(strtolower(trim($mail)));
            $mdp = trim($mdp);
            $confmdp = trim($confmdp);

            //  Vérification du pseudo
            if (empty($pseudo)) {
                $valid = false;
                $er_pseudo = ("Ce champ est vide.");
            }
            // Vérification du mail
            if (empty($mail)) {
                $valid = false;
                $er_mail = "Ce champ est vide.";

                // On vérifie que le mail est dans le bon format
            } elseif (!preg_match("/^[a-z0-9\-_.]+@[a-z]+\.[a-z]{2,3}$/i", $mail)) {
                $valid = false;
                $er_mail = "Le mail n'est pas valide";
            } else {
                // On vérifie que le mail est disponible
                $req_mail = $DB->query(
                    "SELECT mail FROM users WHERE mail = ?",
                    array($mail)
                );

                $req_mail = $req_mail->fetch();

                if ($req_mail['mail'] <> "") {
                    $valid = false;
                    $er_mail = "Ce mail existe déjà";
                }
            }
        }
        // Vérification du mot de passe
        if (empty($mdp)) {
            $valid = false;
            $er_mdp = "Ce champ est vide.";
        } elseif ($mdp != $confmdp) {
            $valid = false;
            $er_mdp = "La confirmation du mot de passe ne correspond pas";
        }
        // Si toutes les conditions sont remplies alors on fait le traitement
        if ($valid) {

            $mdp = password_hash($_POST['mdp'], PASSWORD_BCRYPT);


            // On insert nos données dans la table utilisateur
          
            $req = $this->bdd->prepare("INSERT INTO users (pseudo, mail, mdp,) VALUES (:pseudo, :mail, :mdp)");
            $req->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
            $req->bindValue(':mail', $mail, PDO::PARAM_STR);
            $req->bindValue(':mdp', $mdp, PDO::PARAM_STR);
            $req->execute();
        }
    }
}
