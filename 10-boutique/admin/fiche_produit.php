<?php 
// require connexion, session etc.
require_once '../inc/init.inc.php';

if (!estAdmin()) { // accès non autorisé si on n'est pas admin (et pas connecté)
    header('location:../connexion.php');
}

// 3 RÉCEPTION DES INFORMATIONS D'UN PRODUIT AVEC $_GET
// debug($_GET);
if ( isset($_GET['id_produit']) ) {
    // debug($_GET);
    $resultat = $pdoMAB->prepare( " SELECT * FROM produits WHERE id_produit = :id_produit " );
    $resultat->execute(array(
      ':id_produit' => $_GET['id_produit']
    ));
    // debug($resultat->rowCount());
      if ($resultat->rowCount() == 0) { // si le rowCount est égal à 0 c'est qu'il n'y a pas de produit
          header('location:accueil.php');// redirection vers la page de départ
          exit();// arrêt du script
      }  
      $fiche = $resultat->fetch(PDO::FETCH_ASSOC);//je passe les infos dans une variable
    //   debug($fiche);// ferme if isset accolade suivante
      } else {
      header('location:accueil.php');// si j'arrive sur la page sans rien dans l'url
      exit();// arrête du script
  }



?> 
<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>La Boutique - Administration</title>
  </head>
  <body class="m-2">
   <header class="container bg-primary text-white p-4 ">
        <h1 class="display-4">La Boutique - Administration</h1>
        <p class="lead">La Boutique - gestion d'un produit</p>
   </header>
   <div class="container">      
        <section class="row m-4 justify-content-center">
            <h2>Le produit : <?php echo $fiche['titre']; ?></h2>           
            <div class="col-md-8 p-2 bg-light border border-primary">
                <table class="table table-striped">
                <tr>
                    <td> <img src="../<?php echo $fiche['photo']; ?>" class="figure-img img-fluid rounded img-admin"></td>
                    <td> ID <?php echo $fiche['id_produit']; ?></td>
                    <td>ref. <?php echo $fiche['reference']; ?></td>                   
                    <td><?php echo $fiche['titre']. ' ' .$fiche['categorie']; ?></td>
                    <td><?php echo $fiche['taille']; ?></td>
                    <td><?php echo $fiche['description']; ?></td>
                    <td><?php echo $fiche['couleur']; ?></td>
                    <td><?php echo $fiche['public']; ?></td>
                    <td><?php echo $fiche['prix']; ?> €</td>
                    <td><?php echo $fiche['stock']; ?></td>
                </tr>
                <!-- fermeture de la boucle -->
            </table>
            </div>
        <!-- fin col -->
        </section>
        <!-- fin row -->

        <section class="row m-4 justify-content-center"> 
            <h2>Insertion d'un nouveau produit</h2>          
            <div class="col-md-8 p-2 bg-light border border-primary">
                <?php echo $contenu; ?>
                <form action="" method="POST" enctype="multipart/form-data" class="p-2">
                    <!-- l'attribut entype spécifie que le formulaire envoie des fichiers en plus de données texte ; il va nous permettre de télécharger un fichier ici une photo -->

                    <label for="reference" class="form-label">Référence *</label>
                    <!-- opérateur de coalescence ; si il n'y rien je mets une chaine vide  -->
                    <input type="text" name="reference" id="reference" class="form-control" value="<?php echo $fiche['reference'] ?? 'qsdfgqsdf'; ?>">

                    <label for="categorie" class="form-label">Catégorie *</label>
                    <input type="text" name="categorie" id="categorie" class="form-control">

                    <label for="titre" class="form-label">Titre *</label>
                    <input type="text" name="titre" id="titre" class="form-control">

                    <label for="description" class="form-label">Description *</label>
                    <textarea name="description" id="description" cols="30" rows="3" class="form-control"></textarea>

                    <label for="couleur" class="form-label">Couleur *</label>
                    <input type="text" name="couleur" id="couleur" class="form-control" value="<?php echo $fiche['couleur']; ?>">

                    <label for="taille" class="form-label">Taille *</label>
                    <select name="taille" id="taille" class="form-select">
                    <option value="XS"<?php if (!strcmp("XS", $fiche['taille'])) { echo " selected"; }?>>Extra-small</option>
                        <option value="XS">Extra-small</option>
                        <option value="S">Small</option>
                        <option value="M"<?php if (!strcmp("M", $fiche['taille'])) { echo " selected"; }?>>Medium</option>
                        <option value="M">Medium</option>
                        <option value="L">Large</option>
                        <option value="XL">Extra-large</option>
                    </select>

                    <input type="radio" name="public" value="f" class="form-check-input" checked>
                    <label for="public" class="form-check-label">Femme</label>

                    <input type="radio" name="public" value="m" class="form-check-input">
                    <label for="public" class="form-check-label">Masculin</label>

                    <input type="radio" name="public" value="mixte" class="form-check-input">
                    <label for="public" class="form-check-label">Mixte</label>

                    <label for="photo" class="form-label">Photographie *</label>
                    <input type="file" name="photo" id="photo" class="form-control">
                    <!-- pour pouvoir utiliser le type="file" il FAUT ABSOLUMENT l'attribut enctype="multipart/form-data" dans la balise form-->

                    <label for="prix" class="form-label">Prix *</label>
                    <input type="text" name="prix" id="prix" class="form-control">

                    <label for="stock" class="form-label">Stock *</label>
                    <input type="text" name="stock" id="stock" class="form-control">

                    <button class="btn btn-outline-success" type="submit">Ajouter un produit</button>

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
