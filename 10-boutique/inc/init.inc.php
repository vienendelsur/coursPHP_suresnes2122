<?php

// connexion la session start une constante
// une variable pour les messages du site l'appel des fonctions

// 1- CONNEXION À LA BDD
// variables pour la connexion
$host = 'localhost';// le chemin vers le serveur de données
$database = 'maboutique';// le nom de la BDD
$user = 'root';// le nom d'utilisateur pour se connecter
$psw = '';// mdp PC XAMPP
// $psw = 'root';// mdp MAC MAMP

$pdoMAB = new PDO('mysql:host='.$host.';dbname='.$database,$user,$psw,
array(
  PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,// pour afficher les warnings SQL dans le navigateur
  PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',// pour définir le charset des échanges avec la BDD
));

// var_dump(get_class_methods($pdoMAB));

//2- OUVERTURE DE SESSION
session_start();

//3- CHEMIN DU SITE DANS UNE CONSTANTE

//4- UNE VARIABLE POUR LES MESSAGES ATTENTION ne pas mettre d'espace dans la variable !
$contenu = '';

//5- INCLUSION DES FONCTIONS
require_once 'functions.inc.php';
// debug($pdoMAB);
// debug(get_class_methods($pdoMAB));

// on peut fermer le passage php ou non
?>