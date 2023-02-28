<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style.css">
    <title>BD-société</title>
</head>
<body>
    <div>
<nav>
        <a href="#">Accueil</a>
        <a href="#">A propos</a>
        <a href="#">Contact</a>
    </nav>
    </div>
  
    <div class="container">
      
        <table>
            <tr id="items">
                
    
                <th>Nom</th>
                <th>Prénom</th>
                <th>Age</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
            
            <a href="ajouter.php" class="Btn_add"><img src="/images/img.png" alt="">Ajouter</a>
        <?php
        // J'inclue la page de connexion
        include_once "connexion.php";
        ?>
        
        <!-- //requête pour afficher la liste des employés -->
            <?php
            $response = $bdd->query('SELECT * FROM employe');
            while ($donnees = $response->fetch()) { ?>
<!-- 
Ligne 1: la variable $response stocke le résultat de la requête SQL exécutée sur la base de données. La requête est de type SELECT qui sélectionne toutes les colonnes (*) de la table employe. La méthode query est appelée sur l'objet de connexion à la base de données $bdd.

Ligne 2: la structure de boucle while est utilisée pour parcourir tous les enregistrements du jeu de résultats retourné par la requête. La méthode fetch est appelée à chaque itération pour récupérer le prochain enregistrement sous forme de tableau associatif, qui est stocké dans la variable $donnees. -->
                <tr>
                    <td><?= $donnees['nom'] ?></td>
                    <td><?= $donnees['prenom'] ?></td>
                    <td><?= $donnees['age'] ?></td>
             <!-- //Ici, je met l'id de chaque employé dans ce lien -->
             <td><a href="modifier.php?id=<?=$donnees['id']?> "><img src="/images/pen.png" alt=""></a></td>
             <td><a href="supprimer.php?id=<?=$donnees['id']?> "><img src="/images/trash.png" alt=""></a></td>
                    </tr>
            <?php
            }
            ?>
        </table>
    </div>
    <footer>
        <p>Mes coordonnées</p>
    </footer>
</body>
</html>