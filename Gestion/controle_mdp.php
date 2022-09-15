<?php

$tentative = htmlspecialchars($_POST['mdp']);

if($tentative == Juhhqfuhhshu){
    header("Location: https://food.28bis.fr/Gestion/gestion_attente.php");
}
else{
    header("Location: https://food.28bis.fr/index.php");
}
?>