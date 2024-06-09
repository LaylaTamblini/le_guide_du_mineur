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
            "activites" => (new Activite)->toutAvecUtilisateur($_SESSION["utilisateur_id"]),
            "utilisateur" => (new Utilisateur)->parId($_SESSION["utilisateur_id"]),
            "titre" => " | Liste des quêtes"
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
            "categories" => (new Categorie)->tout(),
            "titre" => " | Ajouter une quête"
        ]);
    }

    /**
     * Traite l'enregistrement d'une activité dans la base de donnée.
     */
    public function store() {
        // Protection de la route
        if(empty($_SESSION["utilisateur_id"])){
            $this->rediriger("index");
        }

        if(empty($_POST["titre"]) || 
           empty($_POST["categories"])) {
            $this->rediriger("activites-creer?informations_requises");
        }

        $image = null;
        if(!empty($_FILES["image"])) {
            $image = (new Upload("image"))->placerDans("uploads");
        }

        $succes = (new Activite)->ajouter(
            $_POST["titre"],
            $image,
            $_POST["categories"],
            $_SESSION["utilisateur_id"]
        );

        if(!$succes) {
            $this->rediriger("activites-creer?echec_activite");
        }

        $this->rediriger("activites?succes_activite");
    }

    /**
     * Traite la suppression d'une activité
     */
    public function destroy() {
        // Protection de la route
        if(empty($_SESSION["utilisateur_id"])){
            $this->rediriger("index");
        }
        
        if(empty($_POST["id"])) {
            $this->rediriger("activites?id_inexistant");
        }

        $succes = (new Activite)->supprimer($_POST["id"]);

        if(!$succes) {
            $this->rediriger("activites?echec_suppression");
        }
        
        $this->rediriger("activites?succes_suppression");
    }

}