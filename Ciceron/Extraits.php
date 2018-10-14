<?php
include('functions/connect.php');
include('functions/Extraits.func.php');
 ?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Métaphores extraites du texte</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<link rel="stylesheet" href="css/detailsExtraitstyle.css" />
</head>
<body>
	<!-- Main -->
	<div id="main">
		<div id="header">
			
		</div>
		<div id="content">
			<?php
				details_extrait_parse($conn, $_GET['idE']);
			?>
		</div>
	</div>
	<!-- Main -->
</body>
</html>