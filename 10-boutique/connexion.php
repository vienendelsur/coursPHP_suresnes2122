<?php 
// POUR SE CONNECTER ET SE DECONNECTER

require_once 'inc/init.inc.php';

// debug($_SESSION);

// 2- DÉCONNEXION DU MEMBRE

// 3- REDIRECTION VERS LA PAGE PROFIL

// 1- TRAITEMENT DU FORMULAIRE DE CONNEXION

// debug($_POST);
if ( !empty( $_POST ) ) {

    // if (empty($_POST['pseudo']) || empty($_POST['mdp']) ) { // OU
        // $contenu .='<div class="alert alert-warning">Le pseudo ou le mdp sont requis !</div>';
    // }

    if (empty($_POST['pseudo'])) { // si c'est vide = 0 ou NULL c'est false 
        $contenu .='<div class="alert alert-warning">Le pseudo est requis !</div>';
    }

    if (empty($_POST['mdp'])) { // si mdp vide
        $contenu .='<div class="alert alert-warning">Le mdp est requis !</div>';
    }

    if (empty($contenu)) { // si la variable $contenu est vide pas d'erreurs
        $resultat = executeRequete( " SELECT * FROM membres WHERE pseudo = :pseudo ", // on cherche le membre avec son pseudo unique
                        array(
                            ':pseudo' => $_POST['pseudo'],
                        ));

        if ( $resultat->rowCount() == 1 )  { // si il y a une ligne c'est qu'il y a ce pseudo et ce membre
            $membre = $resultat->fetch( PDO::FETCH_ASSOC ); 
            debug($membre);

                if ( password_verify($_POST['mdp'], $membre['mdp'])) { // si le hash du mdp de la bdd correspond au mdp du formulaire, alors password_verify retourne true
                    // echo 'coucou le membre';
                    $_SESSION['membre'] = $membre; // nous créons une session avec les infos du membre, dans un tableau multidimesionnel
                    // debug($_SESSION);
                    header( 'location:profil.php' );// on redirige le membre vers la page profil
                    exit();
                } else {
                    $contenu .='<div class="alert alert-danger">Erreur sur les identifiants !</div>';
                }
            }  else {
                $contenu .='<div class="alert alert-danger">Erreur sur les identifiants !</div>';
        } // fin if $resultat
        
    }//fin if empty $contenu

}// fin vérification formulaire

?> 
<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>La boutique - Connectez-vous</title>
  </head>
  <body class="m-2">
   <header class="container bg-primary text-white p-4 ">
        <h1 class="display-4">Connexion à votre espace </h1>
        <p class="lead">Rentrez vos identifiants pour vous connecter</p>
   </header>
   <div class="container">      
        <section class="row m-4 justify-content-center">            
            <div class="col-md-4 p-2 bg-light border border-primary">
                <p class="lead">Rentrez vos identifiants pour vous connecter</p> 
                <!-- 1- FORMULAIRE DE CONNEXION   -->
                <form action="" method="POST" class="">
                    <?php echo $contenu; ?>
                    <div class="form-group mt-2">
                        <label for="pseudo">Pseudo *</label>
                        <input type="text" name="pseudo" id="pseudo" class="form-control"> 
                    </div>
                    <div class="form-group mt-2">
                        <label for="mdp">Mot de passe *</label>
                        <input type="password" name="mdp" id="mdp" class="form-control">
                    </div>
                        <div class="form-group mt-2">
                        <input type="submit" value="Connectez-vous" class="btn btn-sm btn-success"> 
                    </div>
                </form>
            </div>
        <!-- fin col -->
        </section>
        <!-- fin row -->
   </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>
