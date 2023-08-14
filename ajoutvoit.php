<?php
    include 'connexion.php';

    if(isset($_POST['ajout']))
    {   $idvoit=$_POST['idvoit'];
        $design = $_POST['design'];
        $type = $_POST['type'];
        $nbrplace=$_POST['nbrplace'];
        $frais = $_POST['frais']; 
        
        
       $query = "INSERT INTO voiture ( idvoit,design,type, nbrplace,frais ) VALUES( '$idvoit','$design','$type','$nbrplace','$frais')";
       $result = mysqli_query($con,$query);


       if($result){
           //echo "insertion succes";
           header('location:listvoit.php');
           
       }else{
           die(mysqli_connect_error($result));
       }
    }
  

     ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJOUTER UN VOITURE</title>
    <link rel="stylesheet" href="mystyle.css">
    <link rel="stylesheet" href="BOOTSTRAP/bootstrap-offline-docs-5.1/dist/js/bootstrap.bundle.min.js">
    
</head>

<body> 

    <div>
       <form  method="POST">
               <legend> NOUVEAU VOITURE</legend>
               
               <label>ID VOITURE</label>
                <input type="text" name="idvoit" autocomplete="off"><br>

               <label>DESIGNATION</label>
                <input type="text" name="design" autocomplete="off"  ><br>
              
                <h2>TYPE DE VOITURE</h2>
               
               <input type="radio" name="type"  value="vip" checked> VIP<br>
               <input type="radio" name="type" value="premium" >PREMIUM<br>
               <input type="radio" name="type" value="simple" > SIMPLE<br><br>
              <label>NOMBRE DE PLACE </label>
                <input type="number" name="nbrplace"><br>
                <label > FRAIS</label>
                <input type="number" name="frais">

              
             <input type="submit" value="ajout" name="ajout" >
          
       </form>


    </div>
   
   
    
</body>
</html>