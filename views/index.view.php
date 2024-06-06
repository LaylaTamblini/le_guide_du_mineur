<?php include("views/components/head.php") ?>

<main>

    <section class="authentification">
        <h1>Le Guide du Mineur</h1>

        <form action="compte-connecter" method="POST">
            <input type="email" name="email" placeholder="Adresse e-mail" autofocus>
            <input type="password" name="mot_de_passe" placeholder="Mot de passe">
            <input type="submit" value="Se connecter" class="btn-submit">
        </form>

        <a href="compte-creer">Créer votre compte</a>
    </section>
    
</main>

<?php include("views/components/foot.php") ?>