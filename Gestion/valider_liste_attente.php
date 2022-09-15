<?php
    $bdd = new PDO('mysql:host=localhost;dbname=magic_food;charset=utf8', 'vivien', 'password');

    $reponse = $bdd->query('SELECT * FROM liste_attente');
    while($donnees = $reponse->fetch()){
        $reponse2 = $bdd->query('SELECT * FROM livre_recettes ORDER BY id DESC' );
        $donnees2 = $reponse2 -> fetch();
        $last_recipe_id = $donnees2['id'];
        $new_recipe_id = $last_recipe_id + 1;
        $reponse2 -> closeCursor();

        $req = $bdd->prepare('INSERT INTO livre_recettes (id,plat) VALUES (?,?)');
        $req->execute(array($new_recipe_id,$donnees['plat']));
        $req -> closeCursor();
    }
    $reponse -> closeCursor();

    $req = $bdd->query('TRUNCATE TABLE liste_attente');

    header('Location: https://food.28bis.fr/Gestion/gestion_attente.php');
    $bdd=null;

?>