<?php

namespace Controllers;

use Bases\Controller;
use Models\Utilisateur;

class UtilisateurController extends Controller {

    /**
     * Affiche la page d'accueil
     */
    public function index() {
        // Protection de la route
        if(!empty($_SESSION["utilisateur_id"])) {
            $this->rediriger("activites");
        }
        $this->vue("index");
    }

    /**
     * Affiche le formulaire de création de compte
     */
    public function create() {
        $this->vue("utilisateurs/create");
    }

    public function connecter() {
        if(empty($_POST["courriel"]) || empty($_POST["mot_de_passe"])){
            $this->rediriger("index?informations_requises");
        }
    }
}