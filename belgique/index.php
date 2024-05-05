<?php
/**
 * @author GaP
 * @copyright 2024 GaP
 * @description Formulaire de saisie de texte pour colorer les lettres en noir, jaune et rouge.
 * Les espaces ne rentrent pas en ligne de compte.
 * Il faut ecrire minimum 10 lettres, sinon un message d'erreur s'affiche, ce message est recuperé du fichier recuperation.php
 */
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css" />
    <title>Ton texte en Couleur</title>
</head>

<body>
<header></header>
<article>
<form action="recuperation.php" method="post">
    <legend><b>Ton texte en couleur</b></legend>
    <label ="texte">Saisissez votre texte (10 mots minimum): </label>
    <input type="text" id="texte" name="texte">
    <button type="submit" name="colorer" value="Belgique" style="background: url(./1.svg); width: 50px; height: 50px;"></button>
    <button type="submit" name="colorer" value="Mexique" style="background: url(./2.svg); width: 50px; height: 50px;"></button>
</form>

<?php
if (isset($_REQUEST['erreur'])) {
    echo $_REQUEST['erreur'];
}
?>

</article>

<article>

    <div id="Content">
                <p><strong> Voici du Lorem Ipsum pour tester</strong></p>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            </div><div>
                <h6>Why do we use it?</h6>
                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
            </div><br /><div>
                <h6>Where does it come from?</h6>
                <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>
            </div><div>
                <h6>Where can I get some?</h6>
                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>

</article>

<footer>@2024 GaP</footer>
</body>
</html>