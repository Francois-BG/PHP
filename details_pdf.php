<!DOCTYPE html>
<html lang="en">

<head>
    <title>Details Pdf</title>

</head>

<body>
    <p style="text-align: center;"> reçus </p>

    <div class="centered">
        <table>


            <tr>
                <td><b>Date de reservation:</b></td>
                <td><?=$user1['datereserv'];?></td>
            </tr>
            <tr>
                <td><b>Date du voyage:</b></td>
                <td><?=$user1['datevoyage'];?></td>
            </tr>
            <tr>
                <td><b>Nom du client:</b></td>
                <td><?php
            $nom = $user1['idcli'];
            $sql = mysqli_query($con, "SELECT c.nom FROM client c,reserver r WHERE c.idcli='$nom';" );
            $row = mysqli_fetch_assoc($sql);
            echo $row['nom'];
            ?></td>
            </tr>
            <tr>
                <td><b>Contact:</b></td>
                <td><?php
            $idcli = $user1['idcli'];
            $sql = mysqli_query($con, "SELECT c.numtel FROM client c,reserver r WHERE c.idcli='$idcli'" );
            $row = mysqli_fetch_assoc($sql);
            echo $row['numtel'];?></td>
            </tr>
            <tr>

                <td><?php
            $idvoit = $user1['idvoit'];
            $sql = mysqli_query($con, "SELECT v.idvoit,p.place,v.type FROM voiture v,place p,reserver r WHERE v.idvoit='$idvoit'" );
            $row = mysqli_fetch_assoc($sql);
            echo '<b>Voiture N°:</b>'.$row['idvoit'].'<br>';echo '<b>Type de voiture:</b>'.$row['type'].'<br>';echo '<b>Place:</b>'.$row['place'];
            
            ?></td>
            </tr>
            <tr>
                <td><b>Frais:</b></td>
                <td><?php
              $frais=$user1['idvoit'];
              $sql = mysqli_query($con, "SELECT v.frais FROM voiture v,reserver r WHERE v.idvoit='$frais'" );
              $row = mysqli_fetch_assoc($sql);
              echo $row['frais'];
            

             ?></td>


            <tr>
                <td><b>Payement:</b></td>
                <td><?=$user1['payement'];?></td>
            </tr>
            <tr>
                <td><b>Montant Avance:</b></td>
                <td><?=$user1['montantavance'];?></td>
            </tr>
            <td><b>RESTE:</b></td>
            <td>
                <?php
             $idvoit=$user1['idvoit'];
             $sql = mysqli_query($con, "SELECT v.frais,r.montantavance FROM voiture v,reserver r WHERE v.idvoit='$idvoit'" );
             $row = mysqli_fetch_assoc($sql);
             echo $row['frais'] - $user1['montantavance'];
             ?>
            </td>






        </table>
</body>

</html>