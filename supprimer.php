

<?php
 include_once "connexion.php";
try {
    $id = (isset($_GET['id']) && empty($_GET['id'])) ? intval($_GET['id']) : 0;

    if ($id > 0) {
        $pdo = new PDO('mysql:host=localhost;dbname=societe', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = "DELETE FROM employe WHERE id = :id";
        $id = $pdo->prepare($sql);
        $id->bindValue(':id', $id, PDO::PARAM_INT);
        $id->execute();

        echo "L'enregistrement a été supprimé avec succès.";
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
    header("location: index.php");
}
?>


