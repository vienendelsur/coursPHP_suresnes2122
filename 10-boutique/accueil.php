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
            <?php
              $requete = $pdoMAB->query( " SELECT * FROM produits " );
              debug($requete);
              $nbr_produits = $requete->rowCount();
              debug($nbr_produits); 
            

              while ( $ligne = $requete->fetch( PDO::FETCH_ASSOC )) { ?>
              
                <tr>
                    <td><?php echo $ligne['id_produit']; ?></td>                   
                    <td><?php echo $ligne['titre']. ' ' .$ligne['categorie']; ?></td>
                    <td><?php echo $ligne['description']; ?></td>
                    <td><?php echo $ligne['couleur']; ?></td>
                    <td><?php echo $ligne['stock']; ?></td>
           <td><a href="#?id_produit=<?php echo $ligne['id_produit']; ?>">VOIR</a></td>
                </tr>
                <!-- fermeture de la boucle -->
            <?php   } 
            ?>
            </div>
        <!-- fin col -->
        </section>
        <!-- fin row -->
   </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>
