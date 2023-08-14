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
    <title>AJOUT CLIENT</title>
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
        <a href="interface.php" class="nav-link active" aria-current="page">
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
    </div>
  </div>
<script src="js/bootstrap.bundle.min.js" ></script>
<script src="sidebars.js"></script>
</main>
<div class="list"><br><br><br><br>
    <form class="d-flex w-50" method="get">
      <input class="form-control me-2" type="search"  name="Tapez_Ici" placeholder="chercher un client" aria-label="Search" autocomplete="off">
      <button class="btn btn-outline-success" type="submit" name="search">chercher</button>
      <button type="submit" class="btn btn-primary ms-2">Actualiser</button>
    </form>
<h1> list de client</h1><br><br>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  +CLIENT
</button><br><br>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">+client</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form  method="POST">
      <label>NOM et PRENOM</label>
            <input type="text" name="nom" placeholder="Entrez le nom" class='form-control'><br>
           <label>NUMERO TELEPHONE</label>
            <input type="number" name="numtel" placeholder="Entrez le numero"class='form-control' ><br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="ajout" class="btn btn-primary">ajouter</button>
      </div>    
       </form>
       <?php
       include 'connexion.php';
       if(isset($_POST['ajout']))
      {
        $nom = $_POST['nom'];
        $numtel = $_POST['numtel'];
        $idcli = $_POST['idcli']; 
        $query = "INSERT INTO client (nom, numtel, idcli ) VALUES('$nom','$numtel','$idcli')";
        $result = mysqli_query($con,$query);
        if($result){
           //echo "insertion succes";
           header('location:interface.php');  
       }else{
           die(mysqli_connect_error($result));
       }
    }
     ?>
<!--liste des voitures-->
       </div>
  </div>
</div>
    <table  class="table table-responsive w-100" >
      <tr class="table-dark">
          <th>idcli</th>
          <th>nom</th>
          <th>numtel</th>
          <th>action</th>
      </tr>
          <?php
               
               if(isset($_GET['search'])){
                if (isset($_GET["Tapez_Ici"]) && !empty($_GET["Tapez_Ici"]) ) {
                  $recherche = htmlspecialchars($_GET["Tapez_Ici"]);
                  $client = "SELECT * FROM client WHERE nom LIKE '%$recherche%'
                            OR numtel LIKE '%$recherche%' ORDER BY idcli ";
                  $resultat = mysqli_query($con,$client);
                  while($row = mysqli_fetch_assoc($resultat)){
                   $idcli = $row['idcli'];
                   $nom = $row['nom'];
                   $numtel = $row['numtel'];
                   echo "
                     <tr class='table table-striped'>
                  <td>".$idcli."</td>  
                    <td>".$nom."</td>
                    <td>".$numtel."</td>
                    <td>
                       <!-- Button trigger modal -->
                       <button type='button'class='btn btn-primary modifier'data-bs-toggle='modal' >
                         modifier
                       </button>
                       <a class='btn btn-danger' href='supprimercli.php?rn=$idcli'> Supprimer</a>
                     </td>
                    </tr>  ";}
                  }
               }
               if(!isset($_GET['search'])){
                $querry ="SELECT * FROM client";
                $result = mysqli_query ($con,$querry);
                while( $row = mysqli_fetch_assoc($result)) {
                 $idcli = $row['idcli'];
                 $nom = $row['nom'];
                 $numtel = $row['numtel'];
                    echo "
                     <tr class='table table-striped'>
                  <td>".$idcli."</td>  
                    <td>".$nom."</td>
                    <td>".$numtel."</td>
                    <td>
                       <!-- Button trigger modal -->
                       <button type='button'class='btn btn-primary modifier'data-bs-toggle='modal' >
                         modifier
                       </button>
                       <a class='btn btn-danger' href='supprimercli.php?rn=$idcli'> Supprimer</a>
                     </td>
                    </tr>  ";
                }
               }            
          ?>
</table>
</div>
<!------------------------------------------------------------------------------------>
<!-- Modal -->
<div class="modal fade" id="modifier" tabindex="-1" aria-labelledby="modifierLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modifierLabel">Modifier</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form  method="POST">
                <label>NOM et PRENOM</label>
                <input type="text" name="nomm" id="nom" class='form-control'><br>
                <label>NUMERO TELEPHONE</label>
                <input type="number" name="numtelm" id="numtel" class='form-control'><br>
                <input type="hidden"  name="idclim" id="idcli" class='form-control'><br>          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" value="modifier" name="modifier" class="btn btn-primary">modifier</button>
      </div>
      </form>
      
      <?php
    if(isset($_POST['modifier'])){
        //$idcli = $_POST['idcli'];
        $numtel = $_POST['numtelm']; 
        $nom = $_POST['nomm'];
        $idcli=$_POST['idclim'];
        
        $query = "UPDATE client SET  nom ='$nom',numtel = '$numtel' WHERE idcli = '$idcli'  ";
        $result = mysqli_query($con, $query);
        if($result){
            //echo "modifier avec succes";
            header ('location:interface.php');
        }
        else {
            die(mysqli_error($con));
        }        
    }
    ?>
    </div>
  </div>
</div>
<script src="jquery-3.6.0.min.js" ></script>
<script>
$(document).ready(function(){
  $('.modifier').on('click',function(){
    $("#modifier").modal('show');

     $tr=$(this).closest('tr');
     var data = $tr.children("td").map(function(){
      return $(this).text();
     }).get();
     console.log(data);
     $('#modifier #idcli').val(data[0]);
     $('#modifier #nom').val(data[1]);
     $('#modifier #numtel').val(data[2]);
  });
});
</script>
</body>  
</html>
