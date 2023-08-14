<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Place libre </title>
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
     <style>
        table {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }
    </style>
    <link rel="stylesheet" href="mystyle.css">
<body>
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
        <a href="listvoit.php" class="nav-link active" aria-current="page"  >
          <svg class="bi me-2" width="16" height="16"><use xlink:href="listvoit.php"/></svg>
          VOITURE
        </a>
      </li>
      <li>
        <a href="reservlist.php" class="nav-link text-white"  >
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
        <a href="recttet.php" class="nav-link text-white">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="recettet.php"/></svg>
          DASHBOARD
        </a>
      </li>
    </div>
  </div>
<script src="js/bootstrap.bundle.min.js" ></script>
<script src="sidebars.js"></script>
</main>
</div>
<div class="list">
<h2>Places libres d'une voiture</h2>
<?php
// Connexion à la base de données
include 'connexion.php';
// Récupération de l'identifiant de la voiture à afficher
$idvoit = $_GET["rn"];
// Requête SQL pour récupérer les places occupées de la voiture
$sql = "SELECT place FROM place WHERE idvoit = '$idvoit' AND occupation = 'oui'";
$result = $con->query($sql);
$places_occupees = array();
// Stockage des places occupées dans un tableau
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $places_occupees[] = $row["place"];
    }
}
// Requête SQL pour récupérer le nombre total de places de la voiture
$sql = "SELECT nbrplace FROM voiture WHERE idvoit = '$idvoit'";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nbrplace = $row["nbrplace"];
} else {
    $nbrplace = 0;
}
// Affichage du tableau HTML avec les places libres
echo "<p>Il reste ".($nbrplace - count($places_occupees))." place(s) libre(s) sur la voiture .$idvoit.</p>";
echo "<table class = 'table ' ><tr class = 'table-dark' ><th>Place</th><th>Statut</th></tr>";
for ($i = 1; $i <= $nbrplace; $i++) {
    if (in_array($i, $places_occupees)) {
        echo "<tr><td>".$i."</td><td>Occupée</td></tr>";
    } else {
        echo "<tr><td>".$i."</td><td>Libre</td></tr>";
    }
}
echo "</table>";
// Fermer la connexion
$con->close();
?>
</body>
</html>
