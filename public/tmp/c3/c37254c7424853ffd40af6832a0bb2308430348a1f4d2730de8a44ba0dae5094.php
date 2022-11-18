<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* homepage.php */
class __TwigTemplate_e7dedd0bd24207437ea825d27e3479f1a246f743c171fd3c9214276a678a4c2e extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<?php \$title=\"Mon blog Accueil\";?>

<?php ob_start(); ?>


<h1>Mon super super blog !</h1>


<p class=\"bg-primary text-light\">introduction du blog</p>
<p>paragraphe d'introduction ajout de texte pour test</p>
<a href=\"index.php?action=post\">lien vers articles</a>
<a href=\"index.php?action=logon\">lien vers connexion</a>
<a href=\"index.php?action=register\">lien vers inscription</a>
<a href=\"index.php?action=admin\">lien vers administration</a>
<?php \$content = ob_get_clean(); ?>

<?php require 'layout.php' ?>
";
    }

    public function getTemplateName()
    {
        return "homepage.php";
    }

    public function getDebugInfo()
    {
        return array (  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "homepage.php", "C:\\Users\\tagad\\Desktop\\WAMP\\www\\blogSP.blog\\app\\views\\homepage.php");
    }
}
