<?php
require_once 'layout/head.php';
require_once 'functions.php';

if (isset($_GET['id'])) {
    // Récupère la liste actuelle des tâches
    $todos = getTodos();
    // Récupère la tâche avec l'id passé en paramètre GET
    $todo = $todos[$_GET['id']];
?>

    <!-- Titre de la tâche -->
    <h1><?php echo $todo['title']; ?></h1>

    <div>

        <?php
        if (isset($_GET['confirm'])) {
            // L'utilisateur a confirmé la suppression
            header('Location: delete.php?id=' . $_GET['id']);
            exit;
        }

        // Affiche la page de confirmation
        ?>
        <b> <?php echo 'Êtes-vous sûr de vouloir supprimer cette tâche ?'; ?> </b>
        <br>
        <b> <?php echo '<a href="delete.php?confirm=1&id=' . $_GET['id'] . '">Oui </a>' . '/ '; ?> </b>
        <b> <?php echo '<a href="index.php">Non</a>'; ?> </b>
    <?php } else {
    // Redirige vers index.php si aucun ID n'est fourni
    header('Location: index.php');
    exit;
}
    ?>
    </div>