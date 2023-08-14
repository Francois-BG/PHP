<?php
include 'connexion.php';

//$roll=$_GET['rn'];
//echo $roll;


$query= "DELETE FROM reserver WHERE idreserv='$_GET[rn]' ";
$result = mysqli_query($con,$query) ;
$sql="UPDATE place SET occupation='non' WHERE ivoit='$idvoit' AND place='oui'";
$sql_run=mysqli_query($con,$sql);
if($result){
    header('location:reservlist.php');

}else{
    die(mysql_eroor($result));
}


?>