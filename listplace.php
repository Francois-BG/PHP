
<?php
  ob_start();
?>
<?php
    include 'connexion.php';

    if(isset($_POST['ajout']))
    {   $idvoit=$_POST['idvoit'];
        $place = $_POST['place'];
        $occupation = $_POST['occupation'];
        
        
       $query = "INSERT INTO place ( idvoit,place,occupation ) VALUES( '$idvoit','$place','$occupation')";
       $result = mysqli_query($con,$query);


       if($result){
           //echo "insertion succes";
           header('location:listplace.php');
           
       }else{
           die(mysqli_connect_error($result));
       }
    }
  

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
    <title>AJOUT PLACE</title>
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
        <a href="interface.php"  class="nav-link text-white">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="interface.php"/></svg>
          CLIENT
        </a>
      </li>
      <li>
        <a href="listvoit.php" class="nav-link text-white">
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
        <a href="listplace.php" class="nav-link active" aria-current="page">
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
    </div>
  </div>
    <script src="js/bootstrap.bundle.min.js" ></script>

      <script src="sidebars.js"></script>
</main>
</div>
<div class="list"><br><br><br><br>

<h1>Lste des Places</h1><br><br>
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary p-center" data-bs-toggle="modal" data-bs-target="#exampleModal">
  +PLACE
</button><br><br>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">+PLACE</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form  method="POST">
               <label>ID VOITURE</label>
               <select name="idvoit" id="idvoit" class='form-control' >
               <?php

                 $sql = "SELECT * FROM voiture";
                 $resultat = mysqli_query($con,$sql);

                 while ($row = mysqli_fetch_assoc($resultat)) {
                 echo "<option value = ' $row[idvoit]'>"."V ". $row['idvoit']."</option>";
                 }

                ?>
               </select><br>
               <label>place</label>
                <input type="number" name="place" ><br>
              
                <h2>occupation</h2>
               
               <input type="radio" name="occupation"  value="oui" checked> oui<br>
               <input type="radio" name="occupation" value="non" >non<br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="ajout" class="btn btn-primary">ajouter</button>
      </div>
          
       </form>
       </div>
  </div>
</div>
<table  class="table">
      <tr class="table-dark">
          <th>idvoit</th>
          <th>place</th>
          <th>occupation</th>
          <th>action</th>

      <?php


$querry ="SELECT * FROM place";
$result = mysqli_query ($con,$querry);
while( $row = mysqli_fetch_assoc($result)) {
 $idvoit =$row['idvoit'];
 $place = $row['place'];
 $occupation = $row['occupation'];

//  $querry2 ="SELECT idvoit FROM voiture"
//  $result2 = mysqli_query ($con,$querry2);
//  $row2 = mysqli_fetch_assoc($result2);
//  $idvoit= $row2['idvoit'];

    echo "
     <tr>
  <td>".$idvoit."</td>  
    <td>".$place."</td>
    <td>".$occupation."</td>
    <td>
                      
                      <a href='supprimerplace.php?rn=$place'> <button class='btn btn-danger'>Supprimer</button></a>
                      
                    </td>
    
    
    </tr>  ";
}
?>
</div>

</table>  
</div>    
</body>
</html>