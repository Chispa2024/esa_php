<?php
session_start();
require_once 'layout/head.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['title'])) {
        $_SESSION['title'] = $_POST['title'];
    }
}

$title = $_POST['title'];

?>



<legend>Ajouter une description à la tâche <?php echo ' - ' . $title . ' - ' ?> </legend>
<form method="POST" action="add.php">
    <textarea placeholder="Description (optionnel)" type="text" name="description"></textarea>
    <input type="submit" value="Valider">
</form>