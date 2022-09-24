<?php
$sql = "INSERT INTO movies(filmName,
            filmDescription,
            filmImage,
            filmPrice,
            filmReview) VALUES (
            :filmName,
            :filmDescription,
            :filmImage,
            :filmPrice,
            :filmReview)";

$stmt = $pdo->prepare($sql);

$stmt->bindParam(':filmName', $_POST['filmName'], PDO::PARAM_STR);
$stmt->bindParam(':filmDescription', $_POST['filmDescription'], PDO::PARAM_STR);
$stmt->bindParam(':filmImage', $_POST['filmImage'], PDO::PARAM_STR);
// use PARAM_STR although a number
$stmt->bindParam(':filmPrice', $_POST['filmPrice'], PDO::PARAM_STR);
$stmt->bindParam(':filmReview', $_POST['filmReview'], PDO::PARAM_STR);

$stmt->execute();



/* PDO supported databases:
CUBRID (PDO)
MS SQL Server (PDO)
Firebird (PDO)
IBM (PDO)
Informix (PDO)
MySQL (PDO)
MS SQL Server (PDO)
Oracle (PDO)
ODBC and DB2 (PDO)
PostgreSQL (PDO)
SQLite (PDO)
4D (PDO)
*/


/*Predefined Constants ¶

The constants below are defined by this extension, and will only be available when the extension has either been compiled into PHP or dynamically loaded at runtime.

Warning
PDO uses class constants since PHP 5.1. Prior releases use global constants in the form PDO_PARAM_BOOL.
PDO::PARAM_BOOL (integer)
Represents a boolean data type.
PDO::PARAM_NULL (integer)
Represents the SQL NULL data type.
PDO::PARAM_INT (integer)
Represents the SQL INTEGER data type.
PDO::PARAM_STR (integer)
Represents the SQL CHAR, VARCHAR, or other string data type.
PDO::PARAM_LOB (integer)
Represents the SQL large object data type.*/
