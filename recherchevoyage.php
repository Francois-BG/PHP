<?php
  ob_start();
?>
<!doctype html>
<html lang="en">


<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>recherche voyageurs</title>
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
<body class="pe-5">
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
        <a href="#" class="nav-link text-white" >
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#"/></svg>
          VOITURE
        </a>
      </li>
      <li>
        <a href="reservlist.php" class="nav-link text-white">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="reservlist"/></svg>
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
        <a href="recettet.php" class="nav-link text-white">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="recettet.php"/></svg>
          RECETTE TOTAL
        </a>
      </li>
      <li>
        <a href="#" class="nav-link active" aria-current="page" >
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#"/></svg>
          RECHERCHE 
        </a>
      </li>
    </div>
  </div>
  <script src="js/bootstrap.bundle.min.js" ></script>
  <script src="sidebars.js"></script>
</main>
</div>
<div class="list"><br><br><br><br>
<nav class="navbar navbar-dark  bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">RECHERCHE</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <form class="d-flex" method="GET">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
        <input type="radio"  name="payement"  value="avec avance" checked> <span class="text-white">avec avance</span><br>
        </li>
        <li class="nav-item">
          <input type="radio" name="payement" value="sans avance" ><span class="text-white">sans avance</span> <br>
        </li>
        <li class="nav-item">
          <input type="radio" name="payement" value="tout paye" > <span class="text-white" >tout payer</span> <br><br>
        </li>
        
        <li class="nav-item">
          <button  type="submit" name = "entrer"> Entrer</button>
        </li>
      </ul>
      </form>
    </div>
  </div>
</nav> <br><br><br><br><br><br>
<table class="table"  >
    <tr class="table-dark" >
      <th>ID reserv</th>
      <th>ID voiture</th>
      <th>ID client</th>
      <th>Place</th>
      <th>Date reserv</th>
      <th>Date voyage</th>
      <th>Payement</th>
      <th>Montant avance</th>
      <th>Action</th>
    </tr>
      <?php
        include 'connexion.php';
        if (isset($_GET['entrer'])) {
          if (isset($_GET['payement'])) {
            $payement = $_GET ['payement'];

            $sql = "SELECT * FROM reserver WHERE payement = '$payement'";
            $result = mysqli_query($con,$sql);
            while( $row = mysqli_fetch_assoc($result)) {
             
            $idreserv = $row['idreserv'];
            $idvoit = $row['idvoit'];
            $idcli = $row['idcli'];
            $place = $row['place'];
            $datereserv=$row['datereserv'];
            $datevoyage=$row['datevoyage'];
            $payement=$row['payement'];
            $montantavance=$row['montantavance'];

            echo "<tr>
                <td>".$idreserv."</td>  
                <td>".$idvoit."</td>
                <td>".$idcli."</td>
                <td>".$place."</td>
                <td>".$datereserv."</td>
                <td>".$datevoyage."</td>
                <td>".$payement."</td>
                <td>".$montantavance."</td>
                <td>
                <!-- Button trigger modal -->
                <button type='button'class='btn btn-primary modifier'data-bs-toggle='modal' >
                  modifier
                </button>
                  <a href='supprimerreserv.php?rn=$idreserv'> <button class='btn btn-danger'>Supprimer</button></a>
                  <a href='print_pdf.php?rn=$idreserv'> <button>recu pdf</button></a>

                </td>
              </tr>";
            }
          }
        }             
      ?>
    </table>
    </div>
</body>
</html>
