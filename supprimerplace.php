<?php
include 'connexion.php';

//$roll=$_GET['rn'];
//echo $roll;


$query= "DELETE place FROM place WHERE place='$_GET[rn]' ";
$result = mysqli_query($con,$query) ;

if($result){
    header('location:listplace.php');

}else{
    die(mysql_eroor($result));
}


?>