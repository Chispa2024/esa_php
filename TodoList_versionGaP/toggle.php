<?php
/* 
Ce code est utilisé pour changer le statut d'une tâche. 
Il vérifie d'abord si la requête est une requête POST. Si c'est le cas, il vérifie si un id a été posté. 
Si ces conditions sont remplies, il change le statut de la tâche avec l'id posté et sauvegarde la liste mise à jour des tâches. 
Enfin, il redirige vers 'index.php'.
*/

// Inclut le fichier 'functions.php' qui contient des fonctions utiles pour le script
include_once 'functions.php';

// Vérifie si la méthode de la requête est POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifie si un id a été posté
    if (isset($_POST['id'])) {
        // Si c'est le cas, récupère la liste actuelle des tâches
        $todos = getTodos();

        // Change le statut de la tâche avec l'id posté
        // Si le statut est 'Completed', il le change en 'Uncompleted'
        // Si le statut est 'Uncompleted', il le change en 'Completed'
        $todos[$_POST['id']]['status'] = $todos[$_POST['id']]['status'] === 'Completed' ? 'Uncompleted' : 'Completed';

        // Sauvegarde la liste mise à jour des tâches
        saveTodos($todos);
    }
}

// Redirige vers 'index.php'
header('Location: index.php');
// Termine l'exécution du script
exit();
