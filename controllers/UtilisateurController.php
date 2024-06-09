<?php

namespace Controllers;

use Bases\Controller;
use Models\Utilisateur;

class UtilisateurController extends Controller {

    /**
     * Affiche la page d'accueil.
     */
    public function index() {
        // Protection de la route
        if(!empty($_SESSION["utilisateur_id"])) {
            $this->rediriger("activites");
        }

        $this->vue("index", [
            "titre" => " | Accueil ⛏️"
        ]);
    }

    /**
     * Affiche le formulaire de création de compte.
     */
    public function create() {
        // Protection de la route
        if(!empty($_SESSION["utilisateur_id"])) {
            $this->rediriger("activites");
        }
        
        $this->vue("utilisateurs/create", [
            "titre" => " | Création de compte 💎"
        ]);
    }

    /**
     * Traite la création d'un compte.
     */
    public function store() {
        // Validation des champs
        if(empty($_POST["prenom"]) ||
           empty($_POST["nom"]) || 
           empty($_POST["email"]) ||
           empty($_POST["mot_de_passe"]) ||
           empty($_POST["confirmation_mdp"])) {

            $this->rediriger("compte-creer?informations_requises");
        }

        $utilisateur = (new Utilisateur)->parEmail($_POST["email"]);

        if($utilisateur) {
            $this->rediriger("compte-creer?erreur_courriel");
        }

        if($_POST["mot_de_passe"] != $_POST["confirmation_mdp"]) {
            $this->rediriger("compte-creer?mdp_invalide");
        }

        $succes = (new Utilisateur)->ajouter(
            $_POST["prenom"],
            $_POST["nom"],
            $_POST["email"],
            password_hash($_POST["mot_de_passe"], PASSWORD_DEFAULT)
        );

        if(!$succes) {
            $this->rediriger("compte-creer?echec_creation");
        }

        $this->rediriger("index?succes_creation");
    }
    
    /**
     * Traite la connexion d'un utilisateur.
     */
    public function connecter() {
        if(empty($_POST["email"]) || empty($_POST["mot_de_passe"])){
            $this->rediriger("index?informations_requises");
        }

        // Récupère un utilisateur selon son e-mail
        $utilisateur = (new Utilisateur)->parEmail($_POST["email"]);

        // Validation de l'utilisateur et de son mot de passe
        if(!$utilisateur || $_POST["mot_de_passe"] != password_verify($_POST["mot_de_passe"], $utilisateur->mot_de_passe) ) {
            $this->rediriger("index?informations_invalides");
        }

        $_SESSION["utilisateur_id"] = $utilisateur->id;

        $this->rediriger("activites?succes_connexion");
    }

    /**
     * Traite la déconnexion d'un utilisateur.
     */
    public function deconnecter() {
        // Protection de la route
        if(empty($_SESSION["utilisateur_id"])) {
            $this->rediriger("index");
        }

        session_destroy();
        $this->rediriger("index?succes_deconnexion");
    }
}