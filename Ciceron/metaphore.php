<?php
header ('Content-type:text/html; charset=utf-8');
include('functions/connect.php');
include('functions/metaphore.func.php');
 ?>
<div>
	<h3><i><?php echo $_GET['mot'];?></i></h3>
	<?php
		description_mot($conn, $_GET['mot']);
		echo"<br>";
		extrait_mot($conn, $_GET['mot']);
	?>
</div>