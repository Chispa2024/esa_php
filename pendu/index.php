<?php

/**
 * @author GaP
 * @copyright 2024 GaP
 * @description Le jeu du pendu en PHP. Le jeu utilise 3 fichiers:
 *-index.php contenant le code principal du jeu.
 *-mots.txt contenant une liste de mots à deviner.
 *-dessin.php contenant les dessins du jeu en caracteres.
 *  @param string $titre
 *  @param array $mots
 *  @param string $motADeviner
 *  @param string $lettresDuMot
 *  @param array $lettresTrouvees
 *  @param array $lettresEssayees
 *  @param int $temptatives
 *  @param string $lettre
 *  @param string $rejouer
 */


include 'dessin.php';
echo $titre . "\n" . "\n";

function removeAccents($string) {
    return iconv('UTF-8', 'ASCII//TRANSLIT', $string);
}

do {

    // Lire le contenu du fichier mots.txt et renvoie le résultat dans le tableau $mots
    $mots = file('mots.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    // Choisir un mot au hasard
    $motADeviner = strtolower($mots[array_rand($mots)]);

    // Convertir le mot en tableau de lettres
    $lettresDuMot = str_split($motADeviner);

    // Initialiser le tableau des lettres trouvées
    $lettresTrouvees = array_fill(0, count($lettresDuMot), '_');

    // Initialiser le tableau des lettres essayées
    $lettresEssayees = [];

    // Initialiser le compteur de temptatives à 8
    $temptatives = 8;



    // La boucle principale du jeu
    while (true) {
        // Afficher le dessin du pendu
        echo dessinPendu($temptatives);

        // Afficher les lettres trouvées
        echo implode(' ', $lettresTrouvees) . "\n";

        // Demander une lettre à l'utilisateur
        $lettre = readline("Entrez une lettre : ");

        // Convertir la lettre en minuscule et supprimer les espaces en début et fin de chaîne
        $lettre = trim($lettre);
        $lettre = strtolower($lettre);
        $lettre = removeAccents($lettre);

        // Vérifier que le jouer a entré une seule lettre
        if (mb_strlen($lettre, 'UTF-8') != 1) {
            echo "Erreur : vous devez entrer une seule lettre.\n";
            continue;
        }

        // Vérifier que la lettre est dans l'alphabet
        if (!ctype_alpha($lettre)) {
            echo "Erreur : vous devez entrer une lettre de l'alphabet.\n";
            continue;
        }

        // Vérifier si la lettre a déjà été essayée
        if (in_array($lettre, $lettresEssayees)) {
            echo "Erreur : vous avez déjà essayé cette lettre.\n";
            continue;
        }

        // Ajouter la lettre aux tableau de lettres essayées
        $lettresEssayees[] = $lettre;

        // Vérifier si la lettre est dans le mot
        if (in_array($lettre, $lettresDuMot)) {
            // Remplacer les lettres trouvées dans le tableau des lettres trouvées
            foreach ($lettresDuMot as $index => $lettreDuMot) {
                if ($lettreDuMot === $lettre) {
                    $lettresTrouvees[$index] = $lettre;
                }
            }

            // Vérifier si toutes les lettres du mot ont été trouvées
            if ($lettresTrouvees === $lettresDuMot) {
                echo "Félicitations, vous avez trouvé le mot : " . implode('', $lettresTrouvees) . "\n";
                echo $coeur;
                break;
            }
        } else {
            // Diminuer le compteur de temptatives
            $temptatives--;
            echo " Désolé ! La lettre '$lettre' n'est pas dans le mot. \n Vous avez encore $temptatives tentatives\n";


            // Vérifier si le joueur a perdu
            if ($temptatives === 0) {
                echo dessinPendu($temptatives);
                echo "Désolé, vous avez perdu. Le mot était : $motADeviner " . "\n";
                break;
            }
        }
    }
    //Demander au joueur s'il veut rejouer
    $rejouer = readline("Voulez vous rejouer? (y/n)");
} while ($rejouer == "y");
