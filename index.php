<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style.css">
    <title>BD-Employes</title>
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <meta http-equiv="Content-Security-Policy" content="img-src 'self' https://gaelleboutolini.github.io;">

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
    <a href="ajouter.php" class="Btn_add"><img src="/images/img.png" alt="">Ajouter</a>
    <table>
        <tr id="items">
            <th>Nom</th>
            <th>Prénom</th>
            <th>Age</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>
        <?php
        include_once "connexion.php";
        ?>
            <?php
            $response = $bdd->query('SELECT * FROM employes');
            while ($donnees = $response->fetch()) { ?>

                <tr>
                    <td><?= $donnees['nom'] ?></td>
                    <td><?= $donnees['prenom'] ?></td>
                    <td><?= $donnees['age'] ?></td>
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