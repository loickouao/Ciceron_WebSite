<?php
include('functions/connect.php');
include('functions/Discours.func.php');
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
		<?php get_discours($conn) ?>
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
		</noscript>
		<link rel="stylesheet" href="css/style_discours.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie/v9.css" /><![endif]-->
		<style>
            .submit1{ /* Le bouton */
                border:none;
				cursor: pointer;
                background-image:url('images/loupe.jpg');
                background-repeat:no-repeat;
                background-position:top left;
                width: 40px;
				padding:10px;
                height: 40px;}
				
			.submit_search_discours{ /* Le bouton */
                border:none;
				cursor: pointer;
                background-image:url('images/search_icon2.png');
                background-repeat:no-repeat;
                background-position:top left;
                width: 61px;
                height: 30px;
				padding-bottom:11px;
				margin-left:-68px;}
            #search {
				border: 3px solid white;
				border-radius: 3px;
				background:#FFF;
				width:300px;
				height:52px;
				box-shadow:2px 2px 2px rgba(0,0,0,.3);
			}     
            #search input[type=text]{ 
                border:none;
				font-size: large;
				padding-left:10px;
                width:250px;
				height:42px;}
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
							<li class="active"><a href="Discours.php">Discours</a></li>
							<li><a href="metaphores.php">Métaphores</a></li>
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
					<!-- Sidebar -->
						<div id="sidebar" class="4u">
							<section>
								<header>
									<div id="search">
										<form method="GET">
											<input type= "text" name="data" placeholder="search..." required id="formsearchvalue"/>
											<input type="button" class="submit1" alt="Submit button" value="" onclick="searchmotcle()" />
										</form>
										<script>
					// fonction pour obtenir l'indice selectionner dans la liste des discours filtre pour la page metpahore
					function searchmotcle()
					{ 
					var x = document.getElementById("formsearchvalue");
					var mot_search = x.value;
					open_infosmot(mot_search);
					}
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
									</div><br>
									<h2> Extraits du Discours</h2>
									<span class="byline"> <?php if (isset($_GET['discours']))
										abreviation_discours($conn, $_GET['discours']);
										?></span>
								</header>

								<form>
										<select name="perform" id="liste_extrait_discours" size="39" >
											<!--<option value="" selected> Métaphores extraites </option> -->
											<?php if (isset($_GET['discours'])){
													if( (isset($_GET['indexselect'])) && ($_GET['indexselect']==0)){
														echo"";
													}else{
														extrait_motlatin_discours($conn, $_GET['discours']);
														extrait_parse_discours($conn, $_GET['discours']);
													}
												}?>
										</select>
								<label for="diacritics" style="display:none" class="noTransform"><input type="checkbox" value="true" name="diacritics" id="diacritics" checked> diacritics</label>
								<label for="separateWordSearch" style="display:none" class="noTransform"><input type="checkbox" value="true" name="separateWordSearch" id="separateWordSearch"> separate word search</label>
							  </form>
							</section>
						</div>
					<!-- Sidebar -->
				
					<!-- Content -->
						<div id="content" class="8u skel-cell-important">
							<section>
								<header>
									<h2>DISCOURS</h2>
									<div>	
										<form method="GET" id="auto-suggest"><br>
											<label for="discours" class="labelcss"><b>Titre Discours</b></label><br>
											<?php if (isset($_GET['search'])){
												if ($_GET['discours']!=""){
												$sql = "SELECT * FROM `livres anciens` WHERE `NumeroAuto`='".$_GET['discours']."'"; 
												$result = $conn->query($sql);
												if ($result->num_rows > 0) {
													while($row = $result->fetch_assoc()) {
														echo'<input type="text" class="search" name="search" value="'.$row['Discours (titre)'].'" onfocus=if(this.value=="Rechercher...")this.value="" onblur=if(this.value=="")this.value="Rechercher..." autocomplete="off"/>';
													}
												  }
												}else
													echo'<input type="text" class="search" name="search" value="'.$_GET['search'].'" onfocus=if(this.value=="Rechercher...")this.value="" onblur=if(this.value=="")this.value="Rechercher..." autocomplete="off"/>';
											}else{
												echo'<input type="text" class="search" name="search" value=Rechercher... onfocus=if(this.value=="Rechercher...")this.value="" onblur=if(this.value=="")this.value="Rechercher..." autocomplete="off"/>';
												}
											?>
											<ul class="suggestions">
												</ul>
											<input type="submit" class="submit_search_discours" alt="Submit button" value="" />
											<input type="hidden" name="discours" value="">
										</form>
									
										<form name="Form_chrono_discours" id="list-suggest">
											<div id="listdisco">
											<select name="discours" class="list_discours" id="list_discours" onchange="getindicediscours(this.form.os)" >																			
											  <?php if (isset($_GET['indexselect'])){
														get_chrono_discours2($conn, $_GET['indexselect'], $_GET['os']);
													}else{
														get_chrono_discours($conn);
													}
													?>
											</select>
											<input type="hidden" name="indexselect">
											</div>
											<div id="radio">
											<?php if (!isset($_GET['os'])){
												echo'<input type="radio" name="os" value="chrono" checked onclick="testerRadio(this.form.os)">Chronologique';
												echo'<input type="radio" name="os" value="alpha" onclick="testerRadio(this.form.os)">Alphabetique';
											}else{
											if ($_GET['os']=="alpha"){
												echo'<input type="radio" name="os" value="chrono" onclick="testerRadio(this.form.os)">Chronologique';
												echo'<input type="radio" name="os" value="alpha" checked onclick="testerRadio(this.form.os)">Alphabetique';		
												}else{
													echo'<input type="radio" name="os" value="chrono" checked onclick="testerRadio(this.form.os)">Chronologique';
													echo'<input type="radio" name="os" value="alpha" onclick="testerRadio(this.form.os)">Alphabetique';
											
												}						
											}
											?>
											</div>
										</form>
											<script type="text/javascript" src="js/focus_list_dicours.js"></script>
									</div>
								</header>
								<br><br>
								<div id="text_ref">
										<?php if (isset($_GET['discours'])){
												if( (isset($_GET['indexselect'])) && ($_GET['indexselect']==0)){
													echo"";
												 }else{
												get_titreTexte($conn, $_GET['discours'] );
												 }
										}  ?>
									<div class="panel-body context">
										<br/>
										<?php if (isset($_GET['discours'])){
												if( (isset($_GET['indexselect'])) && ($_GET['indexselect']==0)){
													echo"";
												 }else{
												get_filtre_Texte2($conn, $_GET['discours'] );
												 }
										}  ?>								
									</div>
									<script src='http://code.jquery.com/jquery-2.2.3.js'></script>
									<script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'></script>
									<script src='http://cdn.rawgit.com/julmot/mark.js/master/dist/jquery.mark.min.js'></script>

									<script  src="js/index.js"></script>
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