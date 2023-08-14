<?php
include 'connexion.php';

//$roll=$_GET['rn'];
//echo $roll;


$query= "DELETE FROM client WHERE idcli='$_GET[rn]' ";
$result = mysqli_query($con,$query) ;

if($result){
    header('location:interface.php');

}else{
    die(mysql_eroor($result));
}


?>