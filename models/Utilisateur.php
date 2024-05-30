<?php

namespace Models;

use Bases\Model;

class Utilisateur extends Model {
    protected $table = "utilisateurs";
    
    /**
     * Ajoute un nouvel utilisateur dans la base de donnée
     *
     * @param string $nom
     * @param string $prenom
     * @param string $email
     * @param string $mot_de_passe
     * 
     * @return boolean
     */
    public function ajouter(string $nom, string $prenom, string $email, string $mot_de_passe) : bool {
        $sql = "
            INSERT INTO $this->table (nom, prenom, email, mot_de_passe)
            VALUES (:nom, :prenom, :email, :mot_de_passe)
        ";

        $requete = $this->pdo()->prepare($sql);

        return $requete->execute([
            ":nom" => $nom,
            ":prenom" => $prenom,
            ":email" => $email,
            ":mot_de_passe" => $mot_de_passe,
        ]);
    }

    /**
     * Retourne un utilisateur selon un email
     *
     * @param string $email
     * 
     * @return object|false
     */
    public function paremail(string $email) : object|false {
        $sql = "
            SELECT *
            FROM $this->table
            WHERE email = :email
        ";

        $requete = $this->pdo()->prepare($sql);

        $requete->execute([
            ":email" => $email
        ]);

        return $requete->fetch();
    }
}