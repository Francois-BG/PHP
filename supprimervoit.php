<?php
include 'connexion.php';

//$roll=$_GET['rn'];
//echo $roll;


$query= "DELETE FROM voiture WHERE idvoit='$_GET[rn]' ";
$result = mysqli_query($con,$query) ;

if($result){
    header('location:listvoit.php');

}else{
    die(mysql_eroor($result));
}


?>