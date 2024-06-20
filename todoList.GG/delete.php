<?php
/*
Ce code est utilisé pour supprimer une tâche de la liste des tâches. 
Il vérifie d'abord si un id a été passé en paramètre GET. Si c'est le cas, il vérifie si la tâche avec cet id existe. 
Si ces conditions sont remplies, il supprime la tâche et sauvegarde la liste mise à jour des tâches. Enfin, il redirige vers 'index.php'.
*/

// Démarre une nouvelle session ou reprend une session existante
session_start();

// Inclut le fichier 'functions.php' qui contient des fonctions utiles pour le script
include_once 'functions.php';

// Vérifie si un id a été passé en paramètre GET
if (isset($_GET['id'])) {
    // Si c'est le cas, récupère la liste actuelle des tâches
    $todos = getTodos();

    // Vérifie si la tâche avec l'id passé en paramètre GET existe
    if (isset($todos[$_GET['id']])) {
        // Si c'est le cas, supprime la tâche
        unset($todos[$_GET['id']]);

        // Sauvegarde la liste mise à jour des tâches
        saveTodos($todos);
    }
}

// Redirige vers 'index.php'
header('Location: index.php');
