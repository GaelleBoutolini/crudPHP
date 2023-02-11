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
    //vérifier que le bouton ajouter a bien été cliquer
    if(isset($_POST['button'])){
       //extraction des informations envoyés dans des variables par la méthode POST
       extract($_POST);
       //vérifier que tous les champs pnt été remplis
       if(isset($nom) && isset($prenom) && isset($age)){
        //connexion à la base de données
        include_once "connexion.php";
        //requête d'ajout
        $sql = $bdd->query("INSERT INTO employe (nom, prenom, age)
        VALUES ('$nom', '$prenom', '$age')");
         
// La première ligne définit une variable nommée "sql", qui sera utilisée pour exécuter une requête SQL.
// La deuxième ligne utilise la méthode "query" de l'objet "bdd". Cet objet représente une connexion à une base de données. La requête SQL qui est passée à la méthode "query" est une instruction d'insertion qui insère des données dans une table appelée "employe".
// La requête SQL comprend les champs "nom", "prenom" et "age", qui sont les colonnes de la table "employe". Les valeurs à insérer dans ces colonnes sont les valeurs de variables PHP, qui ont été définies auparavant dans le code, telles que "$nom", "$prenom" et "$age".
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
        <h2>Ajouter un employé</h2>
        <p class="erreur_message">
         <?php
         //si la variable message existe, affichons son contenu
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