<?php

namespace blog\classes;


class Routeur
{
    private $request;

    private $routes = [
        
        'login'        => ['controller' => 'SessionController', 'method' => 'showUserlogin'],
        'userLogin'    => ['controller' => 'SessionController', 'method' => 'userLogin'],
        'register'     => ['controller' => 'SessionController', 'method' => 'showUserRegister'],
        'userRegister' => ['controller' => 'SessionController', 'method' => 'userRegister'],
        'logout'       => ['controller' => 'SessionController', 'method' => 'logout'],

        'createChapter' => ['controller' => 'ChapterController', 'method' => 'showCreateChapter'],
        'editChapter'   => ['controller' => 'ChapterController', 'method' => 'showEditChapter'],
        'updateChapter' => ['controller' => 'ChapterController', 'method' => 'updateChapter'],
        'addChapter'    => ['controller' => 'ChapterController', 'method' => 'addChapter'],
        'deleteChapter' => ['controller' => 'ChapterController', 'method' => 'deleteChapter'],

        'adminPanel'    => ['controller' => 'AdminPanel',        'method' => 'showAdminPanel'],
        'home'          => ['controller' => 'Home',              'method' => 'showHome'],
        'chapter'       => ['controller' => 'ChapterController', 'method' => 'showChapter'],
    ];

    public function __construct($request)
    {
        $this->request = $request;
    }

    //func getRoute = récupère la route
    //explose l'url pour récup dans un tableau les strings après les /, retourne l'élement 1 qui est = à la route
    public function getRoute()
    {
        $elements = explode("/", $this->request);
        return $elements[1];
    }

    //func getParams = retourne les paramètres en parcourant les elements de l'url explosée et en les incluant dans un tableau params (sauf content/)
    //si il s'agit d'elements Post, on les stocks en tant que valeur dans le tableau params avec un alias key
    public function getParams()
    {
        $params = null;
        $elements = explode("/", $this->request); 
        unset($elements[0]);
        
        for ($i = 1; $i < count($elements); $i++) {
            $params[$elements[$i + 1]] = $elements[$i + 2];
            $i++;
        }
        if ($_POST) {
            foreach ($_POST as $key => $val) {
                $params[$key] = $val;
            }
        }
        return $params;
    }

    public function  renderController()
    {
        $route = $this->getRoute();
        $params = $this->getParams();


        if (key_exists($route, $this->routes)) {
            $controller = "blog\\controller\\" . $this->routes[$route]["controller"];
            $method = $this->routes[$route]['method'];
            $currentController = new $controller(); // instancie le controller demandé
            $currentController->$method($params); // appelle la méthode concernée
        } else if (!isset($_GET['r'])) {
            header("Location: home");
        } else {
            echo 'erreur 404, la page suivante n\'existe pas: ' . $route;
        }
    }
}
