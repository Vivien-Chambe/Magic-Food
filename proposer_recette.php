<?php
    function generer_idee_php(){
        // Connexion à la base de données
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=magic_food;charset=utf8', 'vivien', 'password');
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }

        //on récupère l'id du dernier élément de la liste
        $reponse = $bdd->query('SELECT COUNT(*) as count FROM livre_recettes');
        $count = $reponse->fetch()['count']; $reponse->closeCursor();
        $random = rand(0, $count-1);
        $reponse = $bdd->query('SELECT plat FROM livre_recettes LIMIT 1 OFFSET '.$random);
        $plat = $reponse->fetch()['plat']; $reponse->closeCursor();

        $bdd=null;

        return '"' . htmlspecialchars($plat) . '"';
    }

?>