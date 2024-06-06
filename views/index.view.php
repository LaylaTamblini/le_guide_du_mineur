<?php include("views/components/head.php") ?>

<main>

    <section class="authentification">
        <form action="compte-connecter" method="POST">
            <label>
                Adresse e-mail
                <input type="email" name="email" placeholder="Adresse e-mail" autofocus>
            </label>

            <label>
                Mot de passe
                <input type="password" name="mot_de_passe" placeholder="Mot de passe">
            </label>

            <input type="submit" value="Se connecter">
        </form>

        <a href="compte-creer">Créer votre compte</a>
    </section>
    
</main>

<?php include("views/components/foot.php") ?>