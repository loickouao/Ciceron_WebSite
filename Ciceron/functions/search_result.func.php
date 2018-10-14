<?php
// la fonction qui va recuperer tout les discours
function get_resultSearch($conn, $data )
{		
	$sql = "SELECT * FROM `mots_subdivisions` AS MS, mots WHERE mots.`MotLatinLemme` LIKE '%".$data."%' AND MS.MotLatinLemme = Mots.NumeroAuto";
	$result = $conn->query($sql);
	
	$sql1 = "SELECT * FROM `mots_subdivisions` AS MS, mots WHERE mots.`MotLatinLemme` LIKE '".$data."' AND MS.MotLatinLemme = Mots.NumeroAuto";
	$result1 = $conn->query($sql1);
	
	if ($result1->num_rows > 0) {
		// output data of each row
		echo "<u><b>Description</b></u><br>";
		while($row = $result->fetch_assoc()) {	
			echo $row["Description"] . "<br>";
			echo "<u><b>Sens de départ</b></u><br>";
			echo $row["Sens de départ"] . "<br>";
			echo "<u><b>Sens d'arrivée</b></u><br>";
			echo $row["Sens d'arrivée"] . "<br>";
		}
	} else {
		echo "<br>";
	}
	
	
	if ($result->num_rows > 0) {
		// output data of each row
		echo "<u><b><br>Suggestion</b></u><br>";
		while($row = $result->fetch_assoc()) {	
			echo $row["MotLatinLemme"] . "<br>";
		}
	} else {
		echo "Aucun résultat";
	}
}

?>