<?php

namespace Models;

use Bases\Model;

class Utilisateur extends Model {
    protected $table = "utilisateurs";
    
    /**
     * Ajoute un nouvel utilisateur dans la base de donnée.
     *
     * @param string $prenom
     * @param string $nom
     * @param string $email
     * @param string $mot_de_passe
     * 
     * @return boolean
     */
    public function ajouter(string $prenom, string $nom, string $email, string $mot_de_passe) : bool {
        $sql = "
            INSERT INTO $this->table (prenom, nom, email, mot_de_passe)
            VALUES (:prenom, :nom, :email, :mot_de_passe)
        ";

        $requete = $this->pdo()->prepare($sql);

        return $requete->execute([
            ":prenom" => $prenom,
            ":nom" => $nom,
            ":email" => $email,
            ":mot_de_passe" => $mot_de_passe,
        ]);
    }

    /**
     * Retourne un utilisateur selon un email.
     *
     * @param string $email
     * 
     * @return object|false
     */
    public function parEmail(string $email) : object|false {
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