<?php

try {
    $bdd = new PDO("mysql:host=localhost;dbname=societes; charset=utf8", "root", "");
    echo "";

}catch (PDOException $e) {
        echo "Erreur de connexion : " . $e->getMessage();
        die();
    }
?>