<?php session_start()?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>گیاهان دارویی</title>
		<meta name="keywords" content="فروش اینترنتی گیاهان دارویی، خرید گیاهان خشک، گیاهان دارویی با کیفیت مطلوب" />
		<meta name="desciption" content="انواع گیاهان دارویی با کیفیت از مناطق مختلف ایران" />
		<meta name"author" content="alma ziaabadi" />
		<link rel="icon"   type="image/png"   href="../MediaAndAttach/images/logo.png">
		<link href="../css/general/nav.css" rel="stylesheet" />
		<link href="../css/products/products.css" rel="stylesheet" />
		<link href="../css/general/main.css" rel="stylesheet" />
	</head>	
<body>


<?php require("../header-footer/header.php");  ?>
<?php

$dbServer = "localhost";
$dbUser = "alma";
$dbPass = "111111";
$dbName = "onlineherbshop";

try {
	$con = new PDO("mysql:host=$dbServer;dbname=$dbName", $dbUser, $dbPass);
	// set the PDO error mode to exception
	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$con->exec("SET CHARACTER SET utf8");      // set encoding to utf-8

	// select all rows
	$sql="SELECT * FROM medicinalHerbs";

	$stmt=$con->query($sql);

	$rowCount = $stmt->rowCount();

	echo '<div id="products">';
	while($row=$stmt->fetchObject()) {

		echo '<div>';
			echo '<p>';
				echo '<img src="../mediaAndAttach/images/'.$row->pic.'" alt="گزنه" />';
				echo '<center>'.$row->pname.'</br>'.$row->price.'</br>'.$row->application.'</br></center>';
			echo '</p>';
		echo '</div>';

	}
	echo '</div>';
} catch (PDOException $e) {
	echo "Error: " . $e->getMessage();
}

$con = null;



?>
<?php require("../header-footer/footer.php");  ?>
</body>
</html>
