<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> Magic-Food </title>
        <link rel="stylesheet" href="style.css">
        <link rel="icon" href="images/favicon.ico" />
        <script src="repas.js"></script>
    </head>
    <body>
    <div class="container" id="container">
      
      <div id="colonne_centre">
        <div style="margin:3%;">
          <h1>MAGIC-FOOD</h1>

          <p>Magic-Food est là quand vous ne savez pas quoi faire à manger.
            <br>
            Appuyez simplement sur le bouton pour générer une idée de plat.
            <br>
            Vous pouvez également ajouter vos propres idées et en faire profiter tout le monde.
            <br>
            Les propositions seront mises en attente pour vérification et seront validées (ou pas) sous 12h. 
            <br>
          </p>
        </div>
        
        <div class="centrer" id="generer">
            <input type ="hidden" name="plat" id="valeurCachée" value =<?php include('proposer_recette.php');echo generer_idee_php(); ?>/>
            <h2>Votre plat sera : 
              <br><span href="" name="plat" id="plat"></span>
              <script>
                document.getElementById("plat").innerText = document.getElementById("valeurCachée").value;
              </script>
              <div></div>
            </h2>
            <button class="button" onclick="refresh();">Donne moi une idée!</button>
          <br>
        </div>
        
        <!-- Permets de rajouter une recette -->
        <div class ="centrer" id="newRecipe">
          <form method = "post" action="ajouter_recette.php">
            <h3 for="name">Ajouter un plat :</h3>
            <input type="text" id="ajout" placeholder="Nouvelle Recette" name="ajout" required
              minlength="3" size="20">
            <?php
              //On vérifie que la variable succés à bien été initialisée
              if(isset($_GET['succes'])){
                if($_GET['succes'] == 1){
                  echo '<br><span style="color:lawngreen">Plat ajouté!</span>';
                }
                else if($_GET['succes'] == -1){
                  echo '<br><span style="color:red">Plat déjà existant</span>';
                }
                else if($_GET['succes'] == -2){
                  echo '<br><span style="color:red">Caractères interdits détectés/<br>Espaces inattendus</span>';
                }
                else if($_GET['succes'] == -3){
                  echo '<br><span style="color:red">Mot banni</span>';
                }
                else{
                  echo "";
                }
              }
            ?>
            <br>
            <br>
            <input type = "submit" class = "button" name = "Valider" value = "Ajouter un plat" />
          </form>
        </div>
        <br>

        <div style="display:inline-block; margin:1%;">
          <button id="boutonAfficherRecettes" onclick="window.open('afficher_recette.php', '_blank');">Cliquez pour afficher tous les plats !</button>
        </div>
        <br>
        <img style="margin:2%;" src="images/cuistot.jpg">
      </div>
    
    </div>
    </body>
    
</html>
