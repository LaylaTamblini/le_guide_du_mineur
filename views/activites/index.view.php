<?php include("views/components/head.php") ?>

<h1>Vos activités, <?= $utilisateur->prenom ?></h1>

<h2>Voici vos activités</h2>

<?php if(!$activites): ?>
    <p>Vous n'avez pas d'activité.</p>
<?php else: ?>
    <?php foreach ($activites as $activite): ?>
        <p><?= $activite->titre ?></p>
    <?php endforeach; ?>
<?php endif; ?>

<a href="compte-deconnecter">Créer une activité</a>
<a href="compte-deconnecter">Se déconnecter</a>

<?php include("views/components/foot.php") ?>