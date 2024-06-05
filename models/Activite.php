<?php

namespace Models;

use Bases\Model;

class Activite extends Model {
    protected $table = "activites"; 
    
    /**
     * Retourne toutes les activités, incluant les informations sur l'utilisateur
     *
     * @param integer $id
     * 
     * @return array|false
     */
    public function toutAvecUtilisateur(int $id) {
        $sql = "
            SELECT $this->table.*,
                utilisateurs.prenom,
                utilisateurs.nom
            FROM $this->table
            JOIN utilisateurs
                ON $this->table.utilisateur_id = utilisateurs.id
            WHERE utilisateurs.id = :id";

        $requete = $this->pdo()->prepare($sql);
        $requete->execute([
            ":id" => $id
        ]);
        
        return $requete->fetchAll();
    }
}