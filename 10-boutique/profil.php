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
            <p class="lead">Bonjour <?php echo $_SESSION['membre']['prenom']; ?>
            <?php
            if(estAdmin()) { // si le membre est 'admin' il n'a pas les mêmes accès qu'un membre 'client'
                echo ' -- Vous êtes administrateur</p>';
            } else {
                echo ' -- Vous êtes connecté rendez-vous à la Boutique</p>';
            }
            ?>

            <ul class="nav nav-pills nav-fill">
            <?php 
                if(estAdmin()) { // si le membre est 'admin' il n'a pas les mêmes accès qu'un membre 'client'
                    echo '<li class="nav-item"><a class="btn btn-primary" href="' .RACINE_SITE. 'admin/accueil.php">Espace admin</a></li>';
                    echo '<li class="nav-item"><a class="btn btn-success" href="' .RACINE_SITE. 'accueil.php">Aller à la boutique</a></li>';
                    echo 'coucou';
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
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem obcaecati sapiente ipsam minus voluptates facere dolore tempore voluptatem vitae fugit. Quod magni tempora qui quis quibusdam amet, delectus quae voluptate.
                
                    </p>
                    <a href="#" class="btn btn-primary">Test</a>
                </div>
            </div>
        </div>

        <div class="col-md-8">
        <form method="POST" action="" class="shadow p-3 mb-5 bg-body rounded">
			<h2>Mise à jour de vos informations</h2>
            <div class="row">
              <div class="col-4 form-group mt-2">
                  <label for="pseudo">Votre pseudo *</label>
                  <input type="text" name="pseudo" id="pseudo" value="<?php echo $_SESSION['membre']['pseudo']; ?>" class="form-control"> 
              </div>
            </div>
            <!-- <div class="form-group mt-2">
                <label for="mdp">Mot de passe *</label>
                <input type="password" name="mdp" id="mdp" value="" class="form-control">
                <small class="bg-warning">votre mot de passe doit contenir entre 4 et 20 caractères</small>
            </div> -->
            <div class="row">
              <div class="col-4 form-group mt-2">
                  <label for="nom">Nom *</label>
                  <input type="text" name="nom" id="nom" value="<?php echo $_SESSION['membre']['nom']; ?>" class="form-control">
              </div>
              <div class="col-4 form-group mt-2">
                  <label for="prenom">Prénom *</label>
                  <input type="text" name="prenom" id="prenom" value="<?php echo $_SESSION['membre']['prenom']; ?>" class="form-control"> 
              </div>
            <div class="col-4 form-group mt-2">
                <label for="email">Email *</label>
                <input type="email" name="email" id="email" value="<?php echo $_SESSION['membre']['email']; ?>" class="form-control">
            </div>
            </div>
            <!-- fin row  -->
            <div class="row">
              <div class="form-group mt-2">
                  <label for="civilite">Civilité *</label>
                  
                  <input type="radio" name="civilite" value="m" checked> Homme
                  <input type="radio" name="civilite" value="f"<?php if (isset($_SESSION['membre']['civilite']) && $_SESSION['membre']['civilite'] =='f') echo 'checked';?>> Femme            
              </div>
              <div class="col-4 form-group mt-2">
                  <label for="adresse">Adresse</label>
                  <textarea name="adresse" id="adresse" class="form-control"><?php echo $_SESSION['membre']['adresse']; ?></textarea>
              </div>
              <div class="col-4 form-group mt-2">
                  <label for="code_postal">Code postal</label>
                  <input type="text" name="code_postal" id="code_postal" value="<?php echo $_SESSION['membre']['code_postal']; ?>" class="form-control"> 
              </div>
              <div class="col-4 form-group mt-2">        
                  <label for="ville">Ville</label>
                  <input type="text" name="ville" id="ville" value="<?php echo $_SESSION['membre']['ville']; ?>" class="form-control"> 
              </div>
            </div>
            <div class="form-group mt-2">
                <input type="submit" value="Mise à jour" class="btn btn-md btn-outline-success"> 
            </div>
    </form>
        </div>
    <a href="profil.php"></a>
    </section>
    </div>
   
</body>
</html>