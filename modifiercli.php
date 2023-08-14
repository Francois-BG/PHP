
<?php
include  'connexion.php';

$idcli= $_GET ['rn'];
//echo $idcli;

$query = "SELECT * FROM client WHERE idcli= $idcli ";
$result = mysqli_query($con,$query);
$row = mysqli_fetch_assoc($result);
//echo $row['nom'];



 ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modifier un client</title>
    <link rel="stylesheet" href="mystyle.css">
</head>
<body>
<h1>MODIFIER UN CLIENT</h1>

<div>
       <form  method="POST">
               <label>NOM et PRENOM</label>
                <input type="text" name="nom" value = <?php echo $row['nom'];?> ><br>
               <label>NUMERO TELEPHONE</label>
                <input type="number" name="numtel" value = <?php echo $row['numtel'];?> ><br>
               <!--<label>client num</label> 
               <input type="text"  name="idcli" value = <?php echo $row['idcli'];?>><br>-->
               
              
             <input type="submit" value="modifier" name="ajout" >
       </form>


    </div>
    <?php
    if(isset($_POST['ajout'])){
        //$idcli = $_POST['idcli'];
        $numtel = $_POST['numtel']; 
        $nom = $_POST['nom'];
        
        $query = "UPDATE client SET numtel = '$numtel', nom ='$nom' WHERE idcli = $idcli  ";
        $result = mysqli_query($con, $query);
        if($result){
            //echo "modifier avec succes";
            header ('location:listagecli.php');
        }
        else {
            die(mysqli_error($con));
        }        
    }

    ?>
   
</body>
</html>