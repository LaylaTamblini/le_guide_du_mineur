<?php

namespace Controllers;

use Bases\Controller;
use Models\Activite;
use Models\Utilisateur;

class ActiviteController extends Controller {

    public function index() {
        // Protection de la route
        if(empty($_SESSION["utilisateur_id"])){
            $this->rediriger("index");
        }

        $this->vue("activites/index", [
            "activites" => (new Activite)->toutAvecUtilisateur($_SESSION["utilisateur_id"]),
            "utilisateur" => (new Utilisateur)->parId($_SESSION["utilisateur_id"])
        ]);
    }

}