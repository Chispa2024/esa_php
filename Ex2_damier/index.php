<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/CSS/styles.css">
  <title>Damier</title>
</head>


<body>

  <article>
    <header>
      <h1>Damier</h1>
    </header>

    <!--L'excercice commence ici-->
    <div class="damier">
      <?php
      for ($row = 0; $row < 8; $row++) {
        for ($col = 0; $col < 8; $col++) {
          $colorChoice = ($row + $col) % 2 == 0 ? 'color1' : 'color2';
          echo "<div class='case $colorChoice'></div>";
        }
      }
      ?>
    </div>




    <footer>© Gabriela</footer>
  </article>




</body>

</html>