<?php

namespace Models;

use Bases\Model;

class Utilisateur extends Model {
    protected $table = "utilisateurs";
    
    /**
     * Ajoute un nouvel utilisateur dans la base de donnée.
     *
     * @param string $prenom Prénom de l'utilisateur
     * @param string $nom Nom de famille de l'utilisateur
     * @param string $email Adresse e-mail de l'utilisateur
     * @param string $mot_de_passe Mot de passe de l'utilisateur
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
     * @param string $email Adresse e-mail de l'utilisateur.
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