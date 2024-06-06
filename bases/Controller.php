<?php

namespace Bases;

class Controller {
    /**
     * Prend en charge les routes inexistantes et affiche une erreur 404.
     */
    public function erreur404() {
        $this->vue("erreurs/404", [
            "titre" => "Page introuvable"
        ]);
    }

    /**
     * Redirige à l'URL fourni.
     *
     * @param string $url
     */
    protected function rediriger(string $url) {
        header("location: $url");
        exit();
    }

    /**
     * Inclut la vue spécifiée.
     *
     * @param string $chemin
     * @param array $donnees
     */
    protected function vue(string $chemin, array $donnees = []) {
        extract($donnees);
        include("views/$chemin.view.php");
    }
}