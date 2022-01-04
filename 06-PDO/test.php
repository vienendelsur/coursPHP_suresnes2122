<?php
require_once '../inc/functions.php'; // APPEL DES FONCTIONS

// connexion à la BDD
$pdoBIB = new PDO( 'mysql:host=localhost;dbname=bibliotheque',// hôte et nom de la BDD
'root',// le pseudo 
'',// le mot de passe
// 'root',// le mdp pour MAC avec MAMP
array(
  PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,// pour afficher les erreurs SQL dans le navigateur
  PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',// pour définir le charset des échanges avec la BDD
));
debug(get_class_methods($pdoBIB));

// SELECT * FROM employes ORDER BY nom
$requete = $pdoBIB->query(" SELECT * FROM livre ");
$nbr_livres = $requete->rowCount();
// debug($nbr_livres);
echo "<p>Il y a $nbr_livres livres</p>";
while ( $ligne = $requete->fetch(PDO::FETCH_ASSOC)) {
  echo "<p>Nom : " .$ligne['auteur']. " " .$ligne['id_livre']." -  service : " .$ligne['titre']. "</p>";
}

?>