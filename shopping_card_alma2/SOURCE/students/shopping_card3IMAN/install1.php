<!doctype html>
<html lang="fa">
<head>
    <meta charset="utf-8">
    <title>install</title>
    <link href="main.css" rel="stylesheet"/>
    <link href="addContact.css" rel="stylesheet"/>
</head>
<body>

<?php

$dbServer = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "shopping_card";

try {
    $con = new PDO("mysql:host=$dbServer;dbname=$dbName", $dbUser, $dbPass);
    // set the PDO error mode to exception
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $con->exec("SET CHARACTER SET utf8");      // Sets encoding UTF-8


    // prepare sql and bind parameters
    $stmt = $con->query("GRANT ALL PRIVILEGES ON shopping_card.* To 'shopping_card'@'localhost' IDENTIFIED BY '1'");
    echo "New records created successfully";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$con = null;
?>
</body>
</html>