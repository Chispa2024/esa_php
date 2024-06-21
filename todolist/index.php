<?php

/**
 * @author GaP
 * @copyright 2024 GaP
 * @description Liste de tâches simple qui permet d' ajouter, editer, eliminer et marquer une tâche comme realisé.
 * Les tâches realisées se deplacent vers la liste de tâches réalisées, pour les eliminer par la suite plus facilement.
 * Cette petite application enregistre les changements de la liste de taches sur un fichier CSV.
 * Il est egalement possible de parametrer le fond d'ecran.
 */

// Démarre une nouvelle session ou reprend une session existante
session_start();

// Inclut le fichier 'head.php' qui contient le début du document HTML (doctype, balise head, etc.)
require_once 'layout/head.php';

// Inclut le fichier 'functions.php' qui contient des fonctions utiles pour le script
include_once 'functions.php';

// La fonction 'getTodos()' est appelée et son résultat est stocké dans la variable '$todos'. Cette fonction récupère la liste de tâches.
$todos = getTodos();

// Définit un tableau de couleurs disponibles
$colores = ['pastel', 'roses', 'bulles', 'water', 'mer', 'pattern', 'univers', 'space', 'formes', 'papillon', 'autom', 'jungle', 'savana', 'IA', 'rose', 'vert', 'jaune', 'blanc', 'bleu', 'mauve',];


// Vérifie si une couleur a été postée
if (isset($_POST['color'])) {
    // Si une nouvelle couleur a été postée, met à jour le cookie 'couleurPreferee'
    setcookie('couleurPreferee', $_POST['color'], mktime(0, 0, 0, 12, 31, 2037));
    $_COOKIE['couleurPreferee'] = $_POST['color'];
} elseif (!isset($_COOKIE['couleurPreferee'])) {
    // Si aucune nouvelle couleur n'a été postée et qu'aucun cookie 'couleurPreferee' n'est défini, défini une valeur par défaut
    setcookie('couleurPreferee', 'pastel', mktime(0, 0, 0, 12, 31, 2037));
    $_COOKIE['couleurPreferee'] = 'pastel';
}

// Si la méthode de la requête est POST, redirige vers 'add.php'
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Location: add.php');
    exit();
}
?>

<div class="header">
    <h1>📝 Mes tâches en PHP</h1>

    <!-- Formulaire pour choisir un fond d'ecran different -->
    <form action="index.php" method="post">
        <!-- Sélecteur de couleur -->
        <legend>Fond d'écran</legend>
        <select name="color">
            <!-- Option par défaut est la couleur préférée actuelle -->
            <option value="<?php echo $_COOKIE['couleurPreferee'] ?>"><?php echo $_COOKIE['couleurPreferee'] ?></option>
            <!-- Génère une option pour chaque couleur disponible -->
            <?php foreach ($colores as $color) : ?>
                <option value="<?php echo $color ?>"> <?php echo $color ?> </option>
            <?php endforeach ?>
        </select>
        <!-- Bouton pour soumettre le formulaire -->
        <input type="submit" value="OK" />
    </form>
</div>
</div>


</div>


<!-- Début du bloc pour ajouter une nouvelle tâche -->
<div class="header2">
    <!-- Formulaire pour ajouter une nouvelle tâche -->
    <form method="POST" action="add.php">
        <!-- Champ de saisie pour le titre de la tâche -->
        <input type="text" name="title" placeholder="Titre de la tâche">
        <!-- Date limite de la tâche -->
        <input type="date" name="due_date" value="<?php echo date('Y-m-d'); ?>">
        <!-- Bouton pour soumettre le formulaire et ajouter la tâche -->
        <input type="submit" value="+ Ajoutez une tâche">
    </form>

    <!-- Empeche l'utilisateur d'ajouter une tâche sans titre et sans date (script definit dans add.php) -->
    <?php if (isset($_REQUEST['erreur'])) : ?>
        <script>
            alert("<?php echo $_REQUEST['erreur']; ?>");
        </script>
    <?php endif; ?>
