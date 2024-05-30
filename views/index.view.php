<?php include("views/components/head.php") ?>

<main>

    <h1>Accueil</h1>

    <section class="authentification">
        
        <!-- Formulaire de connexion -->
        <form action="compte-connecter" method="POST">

            <!-- Informations requises -->
            <?php if(isset($_GET["informations_requises"])) : ?>
                <p>Tous les champs sont requis. Merci de les remplir pour continuer.</p>
            <?php endif; ?>
            <!-- Informations invalides -->
            <?php if(isset($_GET["informations_invalides"])) : ?>
                <p>L'adresse email ou le mot de passe que vous avez entré est incorrect.</p>
            <?php endif; ?>
            
            <!-- email -->
            <input 
                type="text" 
                name="email" 
                placeholder="Adresse e-mail"
                autofocus
            >
            <!-- Mot de passe -->
            <input 
                type="password"
                name="mot_de_passe"
                placeholder="Mot de passe"
            >
            <!-- Btn submit -->
            <input 
                type="submit" 
                value="Se connecter"
            >
        </form>

        <!-- Inscription -->
        <a href="compte-creer">Inscription</a>
    </section>

</main>

<?php include("views/components/foot.php") ?>