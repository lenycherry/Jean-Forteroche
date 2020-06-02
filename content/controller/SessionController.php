<?php

namespace blog\controller;

use blog\classes\View;
use blog\model\SessionManager;
use blog\model\ChapterManager;


class SessionController
{


    public function showUserRegister()
    {
        $manager = new ChapterManager();
        $chapters = $manager->findAllChapter();
        $myView = new View('register');
        $myView->render(array('chapters' => $chapters));
    }
    public function userRegister($params)
    {
        $manager = new SessionManager();
        $erForm  = array();

        // Si la variable "$params" contient des informations alors on les extrait
        if (!empty($params)) {
            extract($params);
            $valid = true;
        }
        // On récupère les informations dans le formulaire register
        if (isset($params)) {
            $pseudo = htmlentities(trim($pseudo));
            $mail = htmlentities(strtolower(trim($mail)));
            $mdp = trim($mdp);
            $confmdp = trim($confmdp);

            //  Vérification du champ pseudo
            if (empty($pseudo)) {
                $valid = false;
                $erForm["pseudo"] = "Veuillez rentrer votre pseudo.";

                //Vérif que le pseudo existe déja
            } else {
                $req_pseudo = $manager->verifPseudo($pseudo);
                if ($req_pseudo['pseudo'] <> "") {
                    $valid = false;
                    $erForm["pseudo"] = "Ce pseudo existe déjà.";
                }
            }
            // Vérification du champ mail
            if (empty($mail)) {
                $valid = false;
                $erForm["mail"] = "Veuillez rentrer un mail.";

                // Regex du mail
            } elseif (!preg_match("/^[a-z0-9\-_.]+@[a-z]+\.[a-z]{2,3}$/i", $mail)) {
                $valid = false;
                $erForm["mail"] = "Le mail n'est pas valide.";
            } else {
                //Vérif que le mail existe déjà
                $req_mail = $manager->verifMail($mail);
                if ($req_mail['mail'] <> "") {
                    $valid = false;
                    $erForm["mail"] = "Ce mail existe déjà.";
                }
            }
        }
        // Vérification du champ mot de passe et confirmation valide
        if (empty($mdp)) {
            $valid = false;
            $erForm["mdp"] = "Veuillez entrer un mot de passe.";
        } elseif ($mdp != $confmdp) {
            $valid = false;
            $erForm["mdp"] = "La confirmation du mot de passe ne correspond pas.";
        }

        // Si toutes les conditions sont remplies alors on fait le traitement vers la bdd via la fonction du model "formRegister"
        if ($valid) {

            $manager->formRegister($params);
            $myView = new View();
            $myView->redirect('home');
        } else {

            $manager = new ChapterManager();
            $chapters = $manager->findAllChapter();
            $myView = new View('register');
            $myView->render(array('chapters' => $chapters, 'erForm' => $erForm));
        }
    }
}
