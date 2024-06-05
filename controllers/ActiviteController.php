<?php

namespace Controllers;

use Bases\Controller;
use Models\Activite;
use Models\Categorie;
use Models\Utilisateur;
use Utils\Upload;

class ActiviteController extends Controller {

    /**
     * Affiche la liste des activités.
     */
    public function index() {
        // Protection de la route
        if(empty($_SESSION["utilisateur_id"])){
            $this->rediriger("index");
        }

        $this->vue("activites/index", [
            // Informations sur les activtiés selon l'utilisateur
            "activites" => (new Activite)->toutAvecUtilisateur($_SESSION["utilisateur_id"]),
            // Informations de l'utilisateur
            "utilisateur" => (new Utilisateur)->parId($_SESSION["utilisateur_id"]),
        ]);
    }

    /**
     * Affiche le formulaire de création d'une publication.
     */
    public function create() {
        // Protection de la route
        if(empty($_SESSION["utilisateur_id"])){
            $this->rediriger("index");
        }

        $this->vue("activites/create", [
            "categories" => (new Categorie)->tout()
        ]);
    }

    public function store() {
        // Protection de la route
        if(empty($_SESSION["utilisateur_id"])){
            $this->rediriger("index");
        }

        if(empty($_POST["titre"]) || 
           empty($_POST["categorie"])) {
            $this->rediriger("activites-creer?informations_requises");
        }

        $image = null;
        if(!empty($_FILES["image"])) {
            $image = (new Upload("image"))->placerDans("uploads");
        }

        $succes = (new Activite)->ajouter(
            $_POST["titre"],
            $_POST["categorie"],
            $image,
            $_SESSION["utilisateur_id"]
        );

        if(!$succes) {
            $this->rediriger("activites-creer?echec_activite");
        }

        $this->rediriger("activites?succes_activite");
    }

}