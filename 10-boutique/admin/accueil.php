<?php 
// require connexion, session etc.
require_once '../inc/init.inc.php';

// debug($_SESSION);
// debug(estConnecte());
// debug(estAdmin());
debug(RACINE_SITE);

if (!estAdmin()) { // accès non autorisé si on n'est pas admin (et pas connecté)
    header('location:../connexion.php');
}

?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Accueil back office</h1>

</body>
</html>