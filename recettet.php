<?php
  ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>recette total</title>
    <link rel="stylesheet" href="mystyle.css">
    <link rel="canonical" href="index.html">
    <!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet" >

    <!-- Favicons -->
<link rel="apple-touch-icon" href="../../assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="../../assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="../../assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="../../assets/img/favicons/manifest.json">
<link rel="mask-icon" href="../../assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="../../assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#7952b3">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }
      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
</head>
<body class="pe-5">>
<div class="">
<main>
  <h1 class="visually-hidden">Sidebars examples</h1>
  <div class="navBar d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;">
    <a href="../../../../index.html" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
      <span class="fs-4">COOPERATIVE</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="interface.php"  class="nav-link text-white" >
          <svg class="bi me-2" width="16" height="16"><use xlink:href="interface.php"/></svg>
          CLIENT
        </a>
      </li>
      <li>
        <a href="listvoit.php" class="nav-link text-white"  >
          <svg class="bi me-2" width="16" height="16"><use xlink:href="listvoit.php"/></svg>
          VOITURE
        </a>
      </li>
      <li>
        <a href="reservlist.php" class="nav-link text-white">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="reservlist.php"/></svg>
          RESERVATION
        </a>
      </li>
      <li>
        <a href="listplace.php" class="nav-link text-white">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="listplace.php"/></svg>
          PLACE
        </a>
      </li>
      <li>
        <a href="#"  class="nav-link active" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="recettet.php"/></svg>
          RECETTE TOTAL
        </a>
      </li>
    </div>
  </div>

</main>
</div>
<div class="list"><br><br><br><br>
    <?php
        // Connexion à la base de données
        include 'connexion.php';
        
        // Requête SQL pour récupérer la recette totale
        $query = "SELECT SUM(montantavance) AS total FROM RESERVER";
        $result = mysqli_query($con, $query);
        
        // Vérification si la requête a réussi
        if ($result) {
            // Récupération du résultat
            $row = mysqli_fetch_assoc($result);
            $total = $row['total'];
            
            // Affichage du résultat
            echo "<h1>Recette totale accumullé par la coopérative : $total Ar</h1>";
        } else {
            // Affichage d'une erreur en cas d'échec de la requête
            echo "Erreur : " . mysqli_error($con);
        }



?>
</div>

<script src="js/bootstrap.bundle.min.js" ></script>
<script src="sidebars.js"></script>   
</body>
</html>