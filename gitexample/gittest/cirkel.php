<!doctype html>
<html>
	<head>
		<title> Cirkel </title>
		<h1> Het berekenen van de straal van een cirkel </h1>
	</head>
	
	
	<body>
		<?php
			$straal = 7;
			$omtrek = 2*pi()*$straal;
			$oppervlakte = pi()*$straal*$straal;

			echo "de omtrek van een cirkel met een straal van 7 cm is: $omtrek cm <br/>";
			echo "De oppervlakte van een cirkel met een straal van 7 cm is: $oppervlakte cm<sup>2</sup> <br/>";
		?>
	
	</body>
	
</html>