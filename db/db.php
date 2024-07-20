<?php

// Constante d'environnement

define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_NAME", "terangua");
define("DB_PASS", "");

// DSN de connexion
$dns = "mysql:dbname=" . DB_NAME . ";host=" . DB_HOST;
// On se connecte à la bdd
try {
    $db = new PDO($dns, DB_USER, DB_PASS);
    // on envoi les données au format UTF-8
    $db->exec("SET NAMES utf8");

    // On définit le mode de fetch par défaut
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erreur" . $e->getMessage());
}
