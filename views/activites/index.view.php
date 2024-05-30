<?php

use Models\Activite;
include("views/components/head.php");

?>

<h1>Vos activités, <?= $utilisateur->prenom ?></h1>

<h2>Voici vos activités</h2>


<?php foreach ($activites as $activite): ?>
    <?= $activite->titre ?>
<?php endforeach; ?>

<a href="compte-deconnecter">Se déconnecter</a>

<?php include("views/components/foot.php") ?>