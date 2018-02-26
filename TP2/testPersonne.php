
<!DOCTYPE html>
<html>
<head>
	<meta content="text/html; charset=utf-8" />
</head>

<body>

	<?php 
		require_once("personne.class.php");
		$out = "<p>";

		$personne1 = new Personne("oliv", "mey", "21", "kcity");
		$personne1->afficher();


		$personnes[0] = new Personne("oliv0", "mey", "21", "kcity");
		$personnes[2] = new Personne("oliv1", "mey", "21", "kcity");
		$personnes[3] = new Personne("oliv2", "mey", "21", "kcity");

		foreach($personnes as $personne) {
			$personne->afficher();
		}

		$out .= "</p>";
		echo $out;	
	?>

</body>