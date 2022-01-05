<?php 
require_once '../inc/functions.php'; // APPEL DES FONCTIONS

// debug($_GET);

?>
<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>CoursPHP - Exo GET</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,400;0,700;1,400&family=Montserrat:ital,wght@0,400;0,500;1,400&display=swap" rel="stylesheet">
    
    <!-- mes styles -->
    <link rel="stylesheet" href="../css/style.css">

  </head>
  <body>
  <?php require_once '../inc/navbar.inc.php'; // NAV BAR TOP ?>  
    <header class="container-fluid f-header p-2">
      <h1 class="display-4 text-center">CoursPHP - Mon compte : Patrick Isola</h1>
      <p class="lead">SOUS TITRE</p>
    </header> 
    <!-- fin container-fluid header  -->

    <div class="container bg-white mt-2 mb-2 m-auto p-2">

      <section class="row">

        <div class="col-md-6 bg-light">
          <h2>Exo GET</h2>
          <p>Consigne</p>
          <ol>
              <li>Affichez dans cette page un titre "mon compte : nom prénom"</li>
              <li>Ajoutez un lien "modifier mon compte" : ce lien renvoie dans l'url à cette page</li>
              <li>L'"action" demandée sera "modification" (indice et valeur) quand on clique sur ce lien</li>
              <li>La valeur d'action contient-elle bien modification</li>
              <li>Si vous avez reçu cette modification par l'url affichez le texte suivant : "Vous souhaitez modifier votre compte"</li>
              <li>maitnenant un autre lien avec suppression comme indice et affichez "vous souhaitez supprimer votre compte ?"</li>
          </ol>
        </div>
        <!-- fin col -->

        <div class="col-md-6">
          <a href="05_exo_get.php?action=modification" class="btn btn-primary">Modifier mon compte</a>
          
          <a href="05_exo_get.php?action=suppression" class="btn btn-danger">Supprimer mon compte</a>
            <hr>
          <?php 
        //   isset($_GET['indice1']) && $_GET['indice1'] == 'valeurdemandée'
          if (isset($_GET['action']) && $_GET['action'] == 'modification') {
            //   debug($_GET);
              echo "<p class=\"bg-success text-white\">Vous avez demandé la modification de votre compte</p>";
          }

          if (isset($_GET['action']) && $_GET['action'] == 'suppression') {
              debug($_GET);
              echo "<p class=\"bg-danger text-white\">Voulez-vous supprimer votre compte ?</p>";
          }
          ?> 
        </div>
        <!-- fin col -->

      </section>
      <!-- fin row -->

    </div>
    <!-- fin container  -->

	
    <!-- footer en require  -->
    <?php require_once '../inc/footer.inc.php'; ?>

       <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
  </body>
</html>