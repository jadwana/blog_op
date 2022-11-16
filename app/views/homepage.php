<?php $title="Mon blog Accueil";?>

<?php ob_start(); ?>


<h1>Mon super super blog !</h1>


<p class="bg-primary">introduction du blog</p>
<p>paragraphe d'introduction ajout de texte pour test</p>
<a href="index.php?action=post">lien vers post</a>
<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>