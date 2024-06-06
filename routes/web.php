<?php

/**
 * Routes disponibles dans le projet
 * 
 * Format: url => [Controller, méthode]
 */
$routes = [
    // Affiche la vue de la page d'accueil
    "index" => ["UtilisateurController", "index"],
    // Affiche la vue de la page de création de compte
    "compte-creer" => ["UtilisateurController", "create"],
    // Traite la création de compte
    "compte-enregistrer" => ["UtilisateurController", "store"],
    // Traite la connexion
    "compte-connecter" => ["UtilisateurController", "connecter"],
    // Traite la déconnexion
    "compte-deconnecter" => ["UtilisateurController", "deconnecter"],
    // Affiche la vue de la publication des activités
    "activites" => ["ActiviteController", "index"],
    // Affiche la vue vers la page de création d'une activité
    "activites-creer" => ["ActiviteController", "create"],
    // Traite la création d'une activité
    "activites-enregistrer" => ["ActiviteController", "store"],
    // Traite la suppression d'une activité
    "activites-supprimer" => ["ActiviteController", "destroy"],
];
