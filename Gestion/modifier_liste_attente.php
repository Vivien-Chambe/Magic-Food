<?php
    $bdd = new PDO('mysql:host=localhost;dbname=magic_food;charset=utf8', 'vivien', 'password');

    if(isset($_POST['aChanger'])){
        $id = $_POST['aChanger'];

        $req = $bdd->prepare('DELETE FROM liste_attente WHERE id=?');
        $req->execute(array($id));
        $req -> closeCursor();
        echo"debug1";
    }
    
    if(isset($_POST['platAChanger'])){
        $plat = $_POST['platAChanger'];
        echo $plat;
        $req = $bdd->prepare('INSERT INTO ban_word (banword) VALUES (?)');
        $req->execute(array($plat));
        $req -> closeCursor();

        $req = $bdd->prepare('DELETE FROM liste_attente WHERE plat=?');
        $req->execute(array($plat));
        $req -> closeCursor();
        echo"debug2";
    }


    header('Location: https://food.28bis.fr/Gestion/gestion_attente.php');
    $bdd=null;

?>