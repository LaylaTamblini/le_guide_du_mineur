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

    <?php if(isset($_GET["informations_invalides"])) : ?>
        <section class="message-utilisateur" v-if="messageUtilisateur">
            <span class="material-icons">
                priority_high
            </span>

            <p>Ces informations ne passent pas le test du bloc. <span>Vérifie et réessaye!</span></p>

            <button @click.prevent="fermerMessage()">
                <span class="material-icons">
                    close
                </span>
            </button>
        </section>
    <?php endif; ?>

    <?php if(isset($_GET["succes_deconnexion"])) : ?>
        <section class="message-utilisateur succes" v-if="messageUtilisateur">
            <span class="material-icons">
                priority_high
            </span>

            <p><span>Déconnecté avec succès!</span> Nous espérons te revoir bientôt pour de nouvelles quêtes!</p>

            <button @click.prevent="fermerMessage()">
                <span class="material-icons">
                    close
                </span>
            </button>
        </section>
    <?php endif; ?>

    <?php if(isset($_GET["echec_creation"])) : ?>
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

    <?php if(isset($_GET["succes_creation"])) : ?>
        <section class="message-utilisateur succes">
            <span class="material-icons">
                priority_high
            </span>

            <p>Création de compte réussie ! Ton aventure cubique peut maintenant <span>commencer</span>!</p>

            <button @click.prevent="fermerMessage()">
                <span class="material-icons">
                    close
                </span>
            </button>
        </section>
    <?php endif; ?>
    <!-- Fin Message Utilisateur -->

    <section class="formulaire">
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