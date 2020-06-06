<?php

	// section key => section label associative array
	$sections = array(
		"accueil" => "Accueil",
		"education" => "&Eacute;ducation",
		"ecole_du_chiot" => "&Eacute;cole du chiot",
		"agility" => "Agility",
		"flyball" => "Fly Ball",
		"amateur_de_truffe" => "Amateur de truffe",
		"acces" => "Acc&egrave;s",
		"contact" => "Contact",
		// "boutique" => "Boutique",
		// "livre_d_or" => "Livre d&rsquo;or",
		"videos" => "Vid&eacute;os"
	);

	// gets the name of the current page (default to "accueil")
	if(isset($_GET['page']) && in_array($_GET['page'], array_keys($sections))){
		$page = $_GET['page'];
	} else {
		$page = "accueil";
	}

?>
<!DOCTYPE html>
<html lang="fr">
	<head>

		<!-- title of the page -->
		<title>Centre canin de la Dent de Crolles - <?php echo $sections[$page] ?></title>

		<!-- meta tags -->
		<meta name="description" content="Centre canin de la Dent de Crolles - Educateur canin sur St Nazaire les Eymes, Grenoble et son agglomeration" />
		<meta name="keywords" content="education canine,educateur canin,chiens,dresseur chien,grenoble,dent de crolles,crolles,saint pancrasse,st pancrasse" />
		<meta name="author" content="Anthony Hombiat" />
		<meta charset="utf-8">

		<!-- CSS stylesheet -->
		<link rel="stylesheet" type="text/css" href="static/css/main.css" media="screen" />

		<!-- jQuery & jQuery UI javascript libraries -->
		<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
		<link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css" media="screen" />
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>

		<?php

		if($page == 'acces'){ // displau OSM map
			print('<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />');
			print('<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>');
		}

		?>

		<script src="static/js/main.js" type="text/javascript"></script>

	</head>
	<body onload="<?php if($page == 'acces') echo "initOSMMap()"; if(isset($_GET['mail'])) echo "showMailSuccessMessage();"; ?>">

		<div id="wrapper">
			<header>
				<img src="static/img/banniere.jpg" alt="Centre canin de la dent de Crolles" />
				<a href="http://www.youtube.com/user/CentreCanindeCrolles" target="_blank" title="Visitez la chaîne YouTube">
					<img id="iconyt" src="static/img/icon_youtube.png" alt="youtube" /></a>
				<a href="https://www.facebook.com/chris.mangano.982" target="_blank" title="Visitez la page FaceBook">
					<img id="iconfb" src="static/img/iconfb2.jpg" alt="facebook" /></a>
				<h1>Centre canin de la Dent de Crolles</h1>
				<h2>&Eacute;ducateur canin sur St Nazaire-les-Eymes, Grenoble et son agglom&eacute;ration</h2>
			</header>
			<nav>
				<ul>
					<?php
						foreach($sections as $key => $value){
							$class = ($key == $page) ? "on" : "" ;
							print("<li id='" . $key . "' class='" . $class . "'><a href='" . $key . ".html'>" . $value . "</a></li>");
						}
				   ?>
				</ul>
			</nav>
			<section id="section_<?php echo $page ?>">
				<aside>
					<p>
						<q><em>&Eacute;duquer son chien permet de lui donner plus de libert&eacute;,
						plus d'autonomie et d'harmoniser votre relation afin d'avoir
						un compagnon ob&eacute;issant en toutes circonstances.</em></q>
					</p>
					<p style="text-align:right">Christophe Mangano</p>
				</aside>
				<?php include "sections/" . $page . ".php" ?>
			</section>
			<footer>
				<address>Centre canin de la Dent de Crolles route de St Pancrasse, 38330 St Nazaire-les-Eymes</address>
				<div>
					<span id="tel"> T&eacute;l : <a class="tel_link" href="tel:+33616844559">06 16 84 45 59</a></span><br />
					<span id="mail">Mail : <a href="mailto:dentdecrolles@hotmail.fr">dentdecrolles@hotmail.fr</a></span>
				</div>

			</footer>
		</div>

		<div id="copyright">Copyright 2020 CentreCaninDeLaDentDeCrolles.fr</div>

	</body>
</html>
