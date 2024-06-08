<?php include("views/components/head.php") ?>

<h1>Vos activités, <?= $utilisateur->prenom ?></h1>

<!-- Début Message Utilisateur -->
    <?php if(isset($_GET["succes_activite"])) : ?>
        <section class="message-utilisateur succes" v-if="messageUtilisateur">
            <span class="material-icons">
                priority_high
            </span>
            
            <p>Quête ajoutée avec <span>succès</span>!</p>
            
            <button @click.prevent="fermerMessage()">
                <span class="material-icons">
                    close
                </span>
            </button>
        </section>
    <?php endif; ?>

    <?php if(isset($_GET["id_inexistant"])) : ?>
        <section class="message-utilisateur" v-if="messageUtilisateur">
            <span class="material-icons">
                priority_high
            </span>
            
            <p>Cette quête semble perdue dans le néant cubique. <span>Elle n'existe pas.</span> Vérifie et réessaye!</p>
            
            <button @click.prevent="fermerMessage()">
                <span class="material-icons">
                    close
                </span>
            </button>
        </section>
    <?php endif; ?>

    <?php if(isset($_GET["echec_suppression"])) : ?>
        <section class="message-utilisateur" v-if="messageUtilisateur">
            <span class="material-icons">
                priority_high
            </span>
            
            <p>Impossible de supprimer la quête. Quelque chose a mal tourné. <span>Réessaie plus tard.</span></p>
            
            <button @click.prevent="fermerMessage()">
                <span class="material-icons">
                    close
                </span>
            </button>
        </section>
    <?php endif; ?>

    <?php if(isset($_GET["succes_suppression"])) : ?>
        <section class="message-utilisateur succes" v-if="messageUtilisateur">
            <span class="material-icons">
                priority_high
            </span>
            
            <p><span>Quête supprimée avec succès!</span> Ta liste de quêtes est à jour.</p>
            
            <button @click.prevent="fermerMessage()">
                <span class="material-icons">
                    close
                </span>
            </button>
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

                <form action="activites-supprimer" method="POST">
                    <input type="hidden" name="id" value="<?= $activite->id ?>">

                    <button type="submit">
                        <span class="material-icons">
                            delete
                        </span>
                    </button>
                </form>

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