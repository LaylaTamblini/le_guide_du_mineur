<?php include("views/components/head.php") ?>

<header>
    <a href="compte-deconnecter" class="btn-deco">
        <span class="material-icons">
            logout
        </span>
    </a>
            
    <a href="activites-creer" class="btn-creer">Ajouter une quête</a>
</header>


<main class="section-connecte">
    <!-- Début Message Utilisateur -->
        <?php if(isset($_GET["succes_activite"])) : ?>
            <section class="message-utilisateur succes" v-if="messageUtilisateur">
                <p>Quête ajoutée avec <span>succès</span>!</p>
                
                <button @click.prevent="fermerMessage()">
                    <span class="material-icons">
                        close
                    </span>
                </button>
            </section>
        <?php endif; ?>
    
        <?php if(isset($_GET["id_inexistant"])) : ?>
            <section class="message-utilisateur" v-if="messageUtilisateur">
                <p>Cette quête semble perdue dans le néant cubique. <span>Elle n'existe pas.</span> Vérifie et réessaye!</p>
                
                <button @click.prevent="fermerMessage()">
                    <span class="material-icons">
                        close
                    </span>
                </button>
            </section>
        <?php endif; ?>
    
        <?php if(isset($_GET["echec_suppression"])) : ?>
            <section class="message-utilisateur" v-if="messageUtilisateur">
                <p>Impossible de supprimer la quête. Quelque chose a mal tourné. <span>Réessaie plus tard.</span></p>
                
                <button @click.prevent="fermerMessage()">
                    <span class="material-icons">
                        close
                    </span>
                </button>
            </section>
        <?php endif; ?>
    
        <?php if(isset($_GET["succes_suppression"])) : ?>
            <section class="message-utilisateur succes" v-if="messageUtilisateur">
                <p><span>Quête supprimée avec succès!</span> Ta liste de quêtes est à jour.</p>
                
                <button @click.prevent="fermerMessage()">
                    <span class="material-icons">
                        close
                    </span>
                </button>
            </section>
        <?php endif; ?>
    <!-- Fin Message Utilisateur -->
    
    <!-- Liste des activités -->
    <section class="activites">

        <h1>Bienvenue, <?= $utilisateur->prenom ?>!</h1>
        
        <div class="container-activites">
            <!-- Une activité -->
            <?php if(!$activites): ?>
    
                <article class="activite">
                    <img src="public/images/bee.gif" alt="">
                    <p class="aucun-article">Il semble que tu n'as pas encore de quêtes à afficher.</p>
                    <a href="activites-creer">Crée ta première quête!</a>
                </article>
    
            <?php else: ?>
    
                <!-- Début Foreach Activité -->
                <?php foreach ($activites as $activite): ?>
                    <article class="activite">
    
                        <div>
                            <?php if($activite->image): ?>
                                <img src="<?= $activite->image ?>" alt="">
                            <?php else: ?>
                                <img src="public/images/bee.gif" alt="">
                            <?php endif; ?>
    
                            <h2 class="activite-categorie"><?= $activite->categorie_nom ?></h2>
    
                            <form action="activites-supprimer" method="POST" class="btn-delete">
                                <input type="hidden" name="id" value="<?= $activite->id ?>">
        
                                <button type="submit">
                                    <span class="material-icons">
                                        delete
                                    </span>
                                </button>
                            </form>

                            <h3><?= $activite->titre ?></h3>
                        </div>
    
    
                    </article>
                <?php endforeach; ?>
                <!-- Fin Foreach Activité -->
    
            <?php endif; ?>
        </div>
    
    </section>

</main>

<?php include("views/components/foot.php") ?>