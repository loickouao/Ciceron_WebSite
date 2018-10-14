<?php
include('functions/connect.php');
include('functions/metaphores.func.php');
 ?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Métaphores de Cicéron</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href='http://fonts.googleapis.com/css?family=Oxygen:400,300,700' rel='stylesheet' type='text/css'>
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<script src="js/init.js"></script>
		<?php  get_metaphores($conn) ?>
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
		</noscript>
		<link rel="stylesheet" href="css/style_metaphores.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie/v9.css" /><![endif]-->
		<style>
			.submit_search_discours{ /* Le bouton */
                border:none;
				cursor: pointer;
                background-image:url('images/search_icon2.png');
                background-repeat:no-repeat;
                background-position:center;
                width: 66px;
                height: 40px;
				padding-bottom:11px;
				}
			#banniere_image{
				margin-top: 1px;
				height: 1px;
				border-radius: 5px;
				position: relative;
				box-shadow: 5px 4px 4px #1c1a19;}
        </style>
				<script type="text/javascript">
                <!--
                        function open_infos(idE)
                        {		
                                width = 800;
                                height = 400;
                                if(window.innerWidth)
                                {		
                                        var left = (window.innerWidth-width)/2;
                                        var top = (window.innerHeight-height)/2;
                                }
                                else
                                {
                                        var left = (document.body.clientWidth-width)/2;
                                        var top = (document.body.clientHeight-height)/2;
                                }
                                window.open("Extraits.php?idE="+idE,'Extraits des discours','menubar=no, scrollbars=no, top='+top+', left='+left+', width='+width+', height='+height+'');
                        }
                -->
                </script>
	</head>
	<body>

	<!-- Header -->
		<div id="header">
			<div class="container">
					
				<!-- Logo -->
					<div id="logo">
						<br>
						<h2><a href="#">Métaphores de Cicéron</a></h2>
					</div>
				
				<!-- Nav -->
					<nav id="nav">
						<ul>
							<li><a href="index.php">Accueil</a></li>
							<li><a href="Discours.php">Discours</a></li>
							<li class="active"><a href="metaphores.php">Métaphores</a></li>
							<li><a href="contact.php">Contact</a></li>
						</ul>
					</nav>

			</div>
		</div>
	<!-- Header -->
	<div id="banniere_image"> </div>
	<!-- Main -->
	<div id="main">
		<div class="container">
				<div class="row">
					<div id="divfiltre">
						<form name="form_filtre_metaphore" id="form_filtre_metaphore">
							<div id=div1>
								<label for="discours" class="labelcss"><b>Titre Discours</b></label>
								<div class="list_filtre">
								<select name="discours" class="filtre" id="list_discours">
								<?php if (isset($_GET['indexdiscours'])){
										get_chrono_discours2($conn, $_GET['indexdiscours']);
										}else{
											get_chrono_discours($conn);
										}
								?>
								</select>
								<input type="hidden" name="indexdiscours">
								</div>
							</div>
							<div id=div2>
								<label for="theme" class="labelcss"><b>Thèmes </b>(Français)</label>
								<div class="list_filtre">
								<select name="theme" class="filtre" id="list_theme">
								<?php if (isset($_GET['indextheme'])){
										get_theme2($conn, $_GET['indextheme']);
										}else{
											get_theme($conn);
										}
								?>
								</select>
								<input type="hidden" name="indextheme">
								</div>
							</div>
							<div id=div3>
								<label for="search" class="labelcss"><b>Métaphores</b> (Latin)</label><br>
								<?php if (isset($_GET['search'])){
										echo'<input type="text" class="search" name="search" value="'.$_GET['search'].'" onfocus=if(this.value=="Rechercher...")this.value="" onblur=if(this.value=="")this.value="Rechercher..." autocomplete="off"/>';
										}else{
											echo'<input type="text" class="search" name="search" value=Rechercher... onfocus=if(this.value=="Rechercher...")this.value="" onblur=if(this.value=="")this.value="Rechercher..." autocomplete="off"/>';
										}?>
								<ul class="suggestions" style=display:none>
								</ul>
							</div>
							<div id=div4>
								<br/>
								<input type="button" class="submit_search_discours" value="" onclick="indicediscours_filtre()" />
							</div>
						</form>
					</div>
					<script>
					// fonction pour obtenir l'indice selectionner dans la liste des discours filtre pour la page metpahore
					function indicediscours_filtre()
					{
					var x = document.getElementById("list_discours").selectedIndex;
					var y = document.getElementById("list_discours").options;
						document.form_filtre_metaphore.indexdiscours.value = y[x].index;

					var x = document.getElementById("list_theme").selectedIndex;
					var y = document.getElementById("list_theme").options;
						document.form_filtre_metaphore.indextheme.value = y[x].index;

						document.form_filtre_metaphore.method = "GET";
						document.form_filtre_metaphore.action = "metaphores.php";
						document.form_filtre_metaphore.submit();
					}

					// fonction pour obtenir l'indice selectionner dans la liste des discours filtre pour la page metpahore
					function open_infosmot(mot_search)
						{		
                                width = 800;
                                height = 600;
                                if(window.innerWidth)
                                {		
                                        var left = (window.innerWidth-width)/2;
                                        var top = (window.innerHeight-height)/2;
                                }
                                else
                                {
                                        var left = (document.body.clientWidth-width)/2;
                                        var top = (document.body.clientHeight-height)/2;
                                }
                                window.open("metaphore.php?mot="+mot_search,'metaphores Extraites des discours','menubar=no, scrollbars=no, top='+top+', left='+left+', width='+width+', height='+height+'');
}
					</script>

				</div>
				<div class="row">
						<div id=titre1>
							<h2>Métaphores</h2>
						</div> 
						<div id=titre3>
							<h2>Extraits des discours</h2>	
						</div>
						<div id=titre2>
							<h2>Thèmes</h2>
							<span>Provenance des métaphores</span>
						</div>
					<!-- Content -->
						<div id="content2" class="6u skel-cell-important">
							<section>
								<div id="text_extrait">
								<?php 
								if ( (isset($_GET['search'])) AND (isset($_GET['discours'])) AND (isset($_GET['theme'])) ){
									
									if ( ($_GET['search']=="Rechercher...") AND ($_GET['discours']=="none") AND ($_GET["theme"]=="none") ){
									echo'Résultats trop volumineux, effectuer au moins un filtre';
									}else{
										if ( ($_GET['discours']!="none") AND ($_GET['search']== "Rechercher...") AND ($_GET["theme"]=="none") ){
											get_filtre_extrait_only1($conn, $_GET['discours'], "filtrediscours");
										}
										if ( ($_GET['discours']=="none") AND ($_GET['search']== "Rechercher...") AND ($_GET["theme"]!="none") ){
											get_filtre_extrait_only1($conn, $_GET['theme'], "filtretheme");
										}
										if ( ($_GET['discours']=="none") AND ($_GET['search']!= "Rechercher...") AND ($_GET["theme"]=="none") ){
											get_filtre_extrait_only1($conn, $_GET['search'], "filtremetaphore");
										}
										
										if ( ($_GET['discours']!="none") AND ($_GET['search']== "Rechercher...") AND ($_GET["theme"]!="none") ){
											get_2filtre_extrait($conn, $_GET['discours'], $_GET['theme'], "filtre_discours_theme");
										}
										if ( ($_GET['discours']!="none") AND ($_GET['search']!= "Rechercher...") AND ($_GET["theme"]=="none") ){
											get_2filtre_extrait($conn, $_GET['discours'], $_GET['search'], "filtre_discours_metaphore");
										}	
										if ( ($_GET['discours']=="none") AND ($_GET['search']!= "Rechercher...") AND ($_GET["theme"]!="none") ){
											get_2filtre_extrait($conn, $_GET['theme'], $_GET['search'], "filtre_theme_metaphore");
										}
										
										if ( ($_GET['discours']!="none") AND ($_GET['search']!= "Rechercher...") AND ($_GET["theme"]!="none") ){
											get_3filtre_extrait($conn, $_GET['discours'], $_GET['theme'], $_GET['search']);
										}
									}
								}
								?>
								</div>
							</section>
						</div>
					<!-- /Content -->									
				</div>
		</div>
	</div>
	<!-- Main -->

