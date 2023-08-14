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
    <title>liste voiture</title>
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
        <a href="#" class="nav-link active" aria-current="page" >
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
    </div>
  </div>
  <script src="js/bootstrap.bundle.min.js" ></script>
  <script src="sidebars.js"></script>
</main>
</div>
<div class="list"><br><br><br><br>
      <h1> list des voiture</h1><br><br>
    <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  +voiture
        </button><br><br>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">+VOITURE</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form  method="POST">
               <legend> NOUVEAU VOITURE</legend>
                <label>ID VOITURE</label>
                <input type="text" name="idvoit" autocomplete="off" class='form-control'><br>
                <label>DESIGNATION</label>
                <input type="text" name="design" autocomplete="off"  class='form-control'><br>
                <h2>TYPE DE VOITURE</h2>
                <input type="radio" name="type"  value="vip" checked > VIP<br>
                <input type="radio" name="type" value="premium" >PREMIUM<br>
                <input type="radio" name="type" value="simple" > SIMPLE<br><br>
                <label>NOMBRE DE PLACE </label>
                <input type="number" name="nbrplace"class='form-control'><br>
                <label > FRAIS</label>
                <input type="number" name="frais"class='form-control'>  
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
        $idvoit=$_POST['idvoit'];
        $design = $_POST['design'];
        $type = $_POST['type'];
        $nbrplace=$_POST['nbrplace'];
        $frais = $_POST['frais']; 
        $query = "INSERT INTO voiture ( idvoit,design,type, nbrplace,frais ) VALUES( '$idvoit','$design','$type','$nbrplace','$frais')";
        $result = mysqli_query($con,$query);
        $place = 1;
        for ($i=0; $i < $nbrplace ; $i++) { 
        $query = " INSERT INTO place (idvoit,place,occupation) VALUES( '$idvoit','$place','non') ";
        $result = mysqli_query($con,$query);
        $place += 1;
       }      
       if($result){
           //echo "insertion succes";
           header('location:listvoit.php');      
       }else{
           die(mysqli_connect_error($result));
       }
    }
       ?>
    </div>
  </div>
</div>
    <table  class="table">
      <tr class="table-dark">
          <th>idvoit</th>
          <th>design</th>
          <th>type</th>
          <th>nbr place</th>
          <th>frais</th>
          <th>action</th>
      </tr>
      <?php
                       include 'connexion.php';
                       $querry ="SELECT * FROM voiture";
                       $result = mysqli_query ($con,$querry);
                       while( $row = mysqli_fetch_assoc($result)) {
                       $idvoit = $row['idvoit'];
                       $design = $row['design'];
                       $type = $row['type'];
                       $nbrplace=$row['nbrplace'];
                       $frais=$row['frais'];
                       echo "
                       <tr>
                       <td>".$idvoit."</td>  
                       <td>".$design."</td>
                       <td>".$type."</td>
                       <td>".$nbrplace."</td>
                       <td>".$frais."</td>
                      <td>
                      <!-- Button trigger modal -->
                      <button type='button'class='btn btn-primary modifier'data-bs-toggle='modal' >
                        modifier
                      </button>
                      <a href='supprimervoit.php?rn=$idvoit'> <button class='btn btn-danger'>Supprimer</button></a>
                      <a href='rechercheplace.php?rn=$idvoit'> <button class='btn btn-primary'>afficher</button></a>
                      </td>
    
    
                      </tr>  ";
                      }
        ?>
</table>
</div>
<!------------------------------------------------------------------------------------>
<!-- Modal -->
<div class="modal fade" id="modifvoit" tabindex="-1" aria-labelledby="modifierLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modifierLabel">Modifier une voiture</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form  method="POST">                
                <input type="hidden" name="idvoit" id="idvoit" class='form-control'> <br>
                <label>DESIGNATION</label>
                <input type="text" name="design" id="design" class='form-control'> 
                <h2>TYPE DE VOITURE</h2>
                <input type="radio" name="type"  value="vip" id="type" checked> VIP<br>
                <input type="radio" name="type" value="premium" id="type">PREMIUM<br>
                <input type="radio" name="type" value="simple" id="type" > SIMPLE<br><br>
                <label>NOMBRE DE PLACE </label>
                <input type="number" name="nbrplace" id="nbrplace" class='form-control'><br>
                <label > FRAIS</label>
                <input type="number" name="frais" id="frais" class='form-control'><br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" value="modifier" name="modifier" class="btn btn-primary">modifier</button>
      </div>
      </form>
      <?php
        if(isset($_POST['modifier'])){
        $idvoit=$_POST['idvoit'];
        $design = $_POST['design'];
        $type = $_POST['type'];
        $nbrplace=$_POST['nbrplace'];
        $frais = $_POST['frais'];  
        $query = "UPDATE voiture SET idvoit='$idvoit' ,design = '$design', type ='$type',nbrplace = '$nbrplace',frais='$frais' WHERE idvoit='$idvoit'";

        $result = mysqli_query($con, $query);
        if($result){
            //echo "modifier avec succes";
        header ('location:listvoit.php');
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
    $("#modifvoit").modal('show');
     $tr=$(this).closest('tr');
     var data = $tr.children("td").map(function(){
      return $(this).text();
     }).get();
     console.log(data);
     $('#modifvoit #idvoit').val(data[0]);
     $('#modifvoit #design').val(data[1]);
     $('#modifvoit #type').val(data[2]);
     $('#modifvoit #nbrplace').val(data[3]);
     $('#modifvoit #frais').val(data[4]);
  });
});
</script>   
</body>
</html>