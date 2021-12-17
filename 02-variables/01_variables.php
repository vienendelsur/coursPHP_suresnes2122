<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>CoursPHP - Suresnes 2021/2022 - 01 Variables</title>

    <!-- mes styles -->
    <link rel="stylesheet" href="../css/style.css">
    
  </head>
  <body>
    <header class="container-fluid bg-light">
      <h1 class="display-4">CoursPHP - 01 Variables</h1>
      <p class="lead">Les variables en PHP</p>
      <?php echo "<p>Nom du fichier inclus : ".__FILE__ ."</p>"; ?>
    </header> 
    <!-- fin container-fluid  -->

    <div class="container bg-white">
        <section class="row">
            <div class="col-sm-12 col-md-4">
                        <h2>Les variables </h2>
                        <p>Chaque variable possède un identifiant particulier, qui commence toujours par le caractère dollar ($) suivi du nom de la variable. Les règles de création des noms de variable sont les suivantes :</p>
                        <ul>
                            <li>Le nom commence par un caractère alphabétique, pris dans les ensembles [a-z], [A-Z] ou par le tiret bas (_).</li>
                            <li>Les caractères suivants peuvent être les mêmes plus des chiffres.</li>
                            <li>La longueur du nom n’est pas limitée, mais il convient d’être raisonnable sous peine de confusion dans la saisie du code. Il est conseillé de créer des noms de variable le plus « parlant » possible. En relisant le code contenant la variable $nomclient, par exemple, vous comprenez davantage ce que vous manipulez que si vous aviez écrit $x ou $y.</li>  
                        </ul>
            </div>
            <!-- fin col -->

            <div class="col-sm-12 col-md-4">
                <h3>Déclaration des variables</h3>
                <ul>
                    <li>La déclaration des variables n'est pas obligatoire en début de script, c'est un différence avec JS ou C. On peut créer des variables n'importe où mais avant de les utiliser. Toutefois utiliser une variable non créée ne provoquera pas d'erreur.</li>
                    <li>Il n'est pas necessaire d'initialiser une variable et une variable n'aura pas de type.</li>
                    <li>Les noms de variables sont sensibles à la casse (maj et min) ; $mavar est différent de $maVar</li>
                </ul>
            </div>
            <!-- fin col -->

            <div class="col-sm-12 col-md-4">
                <h3>Noms de variables</h3>

                <div class="row">
                    <div class="col-md-6">
                        <h5>Noms de variables autorisés</h5>
                        <ul>
                            <li>$mavar</li>
                            <li>$_mavar</li>
                            <li>$M1</li>
                            <li>$_12345</li>
                        </ul>
                    </div>
                    <div class="col-md-6 alert alert-danger">
                        <h5>Noms de variables interdits</h5>
                            <ul>
                                <li>$*mavar</li>
                                <li>$5mavar</li>
                                <li>$mavar2+</li>
                            </ul>
                    </div>
                </div>
                
            </div>
            <!-- fin col -->
        </section>
        <!-- fin row -->

        <section class="row">
            <div class="col-sm-12">
                <h3>Affectation de variables par valeur et par référence</h3>
                <p>Affecter c'est donner une valeur à une variable. A sa création vous ne donnez pas son type à une variable, c'est la valeur que vous lui affectez qui détermine ce type. </p>
                <h5>Exemples :</h5>
                <ul>
                    <li><code>$mavar = 75;</code></li>
                    <li><code>$mavar = "Paris"; </code> ou <code>$mavar = 'Paris'; </code></li>
                    <li><code>$mavar=7*3+2/5-91%7;</code> : PHP évalue l'expression puis affecte le résultat </li>
                    <li><code>$mavar=mysql_connect($a,$b,$c);</code> : la fonction retourne une ressource </li>
                    <li><code>$mavar=isset($var&&($var==9)); </code> : la fonction retourne une valeur booléenne, TRUE ou FALSE</li>
                </ul>
            </div>
            <!-- fin col -->
        </section>
        <!-- fin row -->

        <section class="row">
            <div class="col-sm-12">
                <h2>Les variables prédéfinies</h2>
                <p>PHP dispose d’un grand nombre de variables prédéfinies, qui contiennent des informations à la fois sur le serveur et sur toutes les données qui peuvent transiter entre le poste client et le serveur, comme les valeurs saisies dans un formulaire, les cookies ou les sessions.</p>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="row">Variable</th>
                            <th scope="row">Utilisation</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <th scope="row"><code>$GLOBALS</code></th>
                            <td>Contient le nom et la valeur de toutes les variables globales du script. Les noms des variables sont les clés de ce tableau. <code>$GLOBALS["mavar"]</code> récupère la valeur de la variable $mavar en dehors de sa zone de visibilité (dans les fonctions, par exemple).</td>
                        </tr>

                        <tr>
                            <th scope="row"><code>$_COOKIE</code></th>
                            <td>Contient le nom et la valeur des cookies enregistrés sur le poste client dans un tableau (array). Les noms des cookies sont les clés de ce tableau.</td>
                        </tr>

                        <tr>
                            <th scope="row"><code>$_ENV</code></th>
                            <td>Contient le nom et la valeur des variables d’environnement qui sont changeantes selon les serveurs.</td>
                        </tr>

                        <tr>
                            <th scope="row"><code>$_FILES</code></th>
                            <td>Contient le nom des fichiers téléchargés à partir du poste client.</td>
                        </tr>
                        <tr>
                            <th scope="row"><code>$_GET</code></th>
                            <td>Contient le nom et la valeur des données issues d’un formulaire envoyé par la méthode GET. Les noms "mame", des champs du formulaire sont les clés de cet array.</td>
                        </tr>

                        <tr>
                            <th scope="row"><code>$_POST</code></th>
                            <td>Contient le nom et la valeur des données issues d’un formulaire envoyé par la méthode POST. Les noms des champs du formulaire sont les clés de cet array.</td>
                        </tr>

                        <tr>
                            <th scope="row"><code>$_REQUEST</code></th>
                            <td>Contient l'ensemble des variables superglobales $_GET, $_POST, $_COOKIE et $_FILES
                            <br>Une variable superglobale signifie que cette variable est disponible partout dans le script, y compris au sein des fonctions !
                            </td>
                        </tr>

                        <tr>
                            <th scope="row"><code>$_SERVER</code></th>
                            <td>Contient les informations liées au serveur web, tel le contenu des en-têtes HTTP ou le nom du script en cours d’exécution. Retenons les variables suivantes :
                        <ul>
                            <li><code>$_SERVER["HTTP_ACCEPT_LANGUAGE"]</code> : contient le code de la langue du navigateur client ex. <?php echo $_SERVER["HTTP_ACCEPT_LANGUAGE"]; ?></li>
                            <li><code>$_SERVER["HTTP_COOKIE"]</code> : contient le nom et la valeur des cookies ex. <?php echo $_SERVER["HTTP_COOKIE"]; ?></li>
                            <li><code>$_SERVER["HTTP_HOST"]</code> : donne le nom de domaine ex. <?php echo $_SERVER["HTTP_HOST"]; ?></li>
                            <li><code>$_SERVER["SERVER_ADDR"]</code> : donne l'adresse IP du serveur ex. <?php echo $_SERVER["SERVER_ADDR"]; ?></li>
                            <li><code>$_SERVER["PHP_SELF"]</code> : contient le nom du script en cours, nous l'utiliserons dans les formulaires</li>
                            <li><code>$_SERVER["QUERY_STRING"]</code> : contient la chaîne de la requête utilisée pour accéder au script</li>
                        </ul>
                            </td>
                        </tr>
                        <!-- reprise cours  -->
                        <tr>
                            <th scope="row"><code>$_SESSION</code></th>
                            <td>Contient l'ensemble des noms des variables de session et leurs valeurs</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- fin col -->
        </section>
        <!-- fin row -->
    </div>  
    <!-- fin container  -->
    <!-- footer en require  -->
    <?php require_once '../inc/footer.inc.php'; ?>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
  </body>
</html>
