<?php

//1- FONCTION VAR DUMP AVEC STYLES BOOTSTRAP
function debug($mavar) {// la fonction avec son paramètre, une variable
    echo "<br><small class=\"bg-warning text-white\">... var_dump</small><pre class=\"alert alert-danger w-75\">";
    var_dump($mavar);// à cette variable on applique le fonction var_dump()
    echo "</pre>";
}

// FONCTION REQUETE PRÉPARÉE

// FONCTION POUR VÉRIFIER QUE LE MEMBRE EST CONNECTÉ

// FONCTION POUR VÉRIFIER QUE LE MEMBRE EST ADMIN
?>