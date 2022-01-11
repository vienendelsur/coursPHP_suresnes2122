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
              debug($pdoDIA);
              debug(get_class_methods($pdoDIA));

            debug($_GET);
?> 
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <textarea name="" id="" cols="30" rows="10"></textarea>
</head>
<body>
    
</body>
</html>