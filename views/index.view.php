<?php include("views/components/head.php") ?>

<main>

    <h1>Accueil</h1>

    <section class="authentification">
        <form action="compte-connecter" method="POST">

            <!-- Début Message Utilisateur -->
            <?php if(isset($_GET["informations_requises"])) : ?>
                <p>Tous les champs sont requis. Merci de les remplir pour continuer.</p>
            <?php endif; ?>

            <?php if(isset($_GET["informations_invalides"])) : ?>
                <p>L'adresse email ou le mot de passe que vous avez entré est incorrect.</p>
            <?php endif; ?>

            <?php if(isset($_GET["succes_deconnexion"])) : ?>
                <p>Vous avez été déconnecté!</p>
            <?php endif; ?>

            <?php if(isset($_GET["echec_creation"])) : ?>
                <p>La création du compte a échoué.</p>
            <?php endif; ?>

            <?php if(isset($_GET["succes_creation"])) : ?>
                <p>Votre compte a été créé!</p>
            <?php endif; ?>
            <!-- Fin Message Utilisateur -->
            
            <input type="email" name="email" placeholder="Adresse e-mail" autofocus>
            <input type="password" name="mot_de_passe" placeholder="Mot de passe">
            <input type="submit" value="Se connecter">
        </form>

        <a href="compte-creer">Inscription</a>
    </section>

</main>

<?php include("views/components/foot.php") ?>