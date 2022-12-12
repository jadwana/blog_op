<?php
namespace App\Controllers;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
require 'vendor/autoload.php';

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
        //we configure the folder containing the templates
        $this->loader = new FilesystemLoader('App/views');

        //we set the twig environment
        $this->twig= new Environment($this->loader);
    }
}
