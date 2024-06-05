<?php include("views/components/head.php") ?>

<a href="activites">Retour</a>
<h1>Création d'une activité</h1>

<section class="formulaire">
    <form action="activites-enregistrer" method="POST" enctype="multipart/form-data">
        
        <!-- Début Message Utilisateur -->
        <?php if(isset($_GET["informations_requises"])) : ?>
            <section class="message-utilisateur">
                <p>Tous les champs sont requis sauf l'image. Merci de les remplir pour continuer.</p>
            </section>
        <?php endif; ?>
        <!-- Fin Message Utilisateur -->
        
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