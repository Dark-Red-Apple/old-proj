<?php session_start()?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>تماس با ما</title>
		<meta name="keywords" content=" تماس با سایت فروش ایتنرنتی گیاهان دارویی " />
		<meta name="desciption" content="تماس با مدیریت سایت گیاهان دارویی" />
		<meta name"author" content="alma ziaabadi" />
		<link rel="icon"   type="image/png"   href="../MediaAndAttach/images/logo.png">
		<link href="../index.css" rel="stylesheet" />
		<link href="../css/general/nav.css" rel="stylesheet" />
		<link href="../css/general/main.css" rel="stylesheet" />
		<link href="contactForm.css" rel="stylesheet" />

	<script src="http://maps.googleapis.com/maps/api/js"></script>
		<script>
			function initialize() {
				var mapProp = {
					center:new google.maps.LatLng(35.790275, 51.357793),
					zoom:17,
					mapTypeId:google.maps.MapTypeId.ROADMAP
				};
				var map=new google.maps.Map(document.getElementById("map"), mapProp);
			}
			google.maps.event.addDomListener(window, 'load', initialize);
		</script>
		
	</head>
</head>

<body>


<?php require("../header-footer/header.php");

if(isset($_POST['submit']) && isset($_POST['fname'])&& isset($_POST['family']) && isset($_POST['brief']) ){
	$fname=$_POST['fname'];
	$lname=$_POST['family'];
	$brief=$_POST['brief'];
	$db="onlineherbshop";
	$dbUser="alma";
	$dbPass="111111";
	$dbServer="localhost";
	include('../MediaAndAttach/other/jdf.php');
	date_default_timezone_set("Asia/Tehran");
	echo "تاریخ و زمان جاری سرور:  " . jdate("Y/m/d H:i:s").'<br />';
	$date=jdate("Y/m/d H:i:s ");
	try{
		$con= new PDO("mysql:host=$dbServer;dbname=$db",$dbUser,$dbPass);
		$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$con->exec("set character set utf8");

		//$sql="INSERT INTO contactUs fname='$fname',lname='$lname', description='$brief',dateTime='$date'";
		$sql="INSERT INTO contactUs (fname,lname,description,dateTime) VALUES 
				                   ('$fname','$lname', '$brief','$date')";
		$stm= $con->prepare($sql);
		$stm->execute();
		//post/redirect/get
		header("location:../index.php");


	}
	catch (PDOException $e){

		echo "Error:".$e->getMessage();
	}

}



?>
<div id="formandmap">
	<div id="map">
	</div>

	<form method="post" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" enctype="multipart/form-data">
	<div id="register">
	
  	 	 <div>
			<div>نام</div>
			<div><input type="text" name="fname" /></div>
   		</div>
    
    		<div>
			<div>نام خانوادگی</div>
			<div><input type="text" name="family" /></div>
    		</div>

   		<div>
			<div>توضیحات</div>
			<div><textarea name="brief"></textarea></div>
 		</div>
    
   		<div>

			<div></div>
			<div>
        			<input type="submit" name="submit" value="ثبت" />
            			<input type="reset" value="انصراف" />
        		</div>
   		 </div>
    
	</div>
	</form>
</div>
<?php require("../header-footer/footer.php");  ?>
</body>
</html>
