<?php
  ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>liste reservation</title>
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
        <a href="#"  class="nav-link active" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#"/></svg>
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
<h1>Liste des reservations</h1><br><br>

<form class="payement d-flex" method="GET">
    
        <input type="radio"  name="payement"  value="avec avance" checked> <span class="">avec avance</span><br>

          <input type="radio" name="payement" value="sans avance" ><span class="">sans avance</span> <br>
        
          <input type="radio" name="payement" value="tout paye" > <span class="" >tout payer</span> <br><br>

          <button  type="submit" name = "entrer"> Entrer</button><br><br>
          <button class="" >Actualiser</button>

      </form>


    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  +reservation
</button><br><br>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">+RESERVATION</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form  method="POST">
          <legend> RESERVATION</legend>
               <label>ID RESERVATION</label><br>
               <input type="text" name="idreserv" class='form-control'><br>
               <label>ID voit</label><br>
               <select name="idvoit" id="idvoit" class='form-control' >

                <?php
                 include 'connexion.php';

                    $sql = "SELECT * FROM voiture";
                      $resultat = mysqli_query($con,$sql);
                          
                      while ($row = mysqli_fetch_assoc($resultat)) {
                      echo "<option value = ' $row[idvoit]'>"."V ". $row['idvoit']."</option>";
                      }
                            
                ?>
                </select><br>
                <label>IDCLIENT</label>
                <select id='idcli' class='form-control' name = idcli>
                     <?php
  
                          $sql = "SELECT * FROM client";
                          $resultat = mysqli_query($con,$sql);
                        
                          while ($row = mysqli_fetch_assoc($resultat)) {
                          echo "<option value = ' $row[idcli]'>"."C ". $row['idcli']."</option>";
                          }
                         
                      ?>
                </select><br>
                <label>PLACE</label>  
                <input type="number" name="place" class='form-control' id="place"><br>
               <br>
                <label>date reservation</label>
                <input type="date" name="datereservation" class='form-control' ><br>
               <label>date de voyage</label>
                <input type="date" name="datevoyage" class='form-control'><br>
                <h2>MODE DE PAYEMENT</h2>
                <input type="radio" name="payement"  value="avec avance" checked> avec avance<br>
                <input type="radio" name="payement" value="sans avance" >sans avance<br>
                <input type="radio" name="payement" value="tout paye" > tout payer<br><br>
                <label> MONTANT Avance</label>
               <input type="number" name="montantavance"class='form-control' ><br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="reserver" class="btn btn-primary">ajouter</button>
      </div>
          
       </form>
       <?php
    if(isset($_POST['reserver']))
    {    $idreserv=$_POST['idreserv'];
        $idvoit=$_POST['idvoit'];
        $idcli =$_POST['idcli'];
        $place =$_POST['place'];
        $datereserv = $_POST['datereservation'];
        $datevoyage = $_POST['datevoyage'];
        $montantavance = $_POST['montantavance']; 
        $payement = $_POST['payement'];
        if ($payement=='avec avance') {
          $query = "INSERT INTO reserver (idreserv,idvoit,idcli,place, datereserv, datevoyage, montantavance,payement ) VALUES( '$idreserv','$idvoit', '$idcli','$place', '$datereserv','$datevoyage','$montantavance','$payement')";
          $result = mysqli_query($con,$query);

          $query= "UPDATE place SET occupation = 'oui' WHERE idvoit = $idvoit AND place = $place ";
          $result = mysqli_query($con,$query);
       
       if($result){
           header('location:reservlist.php');
           
       }else{
           die(mysqli_connect_error($result));
       }
        }elseif ($payement=='sans avance') {
           $query = "INSERT INTO reserver (idreserv,idvoit,idcli,place, datereserv, datevoyage, montantavance,payement ) VALUES( '$idreserv','$idvoit', '$idcli','$place', '$datereserv','$datevoyage','0','$payement')";
           $result = mysqli_query($con,$query);

           $query= "UPDATE place SET occupation = 'oui' WHERE idvoit = $idvoit AND place = $place ";
          $result = mysqli_query($con,$query);
       
       if($result){
           header('location:reservlist.php');
           
       }else{
           die(mysqli_connect_error($result));
       }
        }elseif ($payement=='tout paye') {
          $query="SELECT frais FROM voiture WHERE idvoit='$idvoit'";
          $result=mysqli_query($con,$query);
          $row =mysqli_fetch_assoc($result);
          $montant=$row['frais'];
       $query = "INSERT INTO reserver (idreserv,idvoit,idcli,place, datereserv, datevoyage, montantavance,payement ) VALUES( '$idreserv','$idvoit', '$idcli','$place', '$datereserv','$datevoyage','$montant','$payement')";
       $result = mysqli_query($con,$query);

       $query= "UPDATE place SET occupation = 'oui' WHERE idvoit = $idvoit AND place = $place ";
       $result = mysqli_query($con,$query);
       
       if($result){
           header('location:reservlist.php');
           
       }else{
           die(mysqli_connect_error($result));
       }
        }

    }
     ?>   
      </div>
    </div>
  </div>
