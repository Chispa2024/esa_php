<?php
require_once 'layout/head.php';
?>

<div>

    <?php
    if (isset($_GET['confirm'])) {
        // L'utilisateur a confirmé la suppression
        header('Location: delete.php?id=' . $_GET['id']);
        exit;
    }

    if (isset($_GET['id'])) {
        // Affiche la page de confirmation
    ?>
        <p> <?php echo 'Êtes-vous sûr de vouloir supprimer cette tâche ?'; ?> </p>
    <?php
        echo '<a href="delete.php?confirm=1&id=' . $_GET['id'] . '">Oui </a>' . '/ ';
        echo '<a href="index.php">Non</a>';
    } else {
        // Redirige vers index.php si aucun ID n'est fourni
        header('Location: index.php');
        exit;
    }
    ?>
</div>