<?php
/* 
Ce code est utilisé pour modifier le titre d'une tâche. 
Il vérifie d'abord si la requête est une requête POST et si un id a été passé en paramètre GET. 
Si ces conditions sont remplies, il modifie le titre de la tâche avec l'id passé en paramètre GET et sauvegarde la liste mise à jour des tâches. 
Ensuite, il redirige vers 'index.php'. Si un id a été passé en paramètre GET, il récupère la tâche avec cet id. 
Enfin, il affiche un formulaire pour modifier le titre de la tâche.

*/

// Inclut le fichier 'head.php' du dossier 'layout' et le fichier 'functions.php'
require_once 'layout/head.php';
require_once 'functions.php';

// Vérifie si la méthode de la requête est POST et si un id a été passé en paramètre GET
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['id'])) {
    // Si c'est le cas, récupère la liste actuelle des tâches
    $todos = getTodos();
    // Modifie le titre de la tâche avec l'id passé en paramètre GET avec le titre passé en paramètre POST
    $todos[$_GET['id']]['title'] = $_POST['title'];
    // Sauvegarde la liste mise à jour des tâches
    saveTodos($todos);
    // Redirige vers 'index.php'
    header('Location: index.php');
    // Termine l'exécution du script
    exit();
}

// Vérifie si un id a été passé en paramètre GET
if (isset($_GET['id'])) {
    // Si c'est le cas, récupère la liste actuelle des tâches
    $todos = getTodos();
    // Récupère la tâche avec l'id passé en paramètre GET
    $todo = $todos[$_GET['id']];
}

?>
<!-- Début du code HTML -->
<div class=header>
    <!-- Formulaire pour modifier le titre de la tâche -->
    <form method="POST">
        <legend>Titre de la tâche* </legend>
        <!-- Champ de texte prérempli avec le titre actuel de la tâche -->
        <input type="text" name="title" value="<?php echo $todo['title']; ?>" required>
        <!-- Bouton pour soumettre le formulaire -->
        <input type="submit" value="Valider">
    </form>
</div>
<!-- Fin du code HTML -->