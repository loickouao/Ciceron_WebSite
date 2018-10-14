<?php
function get_chrono_discours($conn)
{	
	echo'<option value="none"> Selectionner un Discours </option>';
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
function get_chrono_discours2($conn, $posindex)
{	echo'<option value="none"> Selectionner un Discours </option>';
	$sql = "SELECT * FROM `livres anciens` WHERE 1"; 
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
// fonction qui va recueperer la liste des themes
function get_theme($conn)
{	
	echo'<option value="none"> Selectionner un thème </option>';
	$sql = "SELECT * FROM `themes source` WHERE 1 ORDER BY `themes source`.`Themes` ASC
"; 
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {	
			echo'<option value="'.$row['N'].'">'.$row['Themes'].'</option>';
		}
	} else {
		echo "0 results";
	}
}
function get_theme2($conn, $posindex)
{	echo'<option value="none"> Selectionner un thème </option>';
	$sql = "SELECT * FROM `themes source` WHERE 1 ORDER BY `themes source`.`Themes` ASC"; 
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$cpt=1;
		// output data of each row
		while($row = $result->fetch_assoc()) {
			if ($cpt == $posindex)
				echo'<option value="'.$row['N'].'" selected>'.$row['Themes'].'</option>';
			else
				echo'<option value="'.$row['N'].'">'.$row['Themes'].'</option>';
			$cpt = $cpt+1;
		}
	} else {
		echo "0 results";
	}
}

function get_metaphores($conn)
{
	$sql = "SELECT DISTINCT M.MotLatinLemme AS ID FROM `extraits` AS E, `mots_subdivisions` AS MS,`mots` AS M WHERE MS.`N`=E.`Mots portant limage` AND MS.`MotLatinLemme`=M.NumeroAuto ORDER BY`E`.`N de lextrait`";
	$result = $conn->query($sql);
	
		echo'<SCRIPT LANGUAGE="JavaScript">
window.onload = function(){
	var motsClefs = [];
	';
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo'motsClefs.push("'.$row['ID'].'");';
		}
	}
	else{
			echo " Aucun resultats";
		}
	echo'
	
	var form = document.getElementById("form_filtre_metaphore");
	var input = form.search;
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


///////////////////////////////
//la fonction avec javascript qui vas parser les extrait et afficher en effacant juste pour seulement un filtre
function get_filtre_extrait_only1($conn, $disc, $filtre){
	if ($filtre =="filtrediscours"){
	$sql = "SELECT `E`.`N de lextrait` AS ID, E.Extrait AS extr,`E`.`parag` AS para,`E`.`Discours` AS discs, LA.`Discours (abreviation)` AS ABDISC, TM.Themes AS THEM, M.MotLatinLemme AS MOTLAT FROM `extraits` AS E, `mots_subdivisions` AS MS,`mots` AS M, `livres anciens` AS LA, `themes source` AS TM WHERE LA.NumeroAuto = E.Discours AND MS.`N`=E.`Mots portant limage` AND TM.N= MS.`Themes (source)` AND MS.`MotLatinLemme`=M.NumeroAuto AND E.Discours =".$disc." ORDER BY`E`.`N de lextrait`";
	}
	if ($filtre =="filtretheme"){
		$sql = "SELECT `E`.`N de lextrait` AS ID, E.Extrait AS extr,`E`.`parag` AS para,`E`.`Discours` AS discs, LA.`Discours (abreviation)` AS ABDISC, TM.Themes AS THEM, M.MotLatinLemme AS MOTLAT FROM `extraits` AS E, `mots_subdivisions` AS MS,`mots` AS M, `livres anciens` AS LA, `themes source` AS TM WHERE LA.NumeroAuto = E.Discours AND MS.`N`=E.`Mots portant limage` AND TM.N= MS.`Themes (source)` AND MS.`MotLatinLemme`=M.NumeroAuto AND TM.N=".$disc." ORDER BY`E`.`N de lextrait`";
	}
	if ($filtre =="filtremetaphore"){
		$sql = "SELECT `E`.`N de lextrait` AS ID, E.Extrait AS extr,`E`.`parag` AS para,`E`.`Discours` AS discs, LA.`Discours (abreviation)` AS ABDISC, TM.Themes AS THEM, M.MotLatinLemme AS MOTLAT FROM `extraits` AS E, `mots_subdivisions` AS MS,`mots` AS M, `livres anciens` AS LA, `themes source` AS TM WHERE LA.NumeroAuto = E.Discours AND MS.`N`=E.`Mots portant limage` AND TM.N= MS.`Themes (source)` AND MS.`MotLatinLemme`=M.NumeroAuto AND M.MotLatinLemme LIKE '".$disc."' ORDER BY`E`.`N de lextrait`";
	}
	
	$result = $conn->query($sql);
	
		echo'<SCRIPT LANGUAGE="JavaScript">
	var liste1 = [];
	var liste3 = [];
	var nomdiscours = [];
	var id_extrait =[];
	var paragr =[];
	var numdiscours=[];
	var liste2 = [];';
	if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				echo'liste1.push("'.$row['MOTLAT'].'");
					liste2.push("'.$row['extr'].'");
					liste3.push("'.$row['THEM'].'");
					nomdiscours.push("'.$row['ABDISC'].'");
					numdiscours.push("'.$row['discs'].'");
					id_extrait.push("'.$row['ID'].'");
					paragr.push("'.$row['para'].'");';
			}
	}
	else{
			echo'liste2.push("none");';
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
	space = " &nbsp ";
	if ((liste2.length==1) && (liste2[0]=="none")){
		document.write("Aucun Resultat trouvé");
	}else{
	for(var i = 0, c = liste2.length; i < c; i++){	
		liste2[i] = parse_maj(liste2[i]);
		liste2[i] = parse_espace(liste2[i]);
		liste2[i] = parse_italic(liste2[i]);
		liste2[i] = parse_gras(liste2[i]);
		var nume=i+1;
		document.write("<div id=divmeta>"+nume+".<b>"+space+liste1[i]+"</b></div>");
		document.write("<div id=divtheme><b>"+space+liste3[i]+space+"</b></div>");
		document.write("<div id=divextrait>"+space+"<a href=Discours.php?discours="+numdiscours[i]+" target=_blank>"+nomdiscours[i]+"</a> "+paragr[i]+space+liste2[i]+"</div>");
		document.write("<div class=divider2></div>");
	}
	}	
</SCRIPT>
';
}

