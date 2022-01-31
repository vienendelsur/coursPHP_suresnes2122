<?php

//1- FONCTION VAR DUMP AVEC STYLES BOOTSTRAP
function debug($mavar) {// la fonction avec son paramètre, une variable
    echo "<br><small class=\"bg-warning text-white\">... var_dump</small><pre class=\"alert alert-danger w-75\">";
    var_dump($mavar);// à cette variable on applique le fonction var_dump()
    echo "</pre>";
}

//2- FONCTION POUR EXÉCUTER LES REQUETES PRÉPARÉES AVEC FOREACH
function executeRequete($requete, $parametres = array()) {  // utile pour toutes les requêtes 1/ la requête 2/ fabrication du tableau avec les marqueurs
    foreach ($parametres as $indice => $valeur) { // boucle foreach
        $parametres[$indice] = htmlspecialchars($valeur); // opur éviter les injections SQL
        global $pdoMAB;// "global" nous permet d'accéder à la variable $pdoMAB dans l'espace global du fichier init.inc.php
 
        $resultat = $pdoMAB->prepare($requete); // prépare la requête
        $succes = $resultat->execute($parametres); // et exécute

        if ($succes === false ) {
            return false; // si la reqête n'a pas marché je renvoie "false"
        } else {
            return $resultat;// sinon je renvoie les résultats de la requête
        }// fin if else
    }// fin foreach
}// fin fonction

//3- FONCTION POUR VÉRIFIER QUE LE MEMBRE EST CONNECTÉ
function estConnecte() {
    if (isset($_SESSION['membre'])) { // si il y a un indice membre, le membre est passé par la page de connexion
        return true; // il est connecté
    } else {
        return false; // il n'est pas connecté
    }
}

//4- FONCTION POUR VÉRIFIER QUE LE MEMBRE EST ADMIN (et qu'il est connecté)
function estAdmin() { 
    if ( estConnecte() && $_SESSION['membre']['statut'] == 1 ) { // si le membre à le statut 1 il est considéré admin
        return true; // il est connecté ET il est admin
    } else {
        return false; // il est connecté MAIS il n'est pas admin
    }
}

?>