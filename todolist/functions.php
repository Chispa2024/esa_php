<?php
/*
Ces deux fonctions sont utilisées pour lire et écrire des tâches dans un fichier CSV. 
-La fonction getTodos lit les tâches du fichier et les retourne sous forme de tableau de tableaux associatifs. 
-La fonction saveTodos prend un tableau de tâches et les écrit dans le fichier.
*/

// Définition de la fonction getTodos
function getTodos()
{
    // Initialisation d'un tableau vide pour stocker les tâches
    $todos = [];

    // Vérifie si le fichier 'todos.csv' existe
    if (file_exists('todos.csv')) {
        // Ouvre le fichier 'todos.csv' en mode lecture
        $file = fopen('todos.csv', 'r');

        // Parcourt chaque ligne du fichier
        while (($line = fgetcsv($file)) !== FALSE) {
            // Ajoute la tâche à la liste des tâches
            // La tâche est un tableau associatif avec un titre, une date limite et un statut
            // Si le statut et la date ne sont pas définis, il est défini comme une chaîne vide
            $todos[] = [
                'title' => $line[0],
                'due_date' => $line[1] ?? '',
                'status' => $line[2] ?? ''
            ];
        }

        // Ferme le fichier
        fclose($file);
    }

    // Retourne la liste des tâches
    return $todos;
}

// Définition de la fonction saveTodos
function saveTodos($todos)
{
    // Ouvre le fichier 'todos.csv' en mode écriture
    $file = fopen('todos.csv', 'w');

    // Parcourt chaque tâche
    foreach ($todos as $todo) {
        // Écrit la tâche dans le fichier
        fputcsv($file, $todo);
    }

    // Ferme le fichier
    fclose($file);
}
