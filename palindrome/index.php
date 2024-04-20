<?

/**
 * @author Gabriela <gabriela.pena.perez@gmail.com>
 * @copyright 2024 GaP
 * TEST GITHUB DESKTOP
 * c'est pas vrai c'est gg qui mange tout !
 * Gabriella mange des croissants de bon matin.
 * GG, voici la modification pour verifier le conflits
 */

// lit le mot en ligne de commande
$mot = readline("Entrer un mot: ");

/**
 * Palindrome function
 *
 * @param [string] $mot
 * @return void
 */

function estPalindrome($mot)
{
    // convertir le mot en minuscule et supprimer les espaces
    $mot = strtolower(str_replace(' ', '', $mot));

    // Longueur du mot
    $longueur = strlen($mot);

    // Vérifier si le mot est un palindrome
    for ($i = 0; $i < $longueur / 2; $i++) {
        if ($mot[$i] != $mot[$longueur - 1 - $i]) {
            return false;
        }
    }


    // Le mot est un palindrome
    return true;
}

//affiche comme résultat
echo $mot . " est-il un palindrome ? : " . (estPalindrome($mot) ? "Oui" : "Non") . "\n";
