<?php

namespace blog\classes;

class View
{
    private $template;

    public function __construct($template)
    {
        $this->template = $template;
    }
    public function render($params = array())
    {
        extract($params);
        $template = $this->template;
        //stock la vue dans une mémoire tampon. au moment ou le cache se vide, le contenu de la vue est stocké dans une var $content
        ob_start();
        include($_SERVER['DOCUMENT_ROOT'] . '/P4_lenoir_celia/content/view/' . $template . '.php');
        $content = ob_get_clean();
        //affiche le templatePage + la variable $content déjà présente dans le fichier.
        include_once($_SERVER['DOCUMENT_ROOT'] . '/P4_lenoir_celia/content/view/templatePage.php');
    }
}
