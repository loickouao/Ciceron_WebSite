<?php
// la fonction qui va recuperer tout les textes discours
function get_Texte($conn)
{		
 	$sql = "SELECT * FROM `_Texte de référence` limit 1000 OFFSET 1 ";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {	
			echo $row["Texte"] . "<br>";
		}
	} else {
		echo "0 results";
	}
}

function get_filtre_Texte($conn, $disc)
{		
 	$sql = "SELECT * FROM `_Texte de référence` WHERE `Discours`= '".$disc."' limit 1000 OFFSET 1 ";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {	
			echo $row["Texte"] . "<br>";
		}
	} else {
		echo "";
	}
}

// la fonction qui va recuperer le titre du texte du discours
function get_titreTexte($conn, $disc)
{			
	$sql = "SELECT * FROM `_texte de référence` WHERE `Discours`= '".$disc."' AND `§ (d)`= 't'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {	
			echo "<b>" . $row["Texte"] . "</b><br><br>";
		}
	} else {
		echo "";
	}
}

function extrait_discours($conn, $disc)
{
	$sql = "SELECT * FROM `extraits` WHERE `Discours`= ".$disc." limit 100"; 
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {	
			echo'<option value="'.$row['N°'].'">'.$row['Extrait'].'</option>';
		}
	} else {
		echo "0 results";
	}
}

function get_discours($conn)
{
	$sql = "SELECT * FROM `livres anciens - description` ORDER BY `Discours (titre)` ASC"; 
	$result = $conn->query($sql);
	echo'<option value="52">-- ALL --</option>';
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {	
			echo'<option value="'.$row['N°'].'">'.$row['Discours (titre)'].'</option>';
		}
	} else {
		echo "0 results";
	}
}

function get_tri_discours($conn, $disc)
{	if ($disc ==52){
		echo'<option value="1">-- ALL --</option>';
	}else{
		$sql = "SELECT * FROM `livres anciens - description` WHERE `N°` = '".$disc."'"; 
	}
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {	
			echo'<option value="'.$row['N°'].'">'.$row['Discours (titre)'].'</option>';
		}
	} else {
		echo "0 results";
	}
}

?>