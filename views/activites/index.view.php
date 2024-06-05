<?php include("views/components/head.php") ?>

<h1>Vos activités, <?= $utilisateur->prenom ?></h1>

<!-- Liste des activités -->
<section class="activites">

    <h2>Voici vos activités</h2>

    <!-- Une activité -->
    <?php if(!$activites): ?>

        <article class="activite">
            <p>Vous n'avez pas d'activité.</p>
        </article>

    <?php else: ?>

        <!-- Début Foreach Activité -->
        <?php foreach ($activites as $activite): ?>
            <article class="activite">
                <p><?= $activite->titre ?></p>
            </article>
        <?php endforeach; ?>
        <!-- Fin Foreach Activité -->

    <?php endif; ?>

</section>

<a href="activites-creer">Créer une activité</a>
<a href="compte-deconnecter">Se déconnecter</a>

<?php include("views/components/foot.php") ?>