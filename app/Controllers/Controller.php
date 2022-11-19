<?php
namespace App\Controllers;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
require 'vendor/autoload.php';
abstract class Controller
{
    private $loader;
    protected $twig;

    public function __construct()
    {
        //on parametre le dossier contenant les templates
        $this->loader = new FilesystemLoader('App/views');

        //on parametre l'environnement twig
        $this-> twig= new Environment($this->loader);
    }
}