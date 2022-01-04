<?php require_once '../inc/functions.php'; // APPEL DES FONCTIONS ?>
<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>CoursPHP - Chapitre 06 - 01 PDO</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,400;0,700;1,400&family=Montserrat:ital,wght@0,400;0,500;1,400&display=swap" rel="stylesheet">
    
    <!-- mes styles -->
    <link rel="stylesheet" href="../css/style.css">

  </head>
  <body>
    <header class="container-fluid f-header p-2">
      <h1 class="display-4 text-center">CoursPHP - Chapitre 06 - 01 PDO</h1>
      <p class="lead">Connexion à notre BDD avec PDO</p>
    </header> 
    <!-- fin container-fluid header  -->

    <div class="container bg-white mt-2 mb-2 m-auto p-2">

      <section class="row">

        <div class="col-md-6">
          <h2>1- Se connecter à la BDD</h2>
          <p><abbr title="PHP Data Object">PDO</abbr> est l'acronyme de PHP Data Object</p>
          <p>Pour se connecter à la BDD en PDO on définit une variable de connexion<br>
          <code>
          $pdoENT = new PDO( 'mysql:host=localhost;dbname=entreprise',<br>
            'root',<br>
            '',<br>
            // 'root',// mdp pour MAC<br>
            array(<br>
              PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,<br>
              PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',<br>
            ));<br>

          </code></p>

          <?php 
          // connexion à la BDD
            $pdoENT = new PDO( 'mysql:host=localhost;dbname=entreprise',// hôte et nom de la BDD
            'root',// le pseudo 
            // '',// le mot de passe
            'root',// le mdp pour MAC avec MAMP
            array(
              PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,// pour afficher les erreurs SQL dans le navigateur
              PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',// pour définir le charset des échanges avec la BDD
            ));
            // debug($pdoENT);
            // debug(get_class_methods($pdoENT));// ici nous aurons la liste des méthodes présentes dans l'objet $pdoENT
          ?> 
        </div>
        <!-- fin col -->

        <div class="col-md-6">
          <h2>2- Faire des requêtes avec <code>exec()</code></h2>
          <p>La méthode exec() est utilisée pour faire des requêtes qui ne retournent pas de résultats : INSERT, DELETE, UPDATE</p>
          <ul>
            <li>Succès ; le var_dump() de la variable $requete donnera le nombre de lignes affectées par la requête = X </li>
            <li>Echec : false = 0</li>
          </ul>
          <?php 
            // on va insérer un nouvel employé dans BDD entreprise
            // toutes les lignes sont commentées afin de ne pas faire de requêtes inutiles en BDD
              // ma requête SLQ que j'aurai testé avant dans phpMyAdmin
            // INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES ('Jean', 'Saisrien', 'm', 'informatique', '2022-01-03', '2000')

            // $requete = $pdoENT->exec( " INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES ('Jean', 'Saisrien', 'm', 'informatique', '2022-01-03', '2000') " );
            // debug($requete);

            // $requete = $pdoENT->exec( " DELETE FROM employes WHERE prenom='Jean' AND nom='Saisrien' " );
            // debug($requete);
            // echo "Dernier id généré en BDD : " .$pdoENT->lastInsertId();
            // $requete = $pdoENT->exec( " UPDATE employes SET nom='COCO' WHERE nom='Saisrien' " );
          ?> 
        </div>
        <!-- fin col -->
      </section>
      <!-- fin row -->

      <section class="row">
        <div class="col-md-6">
          <h2>3- Faire des requêtes avec <code>query()</code></h2>
          <p>La méthode <code>query()</code> est utilisée pour faire des requêtes qui retournent un ou plusieurs résultats : SELECT, mais aussi DELETE, UPDATE et INSERT </p>
          <p>Pour information on peut mettre dans les paramètres de fetch() :
          <ul>
            <li>PDO::FETCH_ASSOC : pour obtenir un tableau associatif</li>
            <li>PDO::FETCH_NUM :  pour obtenir un tableau avec des indices numériques</li>
            <li>PDO::FETCH_OBJ : pour obtenir un dernier objet</li>
            <li>ou encore des parenthèses vides pour obtenir un mélange de tableau associatif et numérique</li>
          </ul>

          <?php 
            // SELECT * FROM employes WHERE prenom='Fabrice'
            // 1 on demande avec query() des informations à la BDD car il y a un ou plusieurs résultats 
            $requete = $pdoENT->query ( " SELECT * FROM employes WHERE prenom='Fabrice' " );
            // debug($requete);
            // 2 nous avons un objet $requete nous ne voyons pas encore les données concernant Fabrice, pour y accéder nous devons utiliser une méthode de $requete qui s'appelle fetch()
            $ligne = $requete->fetch( PDO::FETCH_ASSOC );
            // 3 avec fetch() on transforme l'objet $requete, avec le paramètre PDO::FETCH_ASSOC en un array associatif que l'on passe dans la variable $ligne  : on y trouve les indices, les noms des colonnes de la table, et les valeurs correspondantes
            // debug($ligne);

            echo "<p> Nom : " .$ligne['prenom']. " " .$ligne['nom']. " - ID : " .$ligne['id_employes']. "<br>";
            echo "Salaire : " .$ligne['salaire']. " Euros - Service : " .$ligne['service']. "<br>";
            echo "Date d'embauche : " .$ligne['date_embauche']. " - Sexe : " .$ligne['sexe']. "</p>";

            // exo affichez les infos de l'employes dont l'id est 592

            $requete = $pdoENT->query ( " SELECT * FROM employes WHERE id_employes = 592 " );
            // debug($requete);
            $ligne = $requete->fetch( PDO::FETCH_ASSOC );
            // debug($ligne);

            echo "<p class=\"alert alert-success\"> Nom : " .$ligne['prenom']. " " .$ligne['nom']. " - ID : " .$ligne['id_employes']. "<br>";
            echo "Salaire : " .$ligne['salaire']. " Euros - Service : " .$ligne['service']. "<br>";
            echo "Date d'embauche : " .$ligne['date_embauche']. " - Sexe : " .$ligne['sexe']. "</p>";
          ?> 
        </div>
      <!-- fin col -->
        <div class="col-md-6">
          <h2>4 Faire des requêtes avec <code>query()</code> et afficher plusieurs résultats</h2>
          <?php 
            // SELECT * FROM employes ORDER BY nom
            $requete = $pdoENT->query(" SELECT * FROM employes ORDER BY nom ");
            $nbr_employes = $requete->rowCount();
            // debug($nbr_employes);
            echo "<p>Il y a $nbr_employes employes dans l'entreprise</p>";
            while ( $ligne = $requete->fetch(PDO::FETCH_ASSOC)) {
              echo "<p>Nom : " .$ligne['prenom']. " " .$ligne['nom']." -  service : " .$ligne['service']. "</p>";
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

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
  </body>
</html>