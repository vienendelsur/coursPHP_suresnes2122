<div class="col-5">
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
                      // echo 'coucou';
                  } else {
                      echo '<li class="nav-item"><a class="btn btn-success" href="accueil.php">Retour à la boutique</a></li>';
                  }
                  if (estConnecte()) {
                      //  echo 'coucou';
                      echo '<li class="nav-item"><a class="btn btn-secondary" href="' .RACINE_SITE. 'connexion.php?action=deconnexion">Se déconnecter</a></li>';
                  }
              ?>
              </ul>
       </div>