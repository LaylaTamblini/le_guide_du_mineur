<?php

namespace Models;

use Bases\Model;

class Activite extends Model {
    protected $table = "activites"; 
    
    /**
     * Retourne toutes les activités, incluant les informations sur l'utilisateur.
     *
     * @param integer $id Id de l'utilisateur
     * 
     * @return array|false
     */
    public function toutAvecUtilisateur(int $id) : array|false {
        $sql = "
            SELECT $this->table.*,
                utilisateurs.prenom,
                utilisateurs.nom AS utilisateur_nom
            FROM $this->table
            JOIN utilisateurs
                ON $this->table.utilisateur_id = utilisateurs.id
            WHERE utilisateurs.id = :id
        ";

        $requete = $this->pdo()->prepare($sql);
        $requete->execute([
            ":id" => $id
        ]);
        
        return $requete->fetchAll();
    }

    /**
     * Ajoute une nouvelle activité dans la base de donnée.
     *
     * @param string $prenom Prénom de l'utilisateur
     * @param string $nom Nom de famille de l'utilisateur
     * @param string $email Adresse e-mail de l'utilisateur
     * @param string $mot_de_passe Mot de passe de l'utilisateur
     * 
     * @return boolean
     */


    public function ajouter(string $titre, string $image, int $categorie_id, int $utilisateur_id) : bool {
        $sql = "
            INSERT INTO $this->table (titre, image, categorie_id, utilisateur_id)
            VALUES (:titre, :image, :categorie_id, :utilisateur_id)
        ";

        $requete = $this->pdo()->prepare($sql);

        return $requete->execute([
            ":titre" => $titre,
            ":image" => $image,
            ":categorie_id" => $categorie_id,
            ":utilisateur_id" => $utilisateur_id,
        ]);
    }
}