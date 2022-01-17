<?php 

// 1 APPEL DES FONCTIONS
require_once '../inc/functions.php';
// la variable $GLOBALS récupère toutes les informations de toutes les superglobales
// debug($GLOBALS);

// Le fichier de session peut contenir des informations sensibles, il n'est pas accessible par l'internaute
session_start();

//utilisation de $_SESSION
$_SESSION['pseudo'] =  'Tintin';
$_SESSION['mdp'] =  'Milou2022';
$_SESSION['email'] =  'tintin@moulinsart.be';

?>

<?php require_once '../inc/functions.php'; // APPEL DES FONCTIONS ?>
<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>CoursPHP - Chapitre 08 - 01 SESSION</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,400;0,700;1,400&family=Montserrat:ital,wght@0,400;0,500;1,400&display=swap" rel="stylesheet">

    <!-- mes styles -->
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>  
  <?php require_once '../inc/navbar.inc.php';// NAVBAR ?>
  <main>
    <header class="container-fluid f-header p-2">
      <h1 class="display-4 text-center">CoursPHP - Chapitre 08 - 01 SESSION</h1>
      <p class="lead">Les données du fichier de session sont accessibles et manipulables à partir de la superglobale $_SESSION.</p>
    </header> 
    <!-- fin container-fluid header  -->
      <div class="container bg-white mt-2 mb-2 m-auto p-2">
  
        <section class="row">
  
          <div class="col-md-6">
            <h2>Principe des sessions</h2>
            <p>Un fichier temporaire appelé "session" est créé sur le serveur, avec un identifiant unique. Cette session est liée à un internaute car dans le même temps, un cookie est déposé sur le poste de l'internaute avec l'identifiant (au nom de PHPSESSID). Ce cookie se détruit lorsque l'on quite le navigateur.</p>
          </div>
          <!-- fin col -->
  
          <div class="col-md-6">
            <h2>1- La session est remplie</h2>
            <?php 
            // les sessions se trouvent dans le dossier /tmp/ du serveur cad dans le dossier tmp de Xampp
            debug($_SESSION);
            // vider une partie de la session avec unset() enlève dans le tableau l'indice mdp et sa valeur 
            unset($_SESSION['mdp']);
            debug($_SESSION);
            echo '<hr>';
            // session_destroy();
            // session_destroy() n'est exécuté qu'à la fin du script. Nous voyons encore ici le contenu de la session, mais le fichier temporaire dans le dossier tmp a été supprimé
            debug($_SESSION);
            ?> 
          </div>
          <!-- fin col -->
          </section>
        <!-- fin row -->  
      </div>
      <!-- fin container  -->
    </main>
      <?php require_once '../inc/footer.inc.php';// FOOTER ?>
      <!-- Option 1: Bootstrap Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>