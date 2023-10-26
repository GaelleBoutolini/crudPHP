<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style.css">
    <title>Modifier</title>
    <meta http-equiv="Content-Security-Policy" content="img-src 'self' https://gaelleboutolini.github.io;">

    <link rel="icon" href="/favicon.ico" type="image/x-icon">

</head>
<body>
<?php
include_once "connexion.php";

$message = "";

if(isset($_POST['button'])){
    $id = $_GET['id']; // Assurez-vous de vérifier et de nettoyer l'ID.
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $age = $_POST['age'];

    if(!empty($nom) && !empty($prenom) && !is_numeric($age)){
        $sql = $bdd->prepare("UPDATE employes SET nom = :nom, prenom = :prenom, age = :age WHERE id = :id");
        $sql->bindParam(':nom', $nom);
        $sql->bindParam(':prenom', $prenom);
        $sql->bindParam(':age', $age);
        $sql->bindParam(':id', $id);

        if($sql->execute()){
            header("location: index.php"); // Redirection en cas de succès
        } else {
            $message = "Erreur lors de la mise à jour de l'employé.";
        }
    } else {
        $message = "Veuillez remplir tous les champs correctement.";
    }
}

$donnees = $bdd->query('SELECT * FROM employes')->fetch();
?>
<!-- Le reste du code HTML -->



    
    <div class="form">
        <a href="index.php" class="back_btn">
        <img src="/images/back.png" alt="">Retour</a>
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