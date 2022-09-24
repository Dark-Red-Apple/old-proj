<?php
require_once('../config.php');
try {
    $con = new PDO("mysql:host=$dbServer;dbname=$dbName", $dbUser, $dbPass);
    // set the PDO error mode to exception
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $con->exec("SET CHARACTER SET utf8");      // set encoding to utf-8
    return $con;
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
//$con = null;