</div>
<!-- Fin du bloc pour ajouter une nouvelle tâche -->

<?php
// Initialisation des tableaux pour les tâches complétées et non complétées
$completedTasks = [];
$incompleteTasks = [];

// Parcours de toutes les tâches
foreach (getTodos() as $id => $todo) {
    // Si la tâche est complétée, ajoutez-la au tableau des tâches complétées
    if ($todo['status'] === 'Completed') {
        $completedTasks[$id] = $todo;
    } else {
        // Sinon, ajoutez-la au tableau des tâches non complétées
        $incompleteTasks[$id] = $todo;
    }
}

// Fonction de comparaison pour trier par date
function compareByDate($a, $b)
{
    $dateA = DateTime::createFromFormat('Y-m-d', $a['due_date']);
    $dateB = DateTime::createFromFormat('Y-m-d', $b['due_date']);

    if ($dateA == $dateB) {
        return 0;
    }
    return ($dateA < $dateB) ? -1 : 1;
}

// Trier les tâches non complétées par date
uasort($incompleteTasks, 'compareByDate');

// Trier les tâches complétées par date
uasort($completedTasks, 'compareByDate');
?>

<!-- Ce code PHP génère deux tableaux HTML pour afficher les tâches non complétées et complétées.
Il commence par créer un en-tête avec le titre "Tâches" et un tableau avec les en-têtes de colonnes "ID", "Titre", "Réalisé", "Editer" et "Effacer".
Ensuite, il parcourt le tableau $incompleteTasks qui contient les tâches non complétées. Pour chaque tâche, il crée une nouvelle ligne dans le tableau. 
Chaque ligne contient l'ID de la tâche, le titre de la tâche, un formulaire pour changer le statut de la tâche, un bouton pour éditer la tâche et un bouton pour supprimer la tâche. 
-Le formulaire pour changer le statut de la tâche envoie une requête POST à toggle.php avec l'ID de la tâche. 
-Le bouton pour éditer la tâche envoie une requête GET à edit.php avec l'ID de la tâche. 
-Le bouton pour supprimer la tâche envoie une requête GET à delete.php avec l'ID de la tâche.
Il fait la même chose pour le tableau $completedTasks qui contient les tâches complétées, le titre de la tâche est barré pour bien indiquer qu'elle est complétée.
Le compteur $counter est utilisé pour ignorer le premier élément de chaque tableau en evitant ainsi que l'utilisateur efface les titres du tableau CSV 
Enfin, il inclut le fichier footer.php à la fin de la page.
-->


<!-- TACHES NON TERMINEES -->


<!-- Début de l'en-tête -->
<div class="header">
    <!-- Titre de la section -->
    <h2>Tâches</h2>
</div>

