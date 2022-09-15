<?php
    session_start();
    // Connexion à la base de données
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=magic_food;charset=utf8', 'vivien', 'password');
    }
    catch(Exception $e)
    {
            die('Erreur : '.$e->getMessage());
    }


    $ajout = $_POST['ajout'];
    if (isset($_POST["Valider"])){
        $ajout = htmlspecialchars($_POST['ajout']);
        $ajout = ucfirst(strtolower($ajout));
    }


    $reponse = $bdd->query('SELECT * FROM livre_recettes');
    while($donnees = $reponse->fetch()){
        if($donnees['plat'] == $ajout){
            header('Location: index.php?succes=-1');
            exit;
        }
    }
    $reponse -> closeCursor();


    $reponse = $bdd->query('SELECT * FROM ban_word');
    while($donnees = $reponse->fetch()){
        if($donnees['banword'] == $ajout){
            header('Location: index.php?succes=-3');
            exit;
        }
    }
    $reponse -> closeCursor();

    $req = $bdd->prepare('INSERT INTO liste_attente (plat) VALUES (?)');
    $req->execute(array($ajout));
    $req -> closeCursor();

    $destinataire = "vivien.chambe@live.com";
    $objet = "Nouveau plat";
    $message = "Une nouveau plat à été proposé: ".$ajout."";

    if (mail($destinataire, $objet, $message)) // Envoi du message
    {
        echo 'Votre message a bien été envoyé ';
    }
    else // Non envoyé
    {
        echo "Votre message n'a pas pu être envoyé";
    }
    // Redirection du visiteur vers la page principale
    header('Location: index.php?succes=1');
    $bdd=null;
?>