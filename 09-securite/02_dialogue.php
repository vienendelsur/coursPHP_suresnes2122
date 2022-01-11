<?php
// 1 APPEL DES FONCTIONS
require_once '../inc/functions.php';  

// 2 CONNEXION BDD dialogue
$pdoDIA = new PDO( 'mysql:host=localhost;dbname=dialogue',// hôte nom BDD
              'root',// pseudo 
              '',// mot de passe
            //   'root',// mdp pour MAC
              array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,// afficher les erreurs SQL dans le navigateur
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',// charset des échanges avec la BDD
              ));
            //   debug($pdoDIA);
            //   debug(get_class_methods($pdoDIA));



?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dialogue</title>
</head>
<body>
    <?php 
    $requete = $pdoDIA->query(" SELECT * FROM commentaires ORDER BY id_commentaires ");
    $nbr_comment = $requete->rowCount();
    // debug($nbr_comment);

    echo "<p>Il y a $nbr_comment commenbtaires dans la table<br>";

    while ( $ligne = $requete->fetch(PDO::FETCH_ASSOC)) {
      echo "Nom : " .$ligne['id_commentaires']. " " .$ligne['pseudo']. " -  message : " .$ligne['message']. " <a href=\"03_dialogue.php?id_commentaires=" .$ligne['id_commentaires']. "\">Modifier le commentaire</a> <br>";
      
    }
    echo '</p>';

    echo '<hr>';

    $les_commentaires = $pdoDIA->query(" SELECT * FROM commentaires ORDER BY id_commentaires ");
    debug($les_commentaires);
    $nbr_comment = $les_commentaires->rowCount();
    debug($nbr_comment);
    foreach (  $les_commentaires as $commentaires ) {
       echo $commentaires['message']. '<br>';
    }

    ?> 
</body>
</html>