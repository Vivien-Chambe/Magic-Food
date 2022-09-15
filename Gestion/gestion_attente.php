<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion</title>
</head>
<body>
    <div>
        <?php
            $bdd = new PDO('mysql:host=localhost;dbname=magic_food;charset=utf8', 'vivien', 'password');

            $reponse = $bdd->query('SELECT * FROM liste_attente');

            while ($donnees = $reponse->fetch())
            {
        ?>
        <p>
            <strong>Attente n° <?php echo $donnees['id']; ?>: </strong><br />
            <?php echo $donnees['plat']; ?>
        </p>
        <?php
            }
            $reponse->closeCursor(); // Termine le traitement de la requête 
            $bdd = null;
        ?>
    </div>
    <div style="float:center">
        <form action="valider_liste_attente.php">
            <input type="submit">
        </form>
        <br>
        <form  method="post" action="modifier_liste_attente.php">
            <input type="text" placeholder="Id" name="aChanger" id="aChanger">
            <input type="text" placeholder="Name" name="platAChanger" id="platAChanger">
            <input type="submit" value="Modifier" >
        </form>
    </div>
</body>
</html>

