<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>J'adore ce que vous faites</title>
</head>

<body>
	<?php

	echo "<h2> exo chaines de caractères </h2>";
	$prenom = "bob";
	$nom = "john";
	$ville = "NYC";
	$age = 1;
	
	echo "<div> Bjr, je m'appelle " . $prenom . " " . $nom . " j'ai " . $age . " an";
	if ($age > 1) {
		echo "s";
	}
	echo ", j'habite à " . $ville . "</div>";
	

	echo "<h3> la même avec un tableau !</h3>";
	

	$personne = array(
		"prenom" => $prenom,
		"nom" => $nom,
		"ville" => $ville,
		"age" => $age
	);

	//var_dump($personne);
	echo "<div> Bjr, je m'appelle " . $personne["prenom"]." ".$personne["nom"] . " j'ai " . $personne["age"] . " an";
	if ($personne["age"] > 1) {
		echo "s";
	}
	echo ", j'habite à " . $personne["ville"] . "</div>";
	

	echo "<h2> exo boucles </h2>";
	
	echo "<h3> semaine </h3>";
	$semaine=["Lundi","Mardi","Mercredi","Jeudimac","Vendredi","Samedi","Dimanche"];
	echo "<p>";
	foreach ($semaine as $jour) {
		echo "$jour ";
	}
	echo"</p>";

	echo "<h3> personnes (vide) </h3>";

	$personnes = false;
	affichePersonnes($personnes);


	echo "<h3> personnes (non vide) </h3>";
	$personne1 = array(
		"prenom" => "gaetan",
		"nom" => "R",
		"ville" => "PANAME",
		"age" => 1000
	);

	$personne2 = array(
		"prenom" => "Venceslas",
		"nom" => "B",
		"ville" => "CHSSWG",
		"age" => 2
	);

	$personnes[0] = $personne1;
	$personnes[1] = $personne2;


	affichePersonnes($personnes);

	
	function affichePersonnes ($personnes) {
	echo "<p>";
	if ($personnes) {
		foreach ($personnes as $personnex) {
			foreach ($personnex as $champ) {
				echo "$champ ";
			}
		}
	} else {
		echo "il n'y a personne :(";
	}
	echo"</p>";
	}

	?>
</body>
</html>
