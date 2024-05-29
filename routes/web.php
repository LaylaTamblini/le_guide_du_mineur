<?php

/**
 * Routes disponibles dans le projet
 * 
 * Format: url => [Controller, méthode]
 */
$routes = [
    "index" => ["UtilisateurController", "index"],
    "compte-creer" => ["UtilisateurController", "create"],
    "compte-enregistrer" => ["UtilisateurController", "store"],
    "compte-connecter" => ["UtilisateurController", "connecter"],
    "compte-deconnecter" => ["UtilisateurController", "deconnecter"],
    "activites" => ["ActiviteController", "index"],
];
