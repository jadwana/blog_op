<?php $title="administration";?>

<?php ob_start(); ?>

<h1>adminsitration</h1>
<p>test</p>
<p><a href="index.php">retour accueil</a></p>


<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>