<?php include("views/components/head.php") ?>

<header>
    <a href="activites" class="btn-deco btn-back">
        <span class="material-icons">
            arrow_back
        </span>
    </a>
</header>

<main class="section-connecte">

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
        <h1>Création d'une quête</h1>
        
        <form action="activites-enregistrer" method="POST" enctype="multipart/form-data">
            <input type="text" name="titre" placeholder="Titre de l'activité" autofocus>
            
            <label class="choisir-image btn-submit">
                Choisir une image
                <input type="file" name="image" @change="contenirFichier">
            </label>

            <p class="nom-fichier">{{nomFichier}}</p>

            <select name="categories">
                <option value="" disabled selected>Choisir une catégorie</option>
                <?php foreach ($categories as $categorie ): ?>
                    <option value="<?= $categorie->id ?>">
                        <?= $categorie->nom ?>
                    </option>
                <?php endforeach; ?>
            </select>
    
            <input type="submit" value="Ajouter une quête" class="btn-submit">
        </form>
    </section>
    
</main>

<?php include("views/components/foot.php") ?>