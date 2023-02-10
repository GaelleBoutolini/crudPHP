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
//requête pour afficher les infos d'un employé




    //vérifier que le bouton ajouter a bien été cliquer
    if(isset($_POST['button'])){
       //extraction des informations envoyés dans des variables par la méthode POST
       extract($_POST);
       //vérifier que tous les champs pnt été remplis
       if(isset($nom) && isset($prenom) && isset($age)){
        
        $sql = $bdd->query("SELECT * FROM employe WHERE id = $id");
         
         if($sql){//si la requete a été effectuée avec succèes, on fait une redirection
            header("location: index.php"); 
         }else{//sinon 
            $message ="Employé non ajouté";
         }

       }else{
        //sinon
        $message = "Veuillez remplir tous les champs !";

       }
    }
     
    ?>
    <div class="form">
        <a href="index.php" class="back_btn"><img src="/images/back.png" alt="">Retour</a>
        <h2>Modifier un employé</h2>
        <p class="erreur_message">Veuillez remplir tous les champs !</p>
        <form action="" method="POST">
        <label>Nom</label>
        <input type="text" name="nom">
        <label>Prénom</label>
        <input type="text" name="prenom">
        <label>Age</label>
        <input type="number" name="age">
        <input type="submit" value="Modifier" name="button">
    </form>
    </div>
</body>
</html>