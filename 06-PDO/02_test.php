<?php
// APPEL DES FONCTIONS
require_once '../inc/functions.php'; 

// CONNEXION À LA BDD
// VARIABLES POUR LA CONNEXION
$host = 'localhost';//le chemin vers le serveur de données
$database = 'bibliotheque';//le nom de la BDD
$user = 'root';//le nom d'utilisateur pour se connecter
// $psw = '';//mdp PC XAMPP
$psw = 'root';// pas de mdp MAC 

$pdoBIB = new PDO('mysql:host='.$host.';dbname='.$database,$user,$psw,
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