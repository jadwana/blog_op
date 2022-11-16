<?php $title="Mon blog Accueil";?>

<?php ob_start(); ?>


<h1>Mon super super blog !</h1>


<p class="bg-primary text-light">introduction du blog</p>
<p>paragraphe d'introduction ajout de texte pour test</p>
<a href="index.php?action=post">lien vers articles</a>
<a href="index.php?action=logon">lien vers connexion</a>
<a href="index.php?action=register">lien vers inscription</a>
<a href="index.php?action=admin">lien vers administration</a>
<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>