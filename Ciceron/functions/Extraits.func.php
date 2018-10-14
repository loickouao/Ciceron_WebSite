<?php
function details_extrait($conn, $idE)
{   $sql = "SELECT L.`Discours (abreviation)`,`parag`,`Extrait`,`Apparat critique`,`Traduction de lextrait`,`Rem suivant lextrait` FROM `livres anciens description` AS L,extraits AS E WHERE E.`N de lextrait`=".$idE." AND L.`NumeroAuto`=E.Discours";
	
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			echo $row["Extrait"] . "<br>";
		}
	} else {
		echo "0 results";
	}

}

function details_extrait_parse($conn, $idE)
{   $sql = "SELECT L.`Discours (abreviation)`,`parag`,`Extrait`,`Apparat critique`,`Traduction de lextrait`,`Rem suivant lextrait` FROM `livres anciens description` AS L,extraits AS E WHERE E.`N de lextrait`=".$idE." AND L.`NumeroAuto`=E.Discours";
	$result = $conn->query($sql);
	
		echo'<SCRIPT LANGUAGE="JavaScript">
	var titre_discours = "";
	var parag = "";
	var  Apparat_critique = "";
	var traduction = "";
	var remarques = "";
	var liste2 = [];';
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()){
			echo'liste2.push("'.$row['Extrait'] .'");
				titre_discours = "'.$row['Discours (abreviation)'] .'";
				parag = "'.$row['parag'] .'";
				Apparat_critique = "'.$row['Apparat critique'] .'";
				traduction = "'.$row["Traduction de lextrait"] .'";
				remarques = "'.$row["Rem suivant lextrait"] .'";
			';
		}
	}
	else
		echo " Aucun resultats";
		
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
	
	function parse_deuxpoints(s){
		var p =s.indexOf(":");
		while (p!=-1){
			s = s.replace(":", ">");
			p =s.indexOf(":",p);
		}
	return s;
	}
	function parse_points(s){
		var p =s.indexOf(".");
		while (p!=-1){
			s = s.replace(".", " &nbsp &nbsp");
			p =s.indexOf(".",p);
		}
	return s;
	}
	
	liste2 = parse_espace(liste2[0]);
	liste2 = parse_italic(liste2);
	liste2 = parse_gras(liste2);
	liste2 = parse_maj(liste2);
	liste2 = parse_sc_title(liste2);
	liste2 = parse_exposant(liste2);
	
	remarques = parse_espace(remarques);
	remarques = parse_italic(remarques);
	remarques = parse_gras(remarques);
	remarques = parse_maj(remarques);
	remarques = parse_sc_title(remarques);
	remarques = parse_exposant(remarques);
	remarques = parse_deuxpoints(remarques);
	remarques = parse_points(remarques);
	
	Apparat_critique = parse_espace(Apparat_critique);
	Apparat_critique = parse_italic(Apparat_critique);
	Apparat_critique = parse_gras(Apparat_critique);
	Apparat_critique = parse_maj(Apparat_critique);
	Apparat_critique = parse_sc_title(Apparat_critique);
	Apparat_critique = parse_exposant(Apparat_critique);
	
	traduction = parse_espace(traduction);
	traduction = parse_italic(traduction);
	traduction = parse_gras(traduction);
	traduction = parse_maj(traduction);
	traduction = parse_sc_title(traduction);
	traduction = parse_exposant(traduction);
	
	
	var sentence = titre_discours.italics();
	sentence = sentence+"&nbsp"+parag+".&nbsp"+liste2+"<br>";
	sentence = sentence+"<span id=apparat>"+ Apparat_critique +"</span>";
	sentence = sentence+"<p id=traduction>« "+ traduction + " » </p>";
	sentence = sentence+"<p id=remarques>"+ remarques +"</p>";
	document.write(sentence);
	
</SCRIPT>
';	
}
?>