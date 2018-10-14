<?php
// la fonction qui va recuperer tout les textes discours // pas utiliser 
function get_Texte($conn)
{		
 	$sql = "SELECT * FROM `texte de reference` limit 1000 OFFSET 1 ";
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
// la fonction qui va recuperer un discours particulier // pas utiliser 
function get_filtre_T($conn, $disc)
{		
 	$sql = "SELECT * FROM `texte de reference` WHERE `Discours`= '".$disc."' limit 16791 OFFSET 1 ";
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

//la fonction avec javascript qui vas parser le texte et afficher par paragraphe en prenant les gras et italic
function get_filtre_Texte($conn, $disc){
		$sql = "SELECT DISTINCT`parag` FROM `texte de reference` WHERE `Discours`= '".$disc."' limit 16791 OFFSET 1"; 
	$result = $conn->query($sql);
	
		echo'<SCRIPT LANGUAGE="JavaScript">
	var liste = [];
	var liste2 = [];';
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo'liste.push("'.$row['parag'] .'");';
			$sql1 = "SELECT Texte FROM `texte de reference` WHERE `Discours`= '".$disc."' AND `parag`= '".$row['parag']."'";
			$result1 = $conn->query($sql1);
			$str = " ";
			while($row1 = $result1->fetch_assoc()) {
				$str = $str ." ". $row1['Texte'];
			}
			echo'liste2.push("'.$str.'");';
		}
	}
	else{
			echo " Aucun resultats";
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
			if (s.charAt(p+2)==";")
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
	for(var i = 0, c = liste2.length; i < c; i++){
		liste2[i] = parse_maj(liste2[i]);
		liste2[i] = parse_espace(liste2[i]);
		liste2[i] = parse_italic(liste2[i]);
		liste2[i] = parse_gras(liste2[i]);

		document.write(liste2[i]);
		document.write("<br/>");
	}
</SCRIPT>
';
}


//la fonction avec javascript qui vas parser le texte et afficher par paragraphe en effacant juste
function get_filtre_Texte2($conn, $disc){
		$sql = "SELECT DISTINCT`parag` FROM `texte de reference` WHERE `Discours`= '".$disc."' limit 16791 OFFSET 1"; 
	$result = $conn->query($sql);
	
		echo'<SCRIPT LANGUAGE="JavaScript">
	var liste = [];
	var liste2 = [];';
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo'liste.push("'.$row['parag'] .'");';
			$sql1 = "SELECT Texte FROM `texte de reference` WHERE `Discours`= '".$disc."' AND `parag`= '".$row['parag']."'";
			$result1 = $conn->query($sql1);
			$str = " ";
			while($row1 = $result1->fetch_assoc()) {
				$str = $str ." ". $row1['Texte'];
			}
			echo'liste2.push("'.$str.'");';
		}
	}
	else{
			echo " Aucun resultats";
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
			s = s.replace(s.substring(p, p2+1), result);
			p =s.indexOf("+");
		}
	return s;
	}
	function parse_espace(s){
		var p =s.indexOf(" °");
		while (p!=-1){
			if (s.charAt(p+2)==";")
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
			s = s.replace(s.substring(p, p2+1), result);
			p =s.indexOf("*");
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
	for(var i = 0, c = liste2.length; i < c; i++){
		liste2[i] = parse_maj(liste2[i]);
		liste2[i] = parse_espace(liste2[i]);
		liste2[i] = parse_italic(liste2[i]);
		liste2[i] = parse_gras(liste2[i]);
		space =". &nbsp ";
		document.write(liste[i]);
		document.write(space);
		document.write(liste2[i]);
		document.write("<br/>");
	}
</SCRIPT>
';
}

// la fonction qui va recuperer le titre du texte du discours
function get_titreTexte($conn, $disc)
{			
	$sql = "SELECT * FROM `texte de reference` WHERE `Discours`= '".$disc."' AND `parag`= 't'";
	$result = $conn->query($sql);

		echo'<SCRIPT LANGUAGE="JavaScript">
	var liste = "";';
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()){
			echo'liste="'.$row['Texte'] .'";';
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
			result.italics();
			s = s.replace(s.substring(p, p2+1), result);
			p =s.indexOf("+");
		}
	return s;
	}
	function parse_espace(s){
		var p =s.indexOf(" °");
		while (p!=-1){
			s = s.replace(" °", " ");
			p =s.indexOf(" °",p);
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
		liste = parse_espace(liste);
		liste = parse_italic(liste);
		liste = parse_maj(liste);
		liste = liste.bold();
		document.write(liste);
</SCRIPT>
';	
}

function get_discours($conn)
{
	$sql = "SELECT * FROM `livres anciens` ORDER BY `livres anciens`.`NumeroAuto` ASC"; 
	$result = $conn->query($sql);
	
		echo'<SCRIPT LANGUAGE="JavaScript">
window.onload = function(){
	var motsClefs = [];
	var num_discours = [];
	';
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo'motsClefs.push("'.$row['Discours (abreviation)'].'");';
			echo'num_discours.push("'.$row['NumeroAuto'].'");';
		}
	}
	else{
			echo " Aucun resultats";
		}
	echo'
	var form = document.getElementById("auto-suggest");
	var input = form.search;
	var inputnum = form.discours;
	
	var list = document.createElement("ul");
	list.className = "suggestions";
	list.style.display = "none";

	form.appendChild(list);

	input.onkeyup = function(){
		var txt = this.value;
		if(!txt){
			list.style.display = "none";
		    return;
		}
		
		var suggestions = 0;
		var frag = document.createDocumentFragment();
		
		for(var i = 0, c = motsClefs.length; i < c; i++){
			if(new RegExp("^"+txt,"i").test(motsClefs[i])){
				var word = document.createElement("li");
				frag.appendChild(word);
				word.innerHTML = motsClefs[i].replace(new RegExp("^("+txt+")","i"),"<strong>$1</strong>");
				word.mot = motsClefs[i];
				word.onmousedown = function(){					
					input.focus();
					input.value = this.mot;
					var a = motsClefs.indexOf(this.mot);
					inputnum.value=num_discours[a];
					list.style.display = "none";
					return false;
				};				
				suggestions++;
			}
		}

		if(suggestions){
			list.innerHTML = "";
			list.appendChild(frag);
			list.style.display = "block";
		}
		else {
			list.style.display = "none";			
		}
	};

	input.onblur = function(){
		list.style.display = "none";
        if(this.value=="")
            this.value = "Rechercher...";
			
	};
};
</SCRIPT>
';
}

