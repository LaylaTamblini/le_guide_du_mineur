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
     * @param string $courriel
     * @param string $mot_de_passe
     * 
     * @return boolean
     */
    public function ajouter(string $nom, string $prenom, string $courriel, string $mot_de_passe) : bool {
        $sql = "
            INSERT INTO $this->table (nom, prenom, courriel, mot_de_passe)
            VALUES (:nom, :prenom, :courriel, :mot_de_passe)
        ";

        $requete = $this->pdo()->prepare($sql);

        return $requete->execute([
            ":nom" => $nom,
            ":prenom" => $prenom,
            ":courriel" => $courriel,
            ":mot_de_passe" => $mot_de_passe,
        ]);
    }

    /**
     * Retourne un utilisateur selon un courriel
     *
     * @param string $courriel
     * 
     * @return object|false
     */
    public function parCourriel(string $courriel) : object|false {
        $sql = "
            SELECT *
            FROM $this->table
            WHERE courriel = :courriel
        ";

        $requete = $this->pdo()->preapre($sql);

        $requete->execute([
            ":courriel" => $courriel
        ]);

        return $requete->fetch();
    }
}