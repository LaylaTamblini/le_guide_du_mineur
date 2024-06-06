<?php

namespace Models;

use Bases\Model;

class Activite extends Model {
    protected $table = "activites"; 
    
    /**
     * Retourne toutes les activités (avec catégorie) incluant les informations sur l'utilisateur.
     *
     * @param integer $id
     * 
     * @return array|false
     */
    public function toutAvecUtilisateur(int $id) : array|false {
        $sql = "
            SELECT $this->table.*,
                utilisateurs.prenom,
                utilisateurs.nom,
                categories.nom AS categorie_nom
            FROM $this->table
            JOIN utilisateurs
                ON $this->table.utilisateur_id = utilisateurs.id
            JOIN categories
                ON $this->table.categorie_id = categories.id
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
     * @param string $titre
     * @param string $image
     * @param integer $categorie_id
     * @param integer $utilisateur_id
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