//la fonction avec javascript qui vas parser les extrait et afficher en effacant juste pour 2 filtres
function get_2filtre_extrait($conn, $disc, $disc2, $filtre){
	if ($filtre =="filtre_discours_metaphore"){
		$sql = "SELECT `E`.`N de lextrait` AS ID, E.Extrait AS extr,`E`.`parag` AS para,`E`.`Discours` AS discs, LA.`Discours (abreviation)` AS ABDISC, TM.Themes AS THEM, M.MotLatinLemme AS MOTLAT FROM `extraits` AS E, `mots_subdivisions` AS MS,`mots` AS M, `livres anciens` AS LA, `themes source` AS TM WHERE LA.NumeroAuto = E.Discours AND MS.`N`=E.`Mots portant limage` AND TM.N= MS.`Themes (source)` AND MS.`MotLatinLemme`=M.NumeroAuto AND E.Discours ='".$disc."' AND M.MotLatinLemme LIKE '".$disc2."' ORDER BY`E`.`N de lextrait`";
	}
	if ($filtre =="filtre_discours_theme"){
		$sql = "SELECT `E`.`N de lextrait` AS ID, E.Extrait AS extr,`E`.`parag` AS para,`E`.`Discours` AS discs, LA.`Discours (abreviation)` AS ABDISC, TM.Themes AS THEM, M.MotLatinLemme AS MOTLAT FROM `extraits` AS E, `mots_subdivisions` AS MS,`mots` AS M, `livres anciens` AS LA, `themes source` AS TM WHERE LA.NumeroAuto = E.Discours AND MS.`N`=E.`Mots portant limage` AND TM.N= MS.`Themes (source)` AND MS.`MotLatinLemme`=M.NumeroAuto AND E.Discours ='".$disc."' AND TM.N=".$disc2." ORDER BY`E`.`N de lextrait`";
	}
	if ($filtre =="filtre_theme_metaphore"){
		$sql = "SELECT `E`.`N de lextrait` AS ID, E.Extrait AS extr,`E`.`parag` AS para,`E`.`Discours` AS discs, LA.`Discours (abreviation)` AS ABDISC, TM.Themes AS THEM, M.MotLatinLemme AS MOTLAT FROM `extraits` AS E, `mots_subdivisions` AS MS,`mots` AS M, `livres anciens` AS LA, `themes source` AS TM WHERE LA.NumeroAuto = E.Discours AND MS.`N`=E.`Mots portant limage` AND TM.N= MS.`Themes (source)` AND MS.`MotLatinLemme`=M.NumeroAuto AND TM.N='".$disc."' AND M.MotLatinLemme LIKE '".$disc2."' ORDER BY`E`.`N de lextrait`";
	}
	$result = $conn->query($sql);
	
		echo'<SCRIPT LANGUAGE="JavaScript">
	var liste1 = [];
	var liste3 = [];
	var nomdiscours = [];
	var id_extrait =[];
	var paragr =[];
	var numdiscours=[];
	var liste2 = [];';
	if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				echo'liste1.push("'.$row['MOTLAT'].'");
					liste2.push("'.$row['extr'].'");
					liste3.push("'.$row['THEM'].'");
					nomdiscours.push("'.$row['ABDISC'].'");
					numdiscours.push("'.$row['discs'].'");
					id_extrait.push("'.$row['ID'].'");
					paragr.push("'.$row['para'].'");';
			}
	}
	else{
			echo'liste2.push("none");';
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
	space = " &nbsp ";
	if ((liste2.length==1) && (liste2[0]=="none")){
		document.write("Aucun Resultat trouvé");
	}else{
	for(var i = 0, c = liste2.length; i < c; i++){	
		liste2[i] = parse_maj(liste2[i]);
		liste2[i] = parse_espace(liste2[i]);
		liste2[i] = parse_italic(liste2[i]);
		liste2[i] = parse_gras(liste2[i]);
		var nume=i+1;
		document.write("<div id=divmeta>"+nume+".<b>"+space+liste1[i]+"</b></div>");
		document.write("<div id=divtheme><b>"+space+liste3[i]+space+"</b></div>");
		document.write("<div id=divextrait>"+space+"<a href=Discours.php?discours="+numdiscours[i]+" target=_blank>"+nomdiscours[i]+"</a> "+paragr[i]+space+liste2[i]+"</div>");
		document.write("<div class=divider2></div>");
	}
	}	
</SCRIPT>
';
}

