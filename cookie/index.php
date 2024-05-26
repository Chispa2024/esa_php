<?php

if (isset($_COOKIE['couleurPreferee'])) {

    if (isset ($_POST['color'])) {
        $_COOKIE['couleurPreferee'] = $_POST['color'];
    }

} else {
    setcookie('couleurPreferee', 'mauve', mktime(0, 0, 0, 12, 31, 2037));

    if (isset ($_POST['color'])) {
        $_COOKIE['couleurPreferee'] = $_POST['color'];
    }
}

require_once 'header.php';

$colores = ['noir', 'rouge', 'rose', 'vert', 'jaune', 'blanc', 'bleu', 'mauve', 'plage', 'pattern', 'reflet', 'Le_banc', 'palmier'];

$nombre = mt_rand(1, 100);
setcookie('compteur', $_COOKIE['compteur']+1);
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
require_once 'footer.php';
?>
