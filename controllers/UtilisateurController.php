<?php

namespace Controllers;

use Bases\Controller;
use Models\Utilisateur;

class UtilisateurController extends Controller {

    /**
     * Affiche la page d'accueil à l'utilisateur
     */
    public function index() {
        // Protection de la route
        if(!empty($_SESSION["utilisateur_id"])) {
            $this->rediriger("activites");
        }

        $this->vue("index");
    }
    
    /**
     * Traite la connexion de l'usilisateur
     */
    public function connecter() {
        if(empty($_POST["email"]) || empty($_POST["mot_de_passe"])){
            $this->rediriger("index?informations_requises");
        }

        // Récupère un utilisateur selon son email
        $utilisateur = (new Utilisateur)->parEmail($_POST["email"]);

        // Validation de l'utilisateur et son mot de passe
        // Ajouter password_verify + tard
        if(!$utilisateur || $_POST["mot_de_passe"] != password_verify($_POST["mot_de_passe"], $utilisateur->mot_de_passe) ) {
            $this->rediriger("index?informations_invalides");
        }

        $_SESSION["utilisateur_id"] = $utilisateur->id;

        $this->rediriger("activites?succes_connexion");
    }

    /**
     * Traite la déconnexion de l'utilisateur
     */
    public function deconnecter() {
        session_destroy();
        $this->rediriger("index?succes_deconnexion");
    }

    /**
     * Affiche le formulaire de création de compte
     */
    public function create() {
        $this->vue("utilisateurs/create");
    }

    public function store() {
        if(empty($_POST["prenom"]) ||
           empty($_POST["nom"]) || 
           empty($_POST["email"]) ||
           empty($_POST["mot_de_passe"]) ||
           empty($_POST["confirmation_mdp"])){
            $this->rediriger("compte-creer?informations_requises");
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

}