<?php include("views/components/head.php") ?>

<h1>Création de compte</h1>
<a href="index">Retour</a>

<section class="creation-compte">
    <form action="compte-enregistrer" method="POST" enctype="multipart/form-data">
        <!-- Informations requises -->
        <?php if(isset($_GET["informations_requises"])) : ?>
            <p>Tous les champs sont requis. Merci de les remplir pour continuer.</p>
        <?php endif; ?>

        <?php if(isset($_GET["mdp_invalide"])) : ?>
            <p>Le mot de passe et la confirmation de mot de passe ne correspondent pas.</p>
        <?php endif; ?>
        
        <input type="text"name="prenom" placeholder="Prénom" autofocus>
        <input type="text" name="nom" placeholder="Nom">
        <input type="email" name="email" placeholder="Adress e-mail">
        <input type="password" name="mot_de_passe" placeholder="Mot de passe">
        <input type="password" name="confirmation_mdp" placeholder="Confirmer votre mot de passe">
        <input type="submit" value="Créer votre compte">
    </form>
</section>

<?php include("views/components/foot.php") ?>