function get_chrono_discours($conn)
{	
	echo'<option value="none" disabled selected> Selectionner un Discours </option>';
	$sql = "SELECT * FROM `livres anciens` WHERE 1	"; 
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {	
			echo'<option value="'.$row['NumeroAuto'].'">'.$row['Discours (titre)'].'</option>';
		}
	} else {
		echo "0 results";
	}
}
function get_chrono_discours2($conn, $posindex, $os)
{
	if ($os == "chrono"){
		echo'<option value="none" disabled selected> Selectionner un Discours </option>';
	    $sql = "SELECT * FROM `livres anciens` WHERE 1"; }
	if ($os == "alpha")
		$sql = "SELECT * FROM `livres anciens` ORDER BY `livres anciens`.`NumeroAuto` ASC";

	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$cpt=1;
		// output data of each row
		while($row = $result->fetch_assoc()) {
			if ($cpt == $posindex)
				echo'<option value="'.$row['NumeroAuto'].'" selected>'.$row['Discours (titre)'].'</option>';
			else
				echo'<option value="'.$row['NumeroAuto'].'">'.$row['Discours (titre)'].'</option>';
			$cpt = $cpt+1;
		}
	} else {
		echo "0 results";
	}
}

//FONCTION POUR L'EXTRAIT

function extrait_discours($conn, $disc)
{   $sql = "SELECT * FROM `extraits` AS E, `mots_subdivisions` AS MS,`mots` AS M WHERE MS.`N`=E.`Mots portant limage` AND MS.`N`=M.NumeroAuto AND E.`Discours`=".$disc." ORDER BY `E`.`N de lextrait`";

	//$sql = "SELECT * FROM `extraits` WHERE `Discours`= ".$disc." ORDER BY`Texte source (classement)`,`N d'ordre`";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {	
			//echo'<option value="'.$row['N'].'">' .$row['MotLatinLemme'].'</option>';
			echo'<option value="'.$row['N'].'">' .$row['Extrait'].'</option>';				
		}
	} else {
		echo "0 results";
	}
}
function extrait_parse_discours($conn, $disc){
	$sql = "SELECT * FROM `extraits` AS E, `mots_subdivisions` AS MS,`mots` AS M WHERE MS.`N`=E.`Mots portant limage` AND MS.`N`=M.NumeroAuto AND E.`Discours`=".$disc." ORDER BY `E`.`N de lextrait`"; 
	$result = $conn->query($sql);
	
		echo'<SCRIPT LANGUAGE="JavaScript">
	var liste2 = [];';
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()){
			echo'liste2.push("'.$row['Extrait'] .'");';
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
			s = s.replace(s.substring(p, p2+1), result);
			p =s.indexOf("+");
		}
	return s;
	}
	function parse_espace(s){
		var p =s.indexOf(" °");
		while (p!=-1){
			s = s.replace(" °", " ");
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
			s = s.replace(s.substring(p, p2+1), result);
			p =s.indexOf("*");
		}
	return s;
	}
	function parse_troispoints(s){
		var p =s.indexOf("…’");
		if (p!=-1)
			s = s.replace("…’", "");
		var p =s.indexOf("… .");
		if (p!=-1)
			s = s.replace("… .", "");
		else
			s = s.substr(0, s.length - 1); 
		var p =s.indexOf("‘… ");
		if (p!=-1)
			s = s.replace("‘… ", "");
		var p =s.indexOf("… ");
		if (p==0)
			s = s.replace("…", "");
		var p =s.indexOf("‘");
		if ((p==0)||(p==s.length - 1))
			s = s.replace("‘", "");
		var p =s.indexOf("’");
		if ((p==0)||(p==s.length - 1))
			s = s.replace("’", "");
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
			s = s.replace(s.substring(p, p2+1), "");
			p =s.indexOf("[");
		}
	return s;
	}
	
	function split3points(s){
		var p =s.indexOf("…");
		if (p!=-1){
			s = s.split("…");
			if (s[0].length > s[1].length)
				s = s[0];
			else
				s = s[1];
		}
	return s;
	}
	var liste = document.getElementById("liste_extrait_discours");
	for(var i = 0, c = liste2.length; i < c; i++){
		liste2[i] = parse_maj(liste2[i]);
		liste2[i] = parse_espace(liste2[i]);
		liste2[i] = parse_italic(liste2[i]);
		liste2[i] = parse_gras(liste2[i]);
		liste2[i] = parse_sc_title(liste2[i]);
		liste2[i] = parse_troispoints(liste2[i]);
		liste2[i] = split3points(liste2[i]);
		liste.options[i].value=liste2[i];
	}
