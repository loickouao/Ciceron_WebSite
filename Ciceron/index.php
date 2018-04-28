<!DOCTYPE HTML>
<html>
	<head>
		<title>Métaphore de Cicéron</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
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
            #search {
				border: 3px solid white;
				border-radius: 3px;
				background:#FFF;
				margin: auto;
				width:350px;
				height:52px;
				box-shadow:2px 2px 2px rgba(0,0,0,.3);
			}     
            #search input[type=text]{ 
                border:none;
				font-size: large;
				padding-left:10px;
                width:300px;
				height:42px;}
			#banniere_image{
				margin-top: 1px;
				height: 1px;
				border-radius: 5px;
				position: relative;
				box-shadow: 5px 4px 4px #1c1a19;}
        </style>
		<link href='http://fonts.googleapis.com/css?family=Oxygen:400,300,700' rel='stylesheet' type='text/css'>
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
		</noscript>
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie/v9.css" /><![endif]-->
	</head>
	<body class="homepage">

	<!-- Header -->
		<div id="header">
			<div class="container">
					
				<!-- Logo -->
					<div id="logo">
						<h1><a href="#">Métaphore de Cicéron</a></h1>
						<span>Marcus Tullius Cicero</span>
					</div>
				
				<!-- Nav -->
					<nav id="nav">
						<ul>
							<li class="active"><a href="index.php">Accueil</a></li>
							<li><a href="Discours.php">Discours</a></li>
							<li><a href="metaphores.php">Métaphores</a></li>
							<li><a href="contact.php">Contact</a></li>
						</ul>
					</nav>

			</div>
			<div id="search">
					<form action="search_result.php" method="get">
						<input type= "text" name="data" placeholder="search..." required autofocus />
						<input type="submit" class="submit1" alt="Submit button"  value="" />
					</form>
			</div>
		</div>
		<div id="banniere_image"> </div>

	<!-- Header -->
			
	<!-- Main -->
		<div id="main">
			<div class="container">
				<header>
					<h2>Bienvenue</h2><br>
				</header>
				<div class="row">
					<div class="3u">
						<section>
							<div id = "bloc_extrait">
							</div>
						</section>
					</div>	
				</div>
				<div class="divider">&nbsp;</div>
				<div class="row">
				
					<!-- Content -->
						<div class="8u skel-cell-important">
							<section id="content">
								<header>
									<h2>Brève Bibliographie</h2>
									<span class="byline"></span>
								</header>
								<p><strong>Cicéron</strong> est considéré comme le plus grand auteur latin classique, tant par son style que par la hauteur morale de ses vues.
								La partie de son œuvre qui nous est parvenue est par son volume une des plus importantes de la littérature
								latine : discours juridiques et politiques, traités de rhétorique, traités philosophiques, correspondance.
								Malgré le biais qu’impose le point de vue de l’auteur, elle représente une contribution prépondérante pour la connaissance de
								l’histoire de la dernière période de la République romaine54.
								Les textes qui nous sont parvenus sont des versions révisées et parfois réécrites par Cicéron, avec l'aide de son esclave et
								sténographe Tiron, tandis qu'Atticus se charge de les faire copier et mettre en vente55. Cicéron affranchit Tiron en 53 av. J.-C., et
								Tiron devenu Marcus Tullius Tiro resta son collaborateur56. Après la mort de Cicéron, il édite sa correspondance et de nombreux discours,
								éditions dignes de confiance si l'on en croit Aulu-GelleA 37, qui les lut deux siècles plus tard57. </p>
								<br><p>Source : Wikipédia</p>
								<a href="https://fr.wikipedia.org/wiki/Cic%C3%A9ron" class="button">Read More</a>
							</section>
						</div>
					<!-- /Content -->
						
					<!-- Sidebar -->
						<div id="sidebar" class="4u">
							<section>
								<header>
									<h2></h2>
									<span class="byline"></span>
								</header>
								
							</section>
						</div>
					<!-- Sidebar -->
						
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