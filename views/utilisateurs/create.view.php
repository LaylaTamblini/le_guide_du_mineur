<?php include("views/components/head.php") ?>

<main>

    <!-- Début Message Utilisateur -->
    <?php if(isset($_GET["informations_requises"])) : ?>
        <section class="message-utilisateur" v-if="messageUtilisateur">
            <span class="material-icons">
                priority_high
            </span>
            
            <p>Aventurier, tu dois compléter <span>tous les champs</span> avant de continuer.</p>
            
            <button @click.prevent="fermerMessage()">
                <span class="material-icons">
                    close
                </span>
            </button>
        </section>
    <?php endif; ?>

    <?php if(isset($_GET["mdp_invalide"])) : ?>
        <section class="message-utilisateur" v-if="messageUtilisateur">
            <span class="material-icons">
                priority_high
            </span>

            <p>Tes mots de passe ne correspondent pas. Assure-toi qu'ils sont <span>identiques.</span></p>

            <button @click.prevent="fermerMessage()">
                <span class="material-icons">
                    close
                </span>
            </button>
        </section>
    <?php endif; ?>

    <?php if(isset($_GET["erreur_courriel"])) : ?>
        <section class="message-utilisateur">
            <span class="material-icons">
                priority_high
            </span>

            <p>Cette adresse e-mail est déjà utilisée! <a href="index">Connecte-toi</a> pour continuer ton aventure.</p>

            <button @click.prevent="fermerMessage()">
                <span class="material-icons">
                    close
                </span>
            </button>
        </section>
    <?php endif; ?>
    <!-- Fin Message Utilisateur -->

    <section class="formulaire">
        <h1>Création de compte</h1>
    
        <form action="compte-enregistrer" method="POST">
            <input type="text" name="prenom" placeholder="Prénom" autofocus>
            <input type="text" name="nom" placeholder="Nom">
            <input type="email" name="email" placeholder="Adresse e-mail">
            <input type="password" name="mot_de_passe" placeholder="Mot de passe">
            <input type="password" name="confirmation_mdp" placeholder="Confirmer votre mot de passe">
            <input type="submit" value="Créer votre compte" class="btn-submit">
        </form>

        <a href="index">Se connecter</a>
    </section>

</main>

<?php include("views/components/foot.php") ?>