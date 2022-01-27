<?php 
// require connexion, session etc.
require_once 'inc/init.inc.php';

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
                <form action="" method="POST" class="">
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
