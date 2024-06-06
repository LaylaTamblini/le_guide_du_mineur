<?php include("views/components/head.php") ?>

<h1>Vos activités, <?= $utilisateur->prenom ?></h1>

<!-- Début Message Utilisateur -->
    <?php if(isset($_GET["informations_requises"])) : ?>
        <section class="message-utilisateur">
            <p>Tous les champs sont requis sauf l'image. Merci de les remplir pour continuer.</p>
        </section>
    <?php endif; ?>

    <?php if(isset($_GET["succes_activite"])) : ?>
        <section class="message-utilisateur">
            <p>Bravo! L'activité a été créer!</p>
        </section>
    <?php endif; ?>

    <?php if(isset($_GET["id_inexistant"])) : ?>
        <section class="message-utilisateur">
            <p>L'activité n'existe pas.</p>
        </section>
    <?php endif; ?>

    <?php if(isset($_GET["echec_suppression"])) : ?>
        <section class="message-utilisateur">
            <p>L'activité n'a pas pu être supprimé. Réessayez plus tard.</p>
        </section>
    <?php endif; ?>

    <?php if(isset($_GET["succes_suppression"])) : ?>
        <section class="message-utilisateur">
            <p>L'activité a été supprimé!</p>
        </section>
    <?php endif; ?>
<!-- Fin Message Utilisateur -->

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
                <a href="activites-supprimer?id=<?= $activite->id ?>">
                    <span class="material-icons">
                        delete
                    </span>
                </a>

                <p><?= $activite->categorie_nom ?></p>
                <p><?= $activite->titre ?></p>
                
                <?php if($activite->image): ?>
                    <img src="<?= $activite->image ?>" alt="" width="300px">
                <?php endif; ?>
            </article>
        <?php endforeach; ?>
        <!-- Fin Foreach Activité -->

    <?php endif; ?>

</section>

<a href="activites-creer">Créer une activité</a>
<a href="compte-deconnecter">Se déconnecter</a>

<?php include("views/components/foot.php") ?>