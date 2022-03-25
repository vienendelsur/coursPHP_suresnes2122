<?php require_once 'inc/init.inc.php'; ?> 
<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>La boutique - Accueil</title>
  </head>
  <body class="m-2">      
      <?php require_once 'inc/nav.inc.php'; ?>
   <header class="container bg-warning text-white p-4 ">
     <div class="row">
        <div class="col">
            <h1 class="display-4">La Boutique  </h1>
            <p class="lead">La Boutique, tout pour plaire</p>
        </div>
          <div class="col">
            <img src="img/boutique-01.png" alt="La boutique" width="220">
          </div>
     </div>
   </header>
   <div class="container">      
        <section class="row m-4 justify-content-center">            
            <div class="col-md-8 p-2 bg-light border border-primary">
              
             <table class="table table-striped table-sm table-bordered table-hover table-inverse table-responsive">
             <thead class="thead-inverse">
                 <tr>
                   <th>Numéro</th>
                   <th>Produit</th>
                   <th>Description</th>
                   <th>Couleur</th>
                   <th>Prix</th>
                   <th>Image</th>
                   <th>Voir</th>
                 </tr>
                 </thead>
                 <tbody>
            <?php
              $requete = $pdoMAB->query( " SELECT * FROM produits " );
              // debug($requete);
              // $nbr_produits = $requete->rowCount();
              // debug($nbr_produits); 
            
              while ( $ligne = $requete->fetch( PDO::FETCH_ASSOC )) { ?>
              
                <tr>
                    <td scope="row">n° <?php echo $ligne['id_produit']; ?></td>                   
                    <td><?php echo $ligne['titre']. ' ' .$ligne['categorie']; ?></td>
                    <td><?php echo html_entity_decode($ligne['description']); ?></td>
                    <td><?php echo $ligne['couleur']; ?></td>
                    <td> <img src="<?php echo $ligne['photo']; ?>" class="figure-img img-fluid rounded img-admin"></td>
                    <td><?php echo $ligne['prix']; ?> €</td>
           <td><a href="produit.php?id_produit=<?php echo $ligne['id_produit']; ?>">Voir le produit</a></td>
                </tr>
                <!-- fermeture de la boucle -->
            <?php   } ?>
                 </tbody>
            </table>
            
            </div>
        <!-- fin col -->
        </section>
        <!-- fin row -->
   </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>