</SCRIPT>
';	
}

function extrait_motlatin_discours($conn, $disc)
{   //$sql = "SELECT * FROM `extraits` AS E, `mots_subdivisions` AS MS,`mots` AS M WHERE MS.`N`=E.`Mots portant limage` AND MS.`N`=M.NumeroAuto AND E.`Discours`=".$disc." ORDER BY`E`.`N de lextrait`";
	
	$sql = "SELECT * FROM `extraits` AS E, `mots_subdivisions` AS MS,`mots` AS M WHERE MS.`N`=E.`Mots portant limage` AND MS.`MotLatinLemme`=M.NumeroAuto AND E.`Discours`=".$disc." ORDER BY`E`.`N de lextrait`";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$idE = $row["N de lextrait"];
			echo'<option ondblclick="javascript:open_infos('.$idE.');" value="'.$row['N'].'">' .$row['MotLatinLemme'].'</option>';
		}
	} else {
		echo "0 results";
	}
}
function abreviation_discours($conn, $disc)
{   
	if ($disc != ""){
	$sql = "SELECT `Discours (abreviation)` FROM `extraits` AS E, `livres anciens description` AS L WHERE `Discours`= ".$disc." AND L.`NumeroAuto`=E.`Discours` GROUP BY L.`Discours (abreviation)`";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {	
			echo $row['Discours (abreviation)'];
		}
	} else {
		echo "0 results";
	}
	}
}
?>
