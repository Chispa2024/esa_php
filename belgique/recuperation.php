<?php ob_start() ?>
<?php
/**
 * @author GaP
 * @copyright 2024 GaP
 * @description Formulaire de saisie de texte pour colorer les lettres des mots dans les couleurs du drapeau choisi.
 * Les espaces ne rentrent pas en ligne de compte.
 * Il faut ecrire minimum 10 lettres, sinon un message d'erreur s'affiche, ce message est recuperé du fichier recuperation.php
 *@param tableau $texte
 * @param tableau $couleurs
 * @param tableau $lettres
 * @param string $lettre
 */
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css" />
    <title>Les Couleurs du drapeau</title>
</head>

<body>

<header>Voici votre texte avec les couleurs du drapeau choisi : </br></header>
<article>

    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $texte = $_POST['texte'];
    if (str_word_count($texte) < 10) {
        header("Location: index.php?erreur=Erreur : vous devez saisir au moins 10 mots");
        exit;
    }
}

// Tableau des couleurs dans l'ordre spécifique
$couleurs = ["black", "yellow", "red"]; // Couleurs par défaut pour la Belgique

if (isset($_POST['colorer'])) {
    switch ($_POST['colorer']) {
        case 'Mexique':
            $couleurs = ["green", "white", "red"];
            break;
        case 'France':
            $couleurs = ["blue", "white", "red"];
            break;
        default:
            break;
    }
}

// Conversion du texte en tableau de caractères
$lettres = str_split($texte);

//J'ai ajouté un "div" en gris clair afin de pouvoir voir le blanc si l'utilisateur choisi le drapeau du Mexique
echo "<div style=\"border: 2px solid black; padding: 10px; background-color: gainsboro\">";

$i = 0; // Compteur pour parcourir le tableau de couleurs
foreach ($lettres as $lettre) {
    if ($lettre != ' ') {
        echo "<span style=\"color: " . $couleurs[$i % 3] . "\">$lettre</span>";
        $i++; // Incrémentation du compteur seulement si le caractère n'est pas un espace
    } else {
        echo $lettre; // Affichage de l'espace sans changer la couleur
    }
}

echo "</div>";
?>

  </article>

<article>
    <form action="index.php" >
        <input type="submit" value="Saisisez une phrase à nouveau " />
    </form>
</article>

<footer>
    @2024 GaP
</footer>
</body>

</html>