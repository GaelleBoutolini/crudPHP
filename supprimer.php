
<?php
require_once "connexion.php";
$id = $_GET['id'];
$response = $bdd->query("DELETE FROM employes WHERE id = $id");
header("location:index.php");
?>


