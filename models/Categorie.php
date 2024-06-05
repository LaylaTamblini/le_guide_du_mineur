<?php

namespace Models;

use Bases\Model;

class Categorie extends Model {
    protected $table = "categories";

    public function recuperationCategories() {
        $sql = "
            SELECT *
            FROM $this->table
        ";

        $requete = $this->pdo()->prepare($sql);
        $requete->execute();
        
        return $requete->fetchAll();
    }
}