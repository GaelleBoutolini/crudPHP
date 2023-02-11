
<?php
require_once "connexion.php";
//modification de l'id dans le lien
$id = $_GET['id'];
// récupère la valeur de l'identifiant de l'employé à partir de la requête HTTP GET. La variable $_GET est un tableau associatif qui contient toutes les données passées en paramètre dans l'URL de la requête.

//requete de suppression
$response = $bdd->query("DELETE FROM employe WHERE id = $id");
// cette ligne envoie une requête SQL à la base de données pour supprimer l'employé correspondant à l'identifiant $id. La variable $bdd représente une connexion à la base de données. La méthode query exécute la requête SQL passée en paramètre et renvoie le résultat de la requête.

//redirection vers la page index.php
header("location:index.php");
?>


