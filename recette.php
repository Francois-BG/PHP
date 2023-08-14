<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Recette totale de la coopérative</title>

</head>
<body>
    <?php
        // Connexion à la base de données
        include 'connection.php';
        
        // Requête SQL pour récupérer la recette totale
        $query = "SELECT SUM(montant_avance) AS total FROM RESERVER";
        $result = mysqli_query($con, $query);
        
        // Vérification si la requête a réussi
        if ($result) {
            // Récupération du résultat
            $row = mysqli_fetch_assoc($result);
            $total = $row['total'];
            
            // Affichage du résultat
            echo "<h1>Recette totale de la coopérative : $total FCFA</h1>";
        } else {
            // Affichage d'une erreur en cas d'échec de la requête
            echo "Erreur : " . mysqli_error($con);
        }

        
    ?>
</body>
</html>

