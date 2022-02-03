<?php 
// require connexion, session etc.
require_once 'inc/init.inc.php';

// debug($_SESSION);
// debug(estConnecte());
// debug(estAdmin());

// debug(RACINE_SITE);

if (!estConnecte()) { // accès à la page autorisé quand on est connecté
    header('location:connexion.php');
}

?> 
<!DOCTYPE html>
<html lang="fr">
<!-- Required meta tags -->
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>La boutique - Bienvenue </title>
  </head>
<body>
    <header class="container bg-warning p-4 ">
            <h1 class="display-4">Votre profil </h1>
            <p class="lead">Bonjourqsd;,fndsfn,sqlkdf <?php echo $_SESSION['membre']['prenom']; ?>
            <?php
            if(estAdmin()) { // si le membre est 'admin' il n'a pas les mêmes accès qu'un membre 'client'
                echo ' -- Vous êtes administrateur</p>';
            } else {
                echo ' -- Vous êtes connecté, rendez-vous à la Boutique</p>';
            }
            ?>
            <ul class="nav nav-pills nav-fill">
            <?php 
                if(estAdmin()) { // si le membre est 'admin' il n'a pas les mêmes accès qu'un membre 'client'
                    echo '<li class="nav-item"><a class="btn btn-primary" href="' .RACINE_SITE. 'admin/accueil.php">Espace admin</a></li>';
                    echo '<li class="nav-item"><a class="btn btn-success" href="' .RACINE_SITE. 'accueil.php">Aller à la boutique</a></li>';
                } else {
                    echo '<li class="nav-item"><a class="btn btn-success" href="accueil.php">Retour à la boutique</a></li>';
                }
                if (estConnecte()) {
                    //  echo 'coucou';
                    echo '<li class="nav-item"><a class="btn btn-secondary" href="' .RACINE_SITE. 'connexion.php?action=deconnexion">Se déconnecter</a></li>';
                }
            ?>
            </ul>
    </header>
    <div class="container">
    <section class="row m-3 justify-content-center">
        <div class="col-md-4 bg-light">
            <div class="card" style="width: 18rem;">
                <img src="photos/" class="card-img-top img-fluid" alt="...">
                    <div class="card-body">
                    <h5 class="card-title"><?php echo $_SESSION['membre']['prenom']. ' ' .$_SESSION['membre']['nom']; ?></h5>
                    <p class="card-text">
                    <address>
                        Email : <?php echo $_SESSION['membre']['email']; ?> 
                        <br>Adresse : <?php echo $_SESSION['membre']['adresse']; ?>  <br>Code postal : <?php echo $_SESSION['membre']['code_postal']; ?>  <br>Ville : <?php echo $_SESSION['membre']['ville']; ?>
                    </address>
                
                    </p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>

        <div class="col-md-8 bg-danger">
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nisi ipsum eaque eos. Omnis ipsam saepe earum unde enim asperiores nemo commodi consequuntur ab deleniti, beatae explicabo repellat fuga quae expedita.</p>
        </div>
    <a href="profil.php"></a>
    </section>
    </div>
   
</body>
</html>