<?php

namespace Controllers;

use Bases\Controller;
use Models\Activite;
use Models\Categorie;
use Models\Utilisateur;

class ActiviteController extends Controller {

    public function index() {
        // Protection de la route
        if(empty($_SESSION["utilisateur_id"])){
            $this->rediriger("index");
        }

        $this->vue("activites/index", [
            // Informations sur les activtiés selon l'utilisateur
            "activites" => (new Activite)->toutAvecUtilisateur($_SESSION["utilisateur_id"]),
            // Informations de l'utilisateur
            "utilisateur" => (new Utilisateur)->parId($_SESSION["utilisateur_id"])
        ]);
    }

}