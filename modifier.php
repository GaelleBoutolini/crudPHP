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
include_once "connexion.php";
$id = $_GET['id'];
$response = $bdd->query('SELECT * FROM employes');
$donnees = $response->fetch();
    if(isset($_POST['button'])){
       extract($_POST);
       if(isset($nom) && isset($prenom) && isset($age)){
        $sql = $bdd->query("UPDATE employes SET nom = '$nom', prenom = '$prenom', age = '$age' WHERE id = $id");
         if($sql){
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
        <input type="text" name="prenom" value="<?= $donnees['prenom']?>">
        <label>Age</label>
        <input type="number" name="age" value="<?= $donnees['age'] ?>">
        <input type="submit" value="Modifier" name="button">
    </form>
    </div>
</body>
</html>