<!-- Footer -->
		<div id="footer">
			<div class="container">
				<div class="row">
					<div class="6u">
						<section>
							<header>
								<h2>Métaphore de Cicéron</h2>
							</header>
							<p>Cicéron (en latin Marcus Tullius Cicero), né le 3 janvier 106 av. J.-C. à Arpinum en Italie et assassiné le 7 décembre 43 av. J.-C. (calendrier julien) à Gaète, est un homme d'État romain et un auteur latin.</p>
							<ul class="default">
								<li><a href="#">Collection des Universités de France, Série latine.</a></li>
								<li><a href="#">Collection des Universités de France, Série grecque.</a></li>
								<li><a href="#">Smith College Classical Studies.</a></li>
							</ul>
						</section>
					</div
					<div class="3u">
						<section>
							<ul class="style1">
								<li>
									<p></p>
									<p class="posted"></p>
								</li>
								<li>
									<p></p>
									<p class="posted"></p>
								</li>
							</ul>
						</section>
					</div>
					<div class="3u">
						<section>
							
						</section>				
					</div>
				</div>
			</div>
		</div>
	<!-- Footer -->

	<!-- Copyright -->
		<div id="copyright">
			<div class="container">
				© Copyright 2018 Cicéron - Métaphores des discours - UNIGE.
				</div>
		</div>

	</body>
</html>
<?php
mysqli_close($conn);
?>