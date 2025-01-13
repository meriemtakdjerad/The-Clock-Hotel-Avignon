<!DOCTYPE html>
<html lang="fr">
<head>
		<title>Site de réservation d'hôtel</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
</head>
<body>
	<div class="w3-sidebar w3-bar-block w3-card w3-animate-left w3-light-blue" style="display:none" id="mySidebar">
	<button class="w3-bar-item w3-button w3-large w3-light-blue" onclick="w3_close()">
    <i class="fa fa-times"></i> Fermer
</button>

		<a href="index.php?page=init.html" class="w3-bar-item w3-button">Présentation de notre hotel</a>
		<a href="index.php?page=modifresa.php" class="w3-bar-item w3-button">Créer ou modifier une réservation à l'hôtel </a>
		<a href="index.php?page=reservations.php" class="w3-bar-item w3-button">Les réservations existantes</a>
	</div>

	<div id="main">
    <div id="header" class="w3-light-blue" style="text-align: center;">
        <button id="openNav" class="w3-button w3-xlarge w3-light-blue" onclick="w3_open()">
            <i class="fa fa-bars"></i> Menu
        </button>
        <h1 style="margin: 0 auto;">"The Clock Hotel Avignon"</h1>
    </div>
</div>

		</div>

		<div class="w3-container">
			<?php
				if (isset($_GET['page'])) {
					include($_GET['page']);
				} else {
					include("init.html");
				}
			?>
		</div>
	</div>

	<footer id="footer" class="w3-container w3-padding-8 w3-center  w3-light-blue  w3-text-pink">  
	  <p>hoteldhorloge@gmail.fr ou Nous contacter au 04 90 16 42     &copy;2024</p>
	  <div class="w3-large w3-padding-8">
	    <i class="fa fa-facebook-official w3-hover-opacity"></i>
	    <i class="fa fa-instagram w3-hover-opacity"></i>
	    <i class="fa fa-snapchat w3-hover-opacity"></i>
	 
	   
	 </div>
 	 <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
	</footer>

	<script>
		function w3_open() {
			document.getElementById("main").style.marginLeft = "20%";
			document.getElementById("mySidebar").style.width = "20%";
			document.getElementById("mySidebar").style.display = "block";
			document.getElementById("openNav").style.display = 'none';
		}
		function w3_close() {
			document.getElementById("main").style.marginLeft = "0%";
			document.getElementById("mySidebar").style.display = "none";
			document.getElementById("openNav").style.display = "inline-block";
		}
	</script>

</body>
</html>
