<?php

//	phpinfo();

	include "sections.php";
	
	// gets the name of the current page (default to "accueil")
	if(isset($_GET['page']) && in_array($_GET['page'],array_keys($sections))){
		$page = $_GET['page'];
	}else{
		$page = "accueil";
	}
	
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		
		<!-- title of the page -->
		<title>Centre canin de la Dent de Crolles - <?php echo $sections[$page]; ?></title>
		
		<!-- meta tags -->
		<meta name="description" content="Centre canin de la Dent de Crolles - Educateur canin sur St Nazaire les Eymes, Grenoble et son agglomeration" />
		<meta name="keywords" content="education canine,educateur canin,chiens,dresseur chien,grenoble,dent de crolles,crolles,saint pancrasse,st pancrasse" />
		<meta name="author" content="Anthony Hombiat" />
		<meta charset="utf-8">
		
		<!-- CSS stylesheets -->
		<link rel="stylesheet" type="text/css" href="css/general.css" media="screen" />
		
		<!-- jQuery (plugin & UI javascript layer) -->
		<link rel="stylesheet" type="text/css" href="jquery/jquery-ui-1.8.21.custom/css/custom-theme/jquery-ui-1.8.21.custom.css" media="screen" />
		<script src="jquery/jquery-ui-1.8.21.custom/js/jquery-1.7.2.min.js" type="text/javascript"></script>
		<script src="jquery/jquery-ui-1.8.21.custom/js/jquery-ui-1.8.21.custom.min.js" type="text/javascript"></script>
      
		<?php 
		
		// Google maps features(acces.php)
		if($page == 'acces'){
			print('<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>');
		}
		
		?>
		
		<!-- scripts -->
		<script src="scripts/general.js" type="text/javascript"></script>
		
	</head>
	<body onload="<?php if($page == 'acces') echo "initGMap()"; if(isset($_GET['mail'])) echo "showMailSuccessMessage();"; ?>">
		
		<div id="wrapper">
		
			<header><?php include "header.php"; ?></header>
			
			<nav><?php include "nav.php"; ?></nav>
			
			<!-- BEGIN: content -->
			<section id="section_<?php echo $page; ?>">
			
				<aside><?php include "aside.php"; ?></aside>
			
				<?php include $page . ".php"; ?>
				
			</section>
			<!-- END: content -->
			
			<footer><?php include "footer.php"; ?></footer>
			
		</div>
		
		<div id="copyright">Copyright 2012 CentreCaninDeLaDentDeCrolles.fr</div>
		
	</body>
</html>