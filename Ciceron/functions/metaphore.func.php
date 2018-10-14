<?php
function description_mot2($conn, $mot)
{		
 	$sql = "SELECT * FROM `mots_subdivisions` AS MS,mots AS M WHERE MS.`MotLatinLemme`= M.NumeroAuto and M.`MotLatinLemme`='".$mot."'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {	
			echo $row['Description'] . "<br>";
		}
	} else {
		echo "Aucun resultats";
	}
}

function description_mot($conn, $mot)
{	
	$sql = "SELECT * FROM `mots_subdivisions` AS MS,mots AS M WHERE MS.`MotLatinLemme`= M.NumeroAuto and M.`MotLatinLemme`='".$mot."'";
	$result = $conn->query($sql);
	
	echo'<SCRIPT LANGUAGE="JavaScript">
	var liste_Description = [];';
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {	
			echo'liste_Description.push("'.$row['Description'] .'");
			';
		}
	} else {
		echo "Aucun extrait trouvé";
	}
	echo'
	function parse_italic(s){
		var p =s.indexOf("/");
		while (p!=-1){
			s = s.replace("/", "+");
			p =s.indexOf("/",p);
		}
		var p =s.indexOf("+");
		while (p!=-1){
			s = s.replace("+", "");
			p2 = s.indexOf("+");
			var result = s.substring(p, p2);
			result = result.italics();
			s = s.replace(s.substring(p, p2+1), result);
			p =s.indexOf("+");
		}
	return s;
	}
	function parse_espace(s){
		var p =s.indexOf(" °");
		while (p!=-1){
			if (p+2==";")
				s = s.replace(" °", "&nbsp;");
			else
				s = s.replace(" °", "&nbsp");
			p =s.indexOf(" °",p);
		}
	return s;
	}
	function parse_gras(s){
				var p =s.indexOf("*");
		while (p!=-1){
			s = s.replace("*", "");
			p2 = s.indexOf("*");
			var result = s.substring(p, p2);
			result = result.bold();
			s = s.replace(s.substring(p, p2+1), result);
			p =s.indexOf("*");
		}
	return s;
	}
	function parse_exposant(s){
				var p =s.indexOf("#");
		while (p!=-1){
			s = s.replace("#", "");
			p2 = s.indexOf("#");
			var result = s.substring(p, p2);
			result = result.sup();
			s = s.replace(s.substring(p, p2+1), result);
			p =s.indexOf("#");
		}
	return s;
	}
	function parse_maj(s){
				var p =s.indexOf("|");
		while (p!=-1){
			s = s.replace("|", "");
			p2 = s.indexOf("|");
			var result = s.substring(p, p2);
			result = result.toUpperCase();
			s = s.replace(s.substring(p, p2+1), result);
			p =s.indexOf("|");
		}
	return s;
	}
	function parse_sc_title(s){
		var p =s.indexOf("[");
		while (p!=-1){
			s = s.replace("[", "");
			p2 = s.indexOf("]");
			var result = s.substring(p, p2);
			result = result.italics();
			s = s.replace(s.substring(p, p2+1), "result");
			p =s.indexOf("[");
		}
	return s;
	}
		liste_Description = parse_maj(liste_Description[0]);
		liste_Description = parse_espace(liste_Description);
		liste_Description = parse_italic(liste_Description);
		liste_Description = parse_gras(liste_Description);
		liste_Description = parse_sc_title(liste_Description);
		liste_Description = parse_exposant(liste_Description);
		';
		htmlentities ('liste_Description', ENT_COMPAT, 'UTF-8');		
		echo';
		document.write(liste_Description);	
		document.write("<br/>");	
</SCRIPT>
';	
}