//la fonction avec javascript qui vas parser les extrait et afficher en effacant juste pour 3 filtres
function get_3filtre_extrait($conn, $disc, $disc2, $disc3){

	$sql = "SELECT `E`.`N de lextrait` AS ID, E.Extrait AS extr,`E`.`parag` AS para,`E`.`Discours` AS discs, LA.`Discours (abreviation)` AS ABDISC, TM.Themes AS THEM, M.MotLatinLemme AS MOTLAT FROM `extraits` AS E, `mots_subdivisions` AS MS,`mots` AS M, `livres anciens` AS LA, `themes source` AS TM WHERE LA.NumeroAuto = E.Discours AND MS.`N`=E.`Mots portant limage` AND TM.N= MS.`Themes (source)` AND MS.`MotLatinLemme`=M.NumeroAuto AND E.Discours ='".$disc."' AND TM.N='".$disc2."' AND M.MotLatinLemme LIKE '".$disc3."' ORDER BY`E`.`N de lextrait`";

	$result = $conn->query($sql);
	
	
	$result = $conn->query($sql);
	
		echo'<SCRIPT LANGUAGE="JavaScript">
	var liste1 = [];
	var liste3 = [];
	var nomdiscours = [];
	var id_extrait =[];
	var paragr =[];
	var numdiscours=[];
	var liste2 = [];';
	if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				echo'liste1.push("'.$row['MOTLAT'].'");
					liste2.push("'.$row['extr'].'");
					liste3.push("'.$row['THEM'].'");
					nomdiscours.push("'.$row['ABDISC'].'");
					numdiscours.push("'.$row['discs'].'");
					id_extrait.push("'.$row['ID'].'");
					paragr.push("'.$row['para'].'");';
			}
	}
	else{
			echo'liste2.push("none");';
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
	space = " &nbsp ";
	if ((liste2.length==1) && (liste2[0]=="none")){
		document.write("Aucun Resultat trouvé");
	}else{
	for(var i = 0, c = liste2.length; i < c; i++){	
		liste2[i] = parse_maj(liste2[i]);
		liste2[i] = parse_espace(liste2[i]);
		liste2[i] = parse_italic(liste2[i]);
		liste2[i] = parse_gras(liste2[i]);
		var nume=i+1;
		document.write("<div id=divmeta>"+nume+".<b>"+space+liste1[i]+"</b></div>");
		document.write("<div id=divtheme><b>"+space+liste3[i]+space+"</b></div>");
		document.write("<div id=divextrait>"+space+"<a href=Discours.php?discours="+numdiscours[i]+" target=_blank>"+nomdiscours[i]+"</a> "+paragr[i]+space+liste2[i]+"</div>");
		document.write("<div class=divider2></div>");
	}
	}	
</SCRIPT>
';
}
?>