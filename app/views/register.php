<?php $title="Inscription";?>

<?php ob_start(); ?>

<h1>Inscription</h1>
<p>formulaire d'inscription</p>
<p><a href="index.php">retour accueil</a></p>


<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>