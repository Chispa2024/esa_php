<?php

if (isset ($_POST['color'])) {
    // Si une nouvelle couleur a été postée, mettez à jour le cookie
    $_COOKIE['couleurPreferee'] = $_POST['color'];
    setcookie('couleurPreferee', $_POST['color'], mktime(0, 0, 0, 12, 31, 2037));

} elseif (!isset($_COOKIE['couleurPreferee'])) {
    // Si aucune nouvelle couleur n'a été postée et qu'aucun cookie 'couleurPreferee' n'est défini, définissez une valeur par défaut
    setcookie('couleurPreferee', 'mauve', mktime(0, 0, 0, 12, 31, 2037));
    $_COOKIE['couleurPreferee'] = 'mauve';
}

require_once 'header.php';

//Header HTML
require_once 'header.php';

//Liste deroulente
$colores = ['noir', 'rouge', 'rose', 'vert', 'jaune', 'blanc', 'bleu', 'mauve', 'plage', 'pattern', 'reflet', 'Le_banc', 'palmier'];

$nombre = mt_rand(1, 100);

if (isset($_COOKIE['compteur'])) {
    // Augmenter le compteur de 1
    $_COOKIE['compteur'] += 1;
} else {
    // Définir une valeur par défaut pour $_COOKIE['compteur'] si elle n'est pas définie
    $_COOKIE['compteur'] = 1;
}


setcookie('compteur', $_COOKIE['compteur']);
echo $_COOKIE['compteur'];

?>

<p> NOMBRE ALEATOIRE : <?php echo $nombre ?> </p>


<form action="index.php" method="post">

        <legend><b>Sélectionnez un fond d'écran de la liste: </b></legend>
        <select name="color" >
            <option value="<?php echo $_COOKIE['couleurPreferee'] ?>"><?php echo $_COOKIE['couleurPreferee'] ?></option>
            <?php foreach ($colores as $color): ?>
            <option value= "<?php echo $color ?>" > <?php echo $color ?> </option>
            <?php endforeach ?>
        </select>
    <input type="submit" value="OK" />

</form>

<?php
//Footer HTML
require_once 'footer.php';
?>
