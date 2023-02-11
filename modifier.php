<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style.css">
    <title>Modifier</title>
</head>
<body>
<?php

//connexion à la base de données
include_once "connexion.php";
//on récupère de id dans le lien
$id = $_GET['id'];
//requête pour afficher les infos d'un employé
$response = $bdd->query('SELECT * FROM employe');
$donnees = $response->fetch();

// Cette ligne elle effectue une assignation de valeur à une variable appelée $donnees. La valeur qui est assignée à $donnees provient d'un objet $response qui semble être un objet PDOStatement ou un objet similaire retourné par une requête SQL exécutée via le PHP Data Object (PDO) ou un autre moyen de communication avec une base de données. La méthode fetch() est appelée sur l'objet $response, ce qui renvoie une ligne de résultat de la requête SQL sous forme d'un tableau associatif. Ce tableau associatif est assigné à la variable $donnees.



    //vérifier que le bouton ajouter a bien été cliquer
    if(isset($_POST['button'])){
       //extraction des informations envoyés dans des variables par la méthode POST
       extract($_POST);
       //vérifier que tous les champs pnt été remplis
       if(isset($nom) && isset($prenom) && isset($age)){
        
        $sql = $bdd->query("UPDATE employe SET nom = '$nom', prenom = '$prenom', age = '$age' WHERE id = $id");
         
         if($sql){//si la requete a été effectuée avec succèes, on fait une redirection
            header("location: index.php"); 
         }else{//sinon 
            $message ="Employé non modifié";
         }

       }else{
        //sinon
        $message = "Veuillez remplir tous les champs !";

       }
    }
     
    ?>
    <div class="form">
        <a href="index.php" class="back_btn"><img src="/images/back.png" alt="">Retour</a>
        <h2>Modifier un employé: <?= $donnees['nom']?></h2>
        <p class="erreur_message"> 
            <?php
                if(isset($message)){
                    echo $message;
                }

            ?>
        </p>
        <form action="" method="POST">
        <label>Nom</label>
        <input type="text" name="nom" value="<?= $donnees['nom'] ?>">
        <label>Prénom</label>
        <input type="text" name="prenom" value="<?= $donnees['prenom'] ?>">
        <label>Age</label>
        <input type="number" name="age" value="<?= $donnees['age'] ?>">
        <input type="submit" value="Modifier" name="button">
    </form>
    </div>
</body>
</html>