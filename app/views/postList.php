<?php $title="Mon blog les billets";?>

<?php ob_start(); ?>

<h1>Mon super super blog !</h1>
<p>Derniers billets du blog :</p>
<p><a href="index.php">retour accueil</a></p>
<p><a href="index.php?action=onepost">detail du billet</a></p>


<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>