function extrait_mot($conn, $mot)
{	
	$sql = "SELECT L.`NumeroAuto`,`E`.`parag` AS para, E.Extrait, M.`MotLatinLemme`,L.`Discours (abreviation exportation)` FROM `mots_subdivisions` AS MS,mots AS M, extraits AS E,`livres anciens` AS L WHERE MS.`MotLatinLemme`= M.NumeroAuto and E.`Mots portant limage`=MS.`N` and E.`Discours`=L.NumeroAuto and M.`MotLatinLemme`='".$mot."'";
	$result = $conn->query($sql);
	
	echo'<SCRIPT LANGUAGE="JavaScript">
	var titre_discours = [];
	var paragraph = [];
	var numdiscours = [];
	var liste_extrait = [];';
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {	
			echo'titre_discours.push("'.$row['Discours (abreviation exportation)'] .'");
				numdiscours.push("'.$row['NumeroAuto'] .'");
				paragraph.push("'.$row['para'] .'");
				liste_extrait.push("'.$row['Extrait'] .'");
			';
		}
	} else {
		echo "Aucun extrait trouvé";
	}
	echo'
	function parse_italic(s){
		var p =s.indexOf("/");
		while (p!=-1){
			s = s.replace("/", "+");
			p =s.indexOf("/",p);
		}
		var p =s.indexOf("+");
		while (p!=-1){
			s = s.replace("+", "");
			p2 = s.indexOf("+");
			var result = s.substring(p, p2);
			result = result.italics();
			s = s.replace(s.substring(p, p2+1), result);
			p =s.indexOf("+");
		}
	return s;
	}
	function parse_espace(s){
		var p =s.indexOf(" °");
		while (p!=-1){
			if (p+2==";")
				s = s.replace(" °", "&nbsp;");
			else
				s = s.replace(" °", "&nbsp");
			p =s.indexOf(" °",p);
		}
	return s;
	}
	function parse_gras(s){
				var p =s.indexOf("*");
		while (p!=-1){
			s = s.replace("*", "");
			p2 = s.indexOf("*");
			var result = s.substring(p, p2);
			result = result.bold();
			s = s.replace(s.substring(p, p2+1), result);
			p =s.indexOf("*");
		}
	return s;
	}
	function parse_exposant(s){
				var p =s.indexOf("#");
		while (p!=-1){
			s = s.replace("#", "");
			p2 = s.indexOf("#");
			var result = s.substring(p, p2);
			result = result.sup();
			s = s.replace(s.substring(p, p2+1), result);
			p =s.indexOf("#");
		}
	return s;
	}
	function parse_maj(s){
				var p =s.indexOf("|");
		while (p!=-1){
			s = s.replace("|", "");
			p2 = s.indexOf("|");
			var result = s.substring(p, p2);
			result = result.toUpperCase();
			s = s.replace(s.substring(p, p2+1), result);
			p =s.indexOf("|");
		}
	return s;
	}
	function parse_sc_title(s){
		var p =s.indexOf("[");
		while (p!=-1){
			s = s.replace("[", "");
			p2 = s.indexOf("]");
			var result = s.substring(p, p2);
			result = result.italics();
			s = s.replace(s.substring(p, p2+1), "result");
			p =s.indexOf("[");
		}
	return s;
	}
	
	for(var i = 0, c = titre_discours.length; i < c; i++){
		titre_discours[i] = parse_maj(titre_discours[i]);
		titre_discours[i] = parse_espace(titre_discours[i]);
		titre_discours[i] = parse_italic(titre_discours[i]);
		titre_discours[i] = parse_gras(titre_discours[i]);
		titre_discours[i] = parse_sc_title(titre_discours[i]);
		titre_discours[i] = parse_exposant(titre_discours[i]);
		
		liste_extrait[i] = parse_maj(liste_extrait[i]);
		liste_extrait[i] = parse_espace(liste_extrait[i]);
		liste_extrait[i] = parse_italic(liste_extrait[i]);
		liste_extrait[i] = parse_gras(liste_extrait[i]);
		liste_extrait[i] = parse_sc_title(liste_extrait[i]);
		liste_extrait[i] = parse_exposant(liste_extrait[i]);

		var s = "<a href=Discours.php?discours="+numdiscours[i]+" target=_blank>"+titre_discours[i]+"</a>";
		document.write(s);	
		s = ". "+paragraph[i]+" \t&nbsp " +liste_extrait[i]+"<br/>";
		document.write(s);	
	}
</SCRIPT>
';	
}


function extrait_mot2($conn, $mot)
{	
	$sql = "SELECT L.`NumeroAuto`, E.Extrait, M.`MotLatinLemme`,L.`Discours (abreviation exportation)` FROM `mots_subdivisions` AS MS,mots AS M, extraits AS E,`livres anciens` AS L WHERE MS.`MotLatinLemme`= M.NumeroAuto and E.`Mots portant limage`=MS.`N` and E.`Discours`=L.NumeroAuto and M.`MotLatinLemme`='".$mot."'";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {	
			echo $row['Discours (abreviation exportation)'] . " &nbsp ";
			echo $row['Extrait'] . "<br>";
		}
	} else {
		echo "Aucun extrait trouvé";
	}
}

?>