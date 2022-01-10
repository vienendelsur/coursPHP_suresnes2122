<!-- Fixed navbar -->
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-gray-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">PHP 2022, pisola</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">

          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../01-intro/01_introduction.php">Intro</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="../01-intro/02_infos.php">Infos</a>
          </li>

          <!-- <li class="nav-item">
            <a class="nav-link disabled">Désactivé</a>
          </li> -->

          <!-- 02 conditions  -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="false">Conditions</a>
            <ul class="dropdown-menu" aria-labelledby="dropdown01">
              <li><a class="dropdown-item" href="../03-conditions/01_conditions.php">Conditions</a></li>
              <li><a class="dropdown-item" href="../03-conditions/02_boucles.php">Boucles</a></li>
            </ul>
          </li>

          <!-- 03 variables  -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="false">Variables</a>
            <ul class="dropdown-menu" aria-labelledby="dropdown01">
              <li><a class="dropdown-item" href="../02-variables/01_variables.php">Variables</a></li>
              <li><a class="dropdown-item" href="../02-variables/02_types.php">Types</a></li>
              <li><a class="dropdown-item" href="../02-variables/03_chaines.php">Chaines de caractères</a></li>
              <li><a class="dropdown-item" href="../02-variables/04_tableaux.php">Tableaux</a></li>
            </ul>
          </li>

          <!-- 04 post et GET  -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="false">GET & POST</a>
            <ul class="dropdown-menu" aria-labelledby="dropdown01">
              <li><a class="dropdown-item" href="../04-GET/01_method_get.php">Get 01</a></li>
              <li><a class="dropdown-item" href="../04-GET/02_method_get.php">Get 02</a></li>
              <li><a class="dropdown-item" href="">--</a></li>

              <li><a class="dropdown-item" href="../05-POST/01_method_post.php">Post</a></li>
            </ul>
          </li>

          
          
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="false">PDO</a>
            <ul class="dropdown-menu" aria-labelledby="dropdown01">
              <li><a class="dropdown-item" href="../06-PDO/01_pdo.php">PDO</a></li>
              <li><a class="dropdown-item" href="../06-PDO/02_test.php">Test</a></li>
              <!-- <li><a class="dropdown-item" href="#">Something else here</a></li> -->
            </ul>
          </li>
        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Recherche" aria-label="Recherche">
          <button class="btn btn-outline-success" type="submit">Recherche</button>
        </form>
      </div>
    </div>
  </nav>