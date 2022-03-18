<?php
// 1- Je require ma connexion à la base de données
require('inc/init.inc.php');

// 3- Traitement de l'ajout d'article
if (!empty($_POST)) { // Je vérifie que le formulaire n'est pas vide puis j'exécute le code
    /* Vérification insertion SQL et failles */
    $POST['image'] = htmlspecialchars($_POST['image']);
    $POST['title'] = htmlspecialchars($_POST['title']);
    $POST['description'] = htmlspecialchars($_POST['description']);
    $POST['postal_code'] = htmlspecialchars($_POST['postal_code']);
    $POST['city'] = htmlspecialchars($_POST['city']);
    $POST['type'] = htmlspecialchars($_POST['type']);
    $POST['price'] = htmlspecialchars($_POST['price']);

    /* Je prépare ma requête avec des marqueurs vides, pour l'instant */
    $insertion = $pdoApart->prepare(" INSERT INTO advert (image, title, description, postal_code, city, type, price, reservation_message) VALUES (:image, :title, :description, :postal_code, :city, :type, :price, NULL) ");

    /* Je fais correspondre mes marqueurs vides aux éléments de mon form */
    $insertion->execute(array(
        ':image' => $_POST['image'],
        ':title' => $_POST['title'],
        ':description' => $_POST['description'],
        ':postal_code' => $_POST['postal_code'],
        ':city' => $_POST['city'],
        ':type' => $_POST['type'],
        ':price' => $_POST['price'],
    ));

    header('location:annonces.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Le Bon Appart - Ajouter une annonce</title>
    <!-- BOOTSTRAP ICONS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <!-- BOOTSWATCH CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.1.3/minty/bootstrap.min.css"><script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>


</head>

<body>

    <?php require 'inc/nav.inc.php' ?>

    <div class="p-5 bg-primary">
        <div class="container">
            <h1 class="display-3 text-white">Le Bon Appart</h1>
            <p class="lead text-white">Ajouter une annonce</p>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto border bg-light p-3 rounded my-5">
                <h2 class="text-center">Ajout d'une annonce</h2>
                <form action="#" method="POST">
                    <div class="mb-3">
                        <label for="image">Image de l'annonce</label>
                        <input type="text" name="image" id="image" class="form-control" required placeholder="URL de l'image">
                    </div><!-- IMAGE -->

                    <div class="mb-3">
                        <label for="title">Titre de l'annonce</label>
                        <input type="text" name="title" id="title" class="form-control" required>
                    </div><!-- TITRE -->

                    <div class="mb-3">
                        <label for="description">Description de l'article</label>
                        <textarea id="editor" name="description"></textarea>
                    </div><!-- DESCRIPTION -->

                    <div class="mb-3">
                        <label for="postal_code">Code postal</label>
                        <input type="number" name="postal_code" id="postal_code" class="form-control" required>
                    </div><!-- CODE POSTAL -->

                    <div class="mb-3">
                        <label for="city">Ville</label>
                        <input type="text" name="city" id="city" class="form-control" required>
                    </div><!-- VILLE -->

                    <div class="mb-3">
                        <label for="type">Type </label>
                        <select name="type" id="type" class="form-select" required>
                            <option value="vente">Vente</option>
                            <option value="location">Location</option>
                        </select>
                    </div><!-- TYPE  -->

                    <div class="mb-3">
                        <label for="price">Prix</label>
                        <input type="integer" name="price" id="price" class="form-control" required>
                    </div><!-- PRICE -->

                    <button type="submit" class="btn btn-primary" name="submit">Ajouter l'annonce</button> <!-- BOUTON SUBMIT -->

                </form>
            </div>
        </div>
    </div>
    
    <script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

    <!-- BOOTSWATCH JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>
