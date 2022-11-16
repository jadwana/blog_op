<?php $title="Mon blog detail billet";?>

<?php ob_start(); ?>

<h1>Mon super super blog !</h1>
<p>Detail du billet :</p>
<p><a href="index.php">retour accueil</a></p>


<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>