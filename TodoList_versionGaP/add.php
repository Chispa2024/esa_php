<?php
/*Ce code est utilisé pour ajouter une nouvelle tâche à la liste des tâches. 
Il vérifie d'abord si la requête est une requête POST. Si c'est le cas, il vérifie si un titre a été posté et si ce titre a une longueur d'au moins 1. 
Si ces conditions sont remplies, il ajoute la nouvelle tâche à la liste des tâches et sauvegarde cette liste. 
Sinon, il redirige vers 'index.php' avec un message d'erreur.*/

// Démarre une nouvelle session ou reprend une session existante
session_start();

// Inclut le fichier 'functions.php' qui contient des fonctions utiles pour le script
include_once 'functions.php';

// Vérifie si la méthode de la requête est POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Stocke le titre de la tâche postée dans la variable $title
    $title = $_POST['title'];

    // Vérifie si la longueur du titre est inférieure à 1
    if (strlen($title) < 1) {
        // Si c'est le cas, redirige vers 'index.php' avec un message d'erreur
        header("Location: index.php?erreur= Vous devez saisir au moins 1 lettre !");
        // Termine l'exécution du script
        exit;
    }

    // Vérifie si un titre a été posté
    if (isset($_POST['title'])) {
        // Si c'est le cas, récupère la liste actuelle des tâches
        $todos = getTodos();

        // Ajoute la nouvelle tâche à la liste des tâches
        // La nouvelle tâche a un statut 'Uncompleted' par défaut
        $todos[] = [
            'title' => $_POST['title'],
            'status' => 'Uncompleted'
        ];

        // Sauvegarde la liste mise à jour des tâches
        saveTodos($todos);
    }
}

// Redirige vers 'index.php'
header('Location: index.php');
