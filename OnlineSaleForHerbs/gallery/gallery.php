<?php session_start() ?>
<!doctype html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>گالری فیلم</title>
		<meta name="keywords" content=" گالری عکس و فیلم از گیاهان دارویی " />
		<meta name="desciption" content="فیلم آموزشی تهیه ماسک گیاهی" />
		<meta name"author" content="alma ziaabadi" />
		<link rel="icon"   type="image/png"   href="../MediaAndAttach/images/logo.png">
		<link href="../css/general/nav.css" rel="stylesheet" />
		<link href="../css/general/main.css" rel="stylesheet" />
		<link href="../css/general/gallery.css" rel="stylesheet" />
			
	</head>	
<body>

<?php require ("../header-footer/header.php") ?>
		<div id="video" >

			<fieldset>

				<legend>&nbsp;&nbsp; ماسک گیاهی &nbsp;&nbsp;</legend>

				<video controls="controls">
  					<source src="../mediaAndAttach/videos/movie.mp4" type="video/mp4">
  					<source src="../mediaAndAttach/videos/movie.ogg" type="video/ogg">
  					Your browser does not support the video tag.
				</video>

				<br /><br />


			</fieldset>


		</div>

<?php require ("../header-footer/footer.php") ?>
</body>
</html>
