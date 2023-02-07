<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style.css">
    <title>Ajouter</title>
</head>
<body>
    <?php
    //vérifier que le bouton cliquer a été bien cliqué
    if(isset($_POST['button'])){

       //extraction des information envoyées dans des variables par la méthode POST
       extract($_POST);

    //Vérifier que tous les champs ont été bien remplis
    if(isset($nom) & isset($prenom) & isset($age)){

    //connexion à la base de données
    include_once "connexion.php";
    //requete d'ajout
    $response = $bdd->query("INSERT INTO employe VALUES(NULL, '$nom', '$prenom', '$age')");
    if($response){//si la requete a été effectuée avec succès, on fait une redirection 
        header("location: index.php");
    }else{
        $message = "Employe non ajouté";
    }

    }else{
        //sinon
        $message = "Vueillez remplir tous les champs !";

    }

    }

    ?>
    <div class="form">
        <a href="index.php" class="back_btn"><img src="/images/back.png" alt="">Retour</a>
        <h2>Ajouter un employé</h2>
        <p class="erreur_message">
            <?php
            //Si la variable message existe, affichons son contenu
            if(isset($message)){
                echo $message;
            }
            ?>
            </p>
        <form action="" method="POST">
        <label>Nom</label>
        <input type="text" name="nom">
        <label>Prénom</label>
        <input type="text" name="prenom">
        <label>Age</label>
        <input type="number" name="age">
        <input type="submit" value="Ajouter" name="button">
    </form>
    </div>
</body>
</html>