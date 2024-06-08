<?php include("views/components/head.php") ?>

<a href="activites">Retour</a>
<h1>Création d'une activité</h1>

    <!-- Début Message Utilisateur -->
    <?php if(isset($_GET["informations_requises"])) : ?>
        <section class="message-utilisateur" v-if="messageUtilisateur">
            <span class="material-icons">
                priority_high
            </span>
            
            <p>Aventurier, tu dois compléter <span>tous les champs</span>, sauf l'image, avant de continuer.</p>
            
            <button @click.prevent="fermerMessage()">
                <span class="material-icons">
                    close
                </span>
            </button>
        </section>
    <?php endif; ?>

    <?php if(isset($_GET["echec_activite"])) : ?>
        <section class="message-utilisateur" v-if="messageUtilisateur">
            <span class="material-icons">
                priority_high
            </span>
            
            <p>Quelque chose s'est mal passé lors de la création du compte. <span>Réessaie plus tard.</span></p>
            
            <button @click.prevent="fermerMessage()">
                <span class="material-icons">
                    close
                </span>
            </button>
        </section>
    <?php endif; ?>
    <!-- Fin Message Utilisateur -->

<section class="formulaire">
    <form action="activites-enregistrer" method="POST" enctype="multipart/form-data">

        <input type="text" name="titre" placeholder="Titre de l'activité" autofocus>
        <input type="file" name="image" placeholder="Image de l'activité">

        <select name="categories">
            <?php foreach ($categories as $categorie ): ?>
                <option value="<?= $categorie->id ?>">
                    <?= $categorie->nom ?>
                </option>
            <?php endforeach; ?>
        </select>

        <input type="submit" value="Créer votre activité">
    </form>
</section>

<?php include("views/components/foot.php") ?>