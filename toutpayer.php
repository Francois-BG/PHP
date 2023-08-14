<?php
               include 'connexion.php';
               if(isset($_GET['toutpayer']))
               {             
                $recherche = htmlspecialchars($_GET["toutpayer"]);
                $toutpaye = "SELECT*FROM reserver WHERE payement='toutpayer'";
                $result = mysqli_query ($con,$toutpaye);
                while( $row = mysqli_fetch_assoc($result)) {
                  $payement = $row['payement'];
                  echo ".$payement.";
              }
            }




      ?>