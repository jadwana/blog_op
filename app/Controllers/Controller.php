<?php
namespace App\Controllers;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

abstract class Controller
{

    private $loader;

    protected $twig;

    //
    /**
     * Method in charge of twig parameter
     */


    public function __construct()
    {
        // We configure the folder containing the templates.
        $this->loader = new FilesystemLoader('App/views');

        // We set the twig environment.
        $this->twig = new Environment($this->loader);

        $this->twig->addGlobal('session', $_SESSION);
    }

    
}
