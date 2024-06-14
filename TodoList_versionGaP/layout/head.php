<?php
// Le fichier 'functions.php' est inclus. Ce fichier contient les fonctions utilisées dans le reste du script.
require 'functions.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- La balise 'meta' ci-dessus définit l'encodage des caractères pour le document HTML. -->

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.css">
    <!-- La balise 'link' ci-dessus importe Milligram, un framework CSS minimaliste. -->
    <link rel="stylesheet" type="text/css" href="/layout/CSS/style.css">
    <!-- La balise 'link' ci-dessus importe un fichier CSS local qui contient des styles personnalisés pour mon appli de tâches. -->
    <title>Mes Tâches</title>
    <!--favicon mignon-->
    <link rel="icon" href="/layout/icons/favicon.ico">
</head>

<body class="<?php echo isset($_COOKIE['couleurPreferee']) ? $_COOKIE['couleurPreferee'] : 'default'; ?>">
    <!-- La balise 'body' ci-dessus a une classe qui est définie dynamiquement en fonction d'un cookie. 
     Si le cookie 'couleurPreferee' est défini, sa valeur est utilisée comme nom de classe. Sinon, la classe 'default' est utilisée. -->