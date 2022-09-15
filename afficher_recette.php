<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> Liste Recettes </title>
        <link rel="stylesheet" href="style.css">
        <link rel="icon" href="images/favicon.ico" />
        <script src="repas.js"></script>
    </head>
    <body>
    <div class="container">
        <div class="centrer">
        <?php
            $bdd = new PDO('mysql:host=localhost;dbname=magic_food;charset=utf8', 'vivien', 'password');

            $reponse = $bdd->query('SELECT * FROM livre_recettes');

            while ($donnees = $reponse->fetch())
            {
        ?>
        <p>
            <strong>Recette n° <?php echo $donnees['id']; ?>: </strong><br />
            <?php $plat = $donnees['plat'] ; echo "<a href='https://www.google.com/search?q=recette+".$plat."' target='_blank'>".$plat."</a>"; ?>
        </p>
        <?php
            }
            $reponse->closeCursor(); // Termine le traitement de la requête 
            $bdd = null;
        ?>
    </div>
    </div>
  
    </body>
</html>