<?php $title="Connexion";?>

<?php ob_start(); ?>

<h1>page connexion</h1>
<p>formulaire de connection</p>
<p><a href="index.php">retour accueil</a></p>


<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>