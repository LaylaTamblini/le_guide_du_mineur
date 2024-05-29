<?php include("views/components/head.php") ?>

<main>

    <h1>Accueil</h1>

    <section class="authentification">
        
        <!-- Formulaire de connexion -->
        <form action="compte-connecter" method="POST">
            <!-- Courriel -->
            <input 
                type="text" 
                name="courriel" 
                placeholder="Courriel"
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