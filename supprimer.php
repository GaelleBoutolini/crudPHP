
<?php
require_once "connexion.php";
//modification de l'id dans le lien
$id = $_GET['id'];
//requete de suppression
$response = $bdd->query("DELETE FROM employe WHERE id = $id");
//redirection vers la page index.php
header("location:index.php");


?>


