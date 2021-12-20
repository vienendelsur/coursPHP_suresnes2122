<?php require_once '../inc/functions.php';  // appel du fichier de fonction ?>
<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>CoursPHP - Exo 02 Array</title>
    <!-- mes styles -->
    <link rel="stylesheet" href="../css/style.css">

  </head>
  <body>
  <header class="container-fluid">
        <h1 class="display-4">CoursPHP - Exo 02 Array</h1>
    </header> 
    <!-- fin container-fluid  -->

    <div class="container bg-light">
      <section class="row border border-success">
        <div class="col-sm-12">
          <?php

          // Méthode 1 Déclaration d'un tableau, d'un array 
            $tableau1 = array( 'Gabin', 'Arletty', 'Fernandel', 'Dalio', 'Pauline Carton' );
          
            echo $tableau1; // erreur de type "array to string conversion" car on ne peut pas afficher directement un tableau

            echo "<pre>";// <pre> permet de formater le texte (saut de ligne typo à chasse fixe)
            print_r( $tableau1 );// print_r affiche le contenu d'un array avec les indices 
            echo "</pre>";
            echo "<pre>";
            var_dump( $tableau1 );// var_dump affiche le contenu d'un array avec les types des valeurs
            echo "</pre>";

            // Méthode 2 
            $tableau2 = [ 'France', 'Espagne', 'Italie', 'Portugal' ];
            echo "<pre>";
            var_dump( $tableau2 );// var_dump affiche le contenu d'un array avec les types des valeurs
            echo "</pre>";

            jeprint_r($tableau2);
            debug($tableau2);
            // pour afficher une valeur du tableau on écrit son indice entre crochets
            echo $tableau2[0]. "<br>";

            debug($tableau2[2]);
            $tableau2[] = "Suisse";// les crochets vides signifient que l'on ajoute une valeur à la fin du tableau
            // $tableau2[0] = "Suisse"; // si on met un indice entre les crochets on va remplacer la valeur, le tableau aura tj la même longueur
            debug($tableau2);

            // 1 tableau associatif
            // $couleurs = array( 'b' => 'bleu', 'bl' => 'blanc', 'r' => 'rouge', );
          // dans un tableau associatif nous pouvons choisir le nom des indices 
            $couleurs = array(
              'b' => 'bleu',
              'bl' => 'blanc',
              'r' => 'rouge',
            );

            debug($couleurs);
            // un echo d'une des valeurs de notre tableau associatif
            echo '<p>La première couleur du tableau associatif est le ' .$couleurs['b']. '</p>';
            echo "<p>La première couleur du tableau associatif est le $couleurs[b]</p>"; // si l'écho est entre guillemets doubles il n'est pus util de noter l'indice associatif (ici b) entre simple quote >>>> INDISPENSABLE avec des requêtes SQL

            echo "<p> le nombre de valeurs dans le tableau est de : avec count() "  .count($couleurs). "</p>";
            echo "<p> le nombre de valeurs dans le tableau est de :  avec sizeof() "  .sizeof($couleurs). " </p>";

          ?>
        </div>
      </section>
    </div>



  
    

    <!-- fin container  -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
  </body>
</html>