<!--liste des reservations-->
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
        }else{            
      
    
      $querry ="SELECT * FROM reserver";
      $result = mysqli_query ($con,$querry);
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
    ?>
  </table>
    </div>
<!------------------------------------------------------------------------------------>
<!-- Modal -->
<div class="modal fade" id="modifreserv" tabindex="-1" aria-labelledby="modifierLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modifierLabel">Modifier la reservation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form  method="POST">
     <!-- <label>ID RESERVATION</label><br>-->
               <input type="hidden" name="idreserv" class='form-control' id="idreserv" ><br>
               <label>ID voit</label><br>
               <select name="idvoit" id="idvoit" class='form-control'id="idvoit" >

                <?php
                 include 'connexion.php';

                    $sql = "SELECT * FROM voiture";
                      $resultat = mysqli_query($con,$sql);
                          
                      while ($row = mysqli_fetch_assoc($resultat)) { ?>

                          <option value = "<?= $row['idvoit'] ?>" > <?= $row['idvoit'] ?> </option>
                      <?php
                      }             
                ?>
                </select><br>
                <label>IDCLIENT</label>
                <select id='idcli' class='form-control' name = "idcli">
                     <?php
  
                          $sql = "SELECT * FROM client " ;
                          $resultat = mysqli_query($con,$sql);
                        
                          while ($row = mysqli_fetch_assoc($resultat)) {
                          echo "<option value = ' $row[idcli]'>"."C ". $row['idcli']."</option>";
                          }           
                      ?>
                </select><br>
                <label>PLACE</label>
                <select type="number" name="place" id="place">
                <?php
                          $sql = "SELECT * FROM place WHERE idvoit='$idvoit'";
                          $resultat = mysqli_query($con,$sql);

                          while ($row = mysqli_fetch_assoc($resultat)) {
                          echo "<option value = ' $row[place]'>"."P ". $row['place']."</option>";
                          }
                ?>
                </select>
                <label>date reservation</label>
                <input type="date" name="datereservation" class='form-control' id="datereservervation" ><br>
               <label>date de voyage</label>
                <input type="date" name="datevoyage" class='form-control' id="datevoyage" ><br>
                <h2>MODE DE PAYEMENT</h2>
                <input type="radio" name="payement"  value="avec avance"id="payement" checked> avec avance<br>
                <input type="radio" name="payement" value="sans avance" id="payement">sans avance<br>
                <input type="radio" name="payement" value="tout paye" id="payement"> tout payer<br><br>
                <label> MONTANT Avance</label>
               <input type="number" name="montantavance"class='form-control'id="montantavance" ><br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="modifier" class="btn btn-primary">modifer</button>
      </div>
      </form>
      <?php
          if(isset($_POST['modifier'])){
            $idreserv=$_POST['idreserv'];
            $idvoit=$_POST['idvoit'];
            $idcli =$_POST['idcli'];
            $place =$_POST['place'];
            $datereserv = $_POST['datereserv']; 
            $datevoyage = $_POST['datevoyage'];
            $payement = $_POST['payement'];
            $montantavance=$_POST['montantavance'] ;
            $query = "UPDATE reserver SET  idreserv='$idreserv', idvoit = '$idvoit', idcli = '$idcli', place ='$place',datereserv = '$datereserv', datevoyage = '$datevoyage',payement='$payement',montantavance='$montantavance' WHERE idreserv='$idreserv'";
            
            $result = mysqli_query($con, $query);
            if($result){
                //echo "modifier avec succes";
                header ('location:reservlist.php');
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
    $("#modifreserv").modal('show');

     $tr=$(this).closest('tr');
     var data = $tr.children("td").map(function(){
      return $(this).text();
     }).get();
     console.log(data);
     $('#modifreserv #idreserv').val(data[0]);
     $('#modifreserv #idvoit').val(data[1]);
     $('#modifreserv #idcli').val(data[2]);
     $('#modifreserv #place').val(data[3]);
     $('#modifreserv #datereservation').val(data[4]);
     $('#modifreserv #datevoyage').val(data[5]);
     $('#modifreserv #payement').val(data[6]);
     $('#modifreserv #montantavance').val(data[7]);
  });

});
</script>
       
</body>
</html>