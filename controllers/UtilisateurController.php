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
        $utilisateur = (new Utilisateur)->paremail($_POST["email"]);

        // Validation de l'utilisateur et son mot de passe
        // Ajouter password_verify + tard
        if(!$utilisateur || $_POST["mot_de_passe"] != $utilisateur->mot_de_passe ) {
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

}