<?php

$user="root";
$mdp=""; 
$server="localhost"; 
$database="cooperative";
//$con= new mysqli_connect($user,$mdp,$server, $database);
$con=mysqli_connect("localhost","root","","cooperative");
if(!$con) 
{
    die(mysqli_error($con));
}

?>