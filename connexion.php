<?php

try {
    $bdd = new PDO("mysql:host=localhost;dbname=societe; charset=utf8", "root", "");
    echo "Vous êtes connectés à la bdd";

}catch (PDOException $e) {
        echo "Erreur de connexion : " . $e->getMessage();
        die();
    }
?>