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
        ob_start();
        include($_SERVER['DOCUMENT_ROOT'] . '/P4_lenoir_celia/content/view/' . $template . '.php');
        $content = ob_get_clean();
        include_once($_SERVER['DOCUMENT_ROOT'] . '/P4_lenoir_celia/content/view/templatePage.php');
    }
}
