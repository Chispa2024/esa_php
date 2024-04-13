<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/CSS/minimaliste.css">
    <title>Mes_Fichiers</title>
</head>

<body>

    <article>
        <header>
            <h1>Mes Fichiers</h1>
        </header>

        <!--L'excercice commence ici-->

        <?php
        $dir = opendir($_SERVER['DOCUMENT_ROOT']) or die('Erreur de listage : le répertoire n\'existe pas'); // on ouvre le contenu du dossier courant
        while ($element = readdir($dir)) {
            if ($element != '.' && $element != '..') { ?>

                📁<?php echo $element . "<br />";
                }
            }

            closedir($dir);

                    ?>


                <footer>© GaP</footer>
    </article>




</body>

</html>