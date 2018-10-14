function getindicediscours(radio)
{
var x = document.getElementById("list_discours").selectedIndex;
var y = document.getElementById("list_discours").options;
if (radio[0].checked){
	document.Form_chrono_discours.indexselect.value = y[x].index;
	}
if (radio[1].checked){
	document.Form_chrono_discours.indexselect.value = y[x].index+1;
	}
	document.Form_chrono_discours.method = "GET";
	document.Form_chrono_discours.action = "Discours.php";
	document.Form_chrono_discours.submit();
}

function testerRadio(radio) {
	if (radio[1].checked) {
		$(document).ready(function() {
		// Script Tri Select
		var liste=document.getElementById('list_discours');
		var options=liste.options;
		var nboptions=options.length;
		var options2=new Array();
		for(var ix=0; ix<nboptions; ix++) options2[ix] = options[ix];
		options2.sort(triage);
		for(var ix=0; ix<nboptions; ix++) options[ix] = options2[ix];
		function triage(option1, option2){
			if(option1.text<option2.text) return -1;
			if(option1.text>option2.text) return 1;
			return 0;
		}
	});
  }
  if (radio[0].checked) {
	document.Form_chrono_discours.indexselect.value = 0;
	document.Form_chrono_discours.method = "GET";
	document.Form_chrono_discours.action = "Discours.php";
	document.Form_chrono_discours.submit();	
  }

}
