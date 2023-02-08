
<?php
require_once "connexion.php";
$id = $_GET['id'];
//essaie un par un et choiser celui qui marche suis pas sûr
$bdd->exec("DELETE FROM employe WHERE id=`$id`");
$bdd->exec("DELETE FROM employe WHERE id=".$id);
echo "entrées supprimées !";
header("Location:index.php");
?>