<!-- Début du tableau -->
<table>
    <!-- En-tête du tableau -->
    <tr>
        <th>Titre</th>
        <th>
            Date limite
        </th>
        <th>Réalisé</th>
        <th>Editer</th>
        <th>Effacer</th>
    </tr>

    <?php
    // Initialisation du compteur
    $counter = 0;
    // Boucle sur chaque tâche non terminée
    foreach ($incompleteTasks as $id => $todo) :
        // On ignore la première ligne du document CSV qui contien les titres
        if ($counter > 0) :
            // Création d'un objet DateTime à partir de la date limite de la tâche
            $date = DateTime::createFromFormat('Y-m-d', $todo['due_date']);
            // Création d'un objet DateTime pour la date actuelle
            $now = new DateTime();
            // Détermination de la classe CSS à utiliser
            $class = $date < $now ? 'date-expiree' : '';
    ?>
            <!-- Ligne du tableau pour une tâche -->
            <tr>
                <!-- Titre de la tâche -->
                <td><?php echo $todo['title']; ?></td>
                <!-- Date limite de la tâche -->
                <td class="<?php echo $class; ?>">
                    <?php echo $date->format('d/m/Y'); ?>
                </td>
                <!-- Case à cocher pour marquer la tâche comme terminée -->
                <td>
                    <!-- Formulaire pour changer l'état de la tâche -->
                    <form action="toggle.php" method="post">
                        <!-- ID de la tâche caché -->
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <!-- Bouton de soumission -->
                        <button type="submit" style="background: url('/layout/icons/PasCompleté.png') no-repeat; width: 40px; height: 40px; border: none;"></button>
                    </form>
                </td>
                </td>
                <!-- Bouton pour éditer la tâche -->
                <td>
                    <!-- Formulaire pour éditer la tâche -->
                    <form action="edit.php" method="get">
                        <!-- ID de la tâche caché -->
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <!-- Bouton pour soumettre le formulaire -->
                        <button type="submit" style="background: url('/layout/icons/editer.png') no-repeat; width: 40px; height: 40px; border: none;"></button>
                    </form>
                </td>
                <!-- Bouton pour effacer la tâche -->
                <td>
                    <!-- Formulaire pour effacer la tâche -->
                    <form action="delete_confirmation.php" method="get">
                        <!-- ID de la tâche caché -->
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <!-- Bouton pour soumettre le formulaire -->
                        <button type="submit" style="background: url('/layout/icons/effacer.png') no-repeat; width: 40px; height: 40px; border: none;"></button>
                    </form>
                </td>
            </tr>
    <?php
        endif;
        // Incrémentation du compteur
        $counter++;
    endforeach;
    ?>
</table>




<!-- TACHES TERMINEES -->


<!-- En-tête pour les tâches terminées -->
<div class="header3">
    <h2>Tâches réalisées</h2>
</div>
<!-- Tableau pour les tâches terminées -->
<table>
    <!-- En-tête du tableau -->
    <tr>
        <th>Titre</th>
        <th>Date limite</th>
        <th>Réalisé</th>
        <th>Editer</th>
        <th>Effacer</th>
    </tr>

    <?php
    // Initialisation du compteur
    $counter = 0;
    // Boucle sur chaque tâche terminée
    foreach ($completedTasks as $id => $todo) :
    ?>
        <!-- Ligne du tableau pour une tâche -->
        <tr>
            <!-- Titre de la tâche, barré car la tâche est terminée -->
            <td class="<?php echo 'strikethrough' ?>"> <?php echo $todo['title']; ?> </td>
            <!-- Date limite de la tâche -->
            <td>
                <?php $date = DateTime::createFromFormat('Y-m-d', $todo['due_date']);
                echo $date->format('d/m/Y'); ?>
            </td>

            <!-- Case à cocher pour marquer la tâche comme non terminée -->
            <td>
                <!-- Formulaire pour changer l'état de la tâche -->
                <form action="toggle.php" method="post">
                    <!-- ID de la tâche caché -->
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <!-- Bouton de soumission -->
                    <button type="submit" style="background: url('/layout/icons/Completé.png') no-repeat; width: 40px; height: 40px; border: none;"></button>
                </form>
            </td>
            <!-- Bouton pour éditer la tâche -->
            <td>
                <!-- Formulaire pour éditer la tâche -->
                <form action="edit.php" method="get">
                    <!-- ID de la tâche caché -->
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <!-- Bouton pour soumettre le formulaire -->
                    <button type="submit" style="background: url('/layout/icons/editer.png') no-repeat; width: 40px; height: 40px; border: none;"></button>
                </form>
            </td>

            <!-- Bouton pour effacer la tâche -->
            <td>
                <!-- Formulaire pour effacer la tâche -->
                <form action="delete_confirmation.php" method="get">
                    <!-- ID de la tâche caché -->
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <!-- Bouton pour soumettre le formulaire -->
                    <button type="submit" style="background: url('/layout/icons/effacer.png') no-repeat; width: 40px; height: 40px; border: none;"></button>
                </form>
            </td>
        </tr>
    <?php
    //endif;
    // Incrémentation du compteur
    // $counter++;
    endforeach;
    ?>
</table>

<!-- Inclusion du pied de page -->
<?php require 'layout/footer.php'; ?>