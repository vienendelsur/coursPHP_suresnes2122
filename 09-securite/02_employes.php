<?php 
// 1 FONCTIONS
require_once '../inc/functions.php';  

// 2 CONNEXION BDD
$pdoENT = new PDO( 'mysql:host=localhost;dbname=entreprise',// hôte nom BDD
              'root',// pseudo 
              '',// mot de passe
              // 'root',// mdp pour MAC avec MAMP
              array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,// afficher les erreurs SQL dans le navigateur
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',// charset des échanges avec la BDD
              ));
              // debug($pdoENT);
              // debug(get_class_methods($pdoENT));

// 3 TRI DES DONNEES DU TABLEAU 
// a initialisation de la variable pour le select du tri des données 
$order = '';

// b conditions multiples à partir de $_GET cf. https://www.w3schools.com/php/php_if_else.asp
if (isset($_GET['colonne']) && isset($_GET['tri'])) {
  debug($_GET);
  if ($_GET['colonne'] == 'nom') {
    $order .= 'ORDER BY nom';
  } elseif ($_GET['colonne'] == 'salaire') {
    $order .= 'ORDER BY salaire';
  } elseif ($_GET['colonne'] == 'service') {
    $order .= 'ORDER BY service';
  } 

  if ($_GET['tri'] == 'asc') {
    $order .= ' ASC';
  }
  elseif ($_GET['tri'] == 'desc') {
    $order .= ' DESC';
  }
}

// d select 
$requete = $pdoENT->query( " SELECT * FROM employes $order " );
// debug($requete);
$nbr_employes = $requete->rowCount();
// debug($nbr_employes);
          

// 4 TRAITEMENT DU FORMULAIRE
if ( !empty($_POST) ) {
    // debug($_POST);
  $_POST['prenom'] = htmlspecialchars($_POST['prenom']);// pour se prémunir des failles et des injections SQL
	$_POST['nom'] = htmlspecialchars($_POST['nom']);
	$_POST['sexe'] = htmlspecialchars($_POST['sexe']);
	$_POST['service'] = htmlspecialchars($_POST['service']);
	$_POST['date_embauche'] = htmlspecialchars($_POST['date_embauche']);
	$_POST['salaire'] = htmlspecialchars($_POST['salaire']);

	$insertion = $pdoENT->prepare( " INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES (:prenom, :nom, :sexe, :service, :date_embauche, :salaire) ");// requete préparée avec des marqueurs

	$insertion->execute( array(
		':prenom' => $_POST['prenom'],
		':nom' => $_POST['nom'],
		':sexe' => $_POST['sexe'],
		':service' => $_POST['service'],
		':date_embauche' => $_POST['date_embauche'],
		':salaire' => $_POST['salaire'],
	));
}
// 5 INITIALISATION DE LA VARIABLE $contenu
$contenu = "";

// 6 SUPPRESSION D'UN EMPLOYE
// debug($_GET);
if (isset($_GET['action']) && $_GET['action'] == 'supprimer' && isset($_GET['id_employes'])) {
  $resultat = $pdoENT->prepare( " DELETE FROM employes WHERE id_employes = :id_employes " );

  $resultat->execute(array(
    ':id_employes' => $_GET['id_employes']
  ));

  if ($resultat->rowCount() == 0) {
    $contenu .= '<div class="alert alert-danger"> Erreur de suppression</div>';
  } else {
    $contenu .= '<div class="alert alert-success"> Employé supprimé</div>';
  }
}

?>
<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>CoursPHP - Chapitre 09 - 02 employés</title>

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
      <h1 class="display-4 text-center">CoursPHP - Chapitre 09 - 02 employé</h1>
      <p class="lead">les employés de l'entreprise</p>
    <?php whatDay(); ?>
    </header> 
    <!-- fin container-fluid header  -->
      <div class="container bg-white mt-2 mb-2 m-auto p-2">
  
        <section class="row">
  
          <div class="col-md-12">
            <h2>les employés</h2>
            
            <h5>Il y a <?php echo $nbr_employes; ?> employés </h5>
            <?php echo $contenu; ?>

            <table class="table table-striped">
             <thead>
               <tr>
                 <th>Id</th>
                 <th><a href="02_employes.php?colonne=nom&tri=asc">a-z</a> Nom <a href="02_employes.php?colonne=nom&tri=desc">z-a</a> </th>
                 <th>Prénom</th>
                 <th><a href="02_employes.php?colonne=service&tri=asc">a-z</a> Service <a href="02_employes.php?colonne=service&tri=desc">z-a</a></th>
                 <th><a href="02_employes.php?colonne=salaire&tri=asc">a-z</a> Salaire <a href="02_employes.php?colonne=salaire&tri=desc">z-a</a></th>
                 <th>Date d'embauche</th>
                 <th>Détail</th>
                 <th>Suppression</th>
               </tr>
             </thead>
             <tbody>
				 <!-- ouverture de la boucle while -->
               <?php while ( $ligne = $requete->fetch( PDO::FETCH_ASSOC )) { ?>
			   <tr>
				   <td><?php echo $ligne['id_employes']; ?></td>                   
				   <td><?php echo $ligne['nom']; ?></td>
				   <td><?php echo $ligne['prenom']; ?></td>
				   <td><?php echo $ligne['service']; ?></td>
				   <td><?php echo $ligne['salaire']; ?></td>
				   <td><?php echo $ligne['date_embauche']; ?></td>
          <td><a href="03_fiche_employe.php?id_employes=<?php echo $ligne['id_employes']; ?>">maj</a></td>
          <td><a href="?action=supprimer&id_employes=<?php echo $ligne['id_employes']; ?>" onclick="return(confirm('Voulez-vous supprimer cet employé ? '))">suppression</a></td>
			   </tr>
			   <!-- fermeture de la boucle -->
			   <?php } ?>
             </tbody>
            </table>
          </div>
          <!-- fin col -->
  
          <div class="col-md-12">
            <h2>Nouvel employé</h2>
            <!-- action vide car nous envoyons les données avec cette même page et POST va envoyer dans la superglobale $_POST -->
			<form action="" method="POST" class="border border-primary p-1">
            <div class="mb-3">
                <label for="prenom" class="form-label">Prénom</label>
                <input type="text" name="prenom" id="prenom" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="nom" class="form-label">Nom de famille</label>
                <input type="text" name="nom" id="nom" class="form-control" required>
            </div>

            <div class="mb-3">
            <!-- https://getbootstrap.com/docs/5.1/forms/checks-radios/ -->
                <label for="sexe" class="form-label">Sexe </label><br>
                <input type="radio" name="sexe" value="m" id="sexe" checked> Homme <br>
                <input type="radio" name="sexe" value="f" id="sexe"> Femme
            </div>

            <div class="mb-3">
                <label for="service" class="form-label">Service</label>
                <select name="service" id="service">
                    <option value="">---</option>
                    <option value="commercial">Commercial</option>
                    <option value="communication">Communication</option>
                    <option value="comptabilite">Comptabilité</option>
                    <option value="direction">Direction</option>
                    <option value="informatique">Informatique</option>
                    <option value="juridique">Juridique</option>
                    <option value="production">Production</option>
                    <option value="secretariat">Secrétariat</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="date_embauche" class="form-label">Date d'embauche</label>
                <input type="date" name="date_embauche" id="date_embauche" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="salaire" class="form-label">Salaire mensuel</label>
                <input type="text" name="salaire" id="salaire" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Ajouter un employé</button>

            </form>

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