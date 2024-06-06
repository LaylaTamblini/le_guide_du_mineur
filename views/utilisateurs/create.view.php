<?php include("views/components/head.php") ?>

<a href="index">Retour</a>
<h1>Création de compte</h1>

<section class="formulaire">
    <form action="compte-enregistrer" method="POST">

        <!-- Début Message Utilisateur -->
        <?php if(isset($_GET["informations_requises"])) : ?>
            <section class="message-utilisateur">
                <p>Tous les champs sont requis. Merci de les remplir pour continuer.</p>
            </section>
        <?php endif; ?>
    
        <?php if(isset($_GET["mdp_invalide"])) : ?>
            <section class="message-utilisateur">
                <p>Le mot de passe et la confirmation de mot de passe ne correspondent pas.</p>
            </section>
        <?php endif; ?>

        <?php if(isset($_GET["erreur_courriel"])) : ?>
            <section class="message-utilisateur">
                <p>L'adresse e-mail existe déjà. Veuillez vous 
                    <a href="index">connecter</a>
                </p>
            </section>
        <?php endif; ?>
        <!-- Fin Message Utilisateur -->

        <input type="text" name="prenom" placeholder="Prénom" autofocus>
        <input type="text" name="nom" placeholder="Nom">
        <input type="email" name="email" placeholder="Adress e-mail">
        <input type="password" name="mot_de_passe" placeholder="Mot de passe">
        <input type="password" name="confirmation_mdp" placeholder="Confirmer votre mot de passe">
        <input type="submit" value="Créer votre compte">
    </form>
</section>

<?php include("views/components/foot.php") ?>