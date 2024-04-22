
    <?php
    /**
     * @author Name <email@email.com>
     * @param boolean $ok
     * @param string $op
     * @param integer $n1
     * @param integer $n2
     */

    // ici commence le php
    $ok = false;

    do {
        $n1 = readline("Entrez un nombre : ");
        if (is_numeric($n1)) {
            $ok = true;
        } else {
            echo "J'ai demandé un nombre\n";
        }
    } while ($ok === false);

    $ok = false;

    do {
        $n2 = readline("Entrez un autre nombre : ");
        if (is_numeric($n2)) {
            $ok = true;
        } else {
            echo "Avoue.... c'est juste pour tester hein !\n";
        }
    } while ($ok === false);

    $ok = false;

    do {
        $op = readline("Entrez l'opération à effectuer (+ - / * %) : ");
        if ($op == "+" || $op == "-" || $op == "*" || $op == "/" || $op == "%") {
            $ok = true;
        } else {
            echo "Ce n'est pas une opération de base ! \n";
        }
    } while ($ok === false);

    if ($op == "/" && $n2 == 0) {
        echo "Division par zéro impossible\n";
        exit;
    };

    switch ($op) {
        case "+":
            echo "Le résultat est : " .  $n1 + $n2;
            break;
        case "-":
            echo "Le résultat est : " . $n1 - $n2;
            break;
        case "*":
            echo "Le résultat est : " . $n1 * $n2;
            break;
        case "/":
            echo "Le résultat est : " . $n1 / $n2;
            break;
        default:
            echo "Operation invalide";
    }
