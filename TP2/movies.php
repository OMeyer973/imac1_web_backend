
<!DOCTYPE html>
<html>
<head>
	<meta content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="style.css" />
</head>

<body>
	<h1 class="title">résultat de la recherche</h1>
	<?php
		require_once("data.movies.php");
		require_once("movies.functions.php");
		
		$fields = ["title","genre","dateFrom", "dateTo","director"];
		$selectedMovies = [];
		$inputs = [];
		$out = "";

		//réception des champs
		$inputs = getSearchFields($fields);

		//affichage des champs
		$out .= "<div class=\"search-header\"><h2> paramètres de la recherche :</h2>";
		$out .= printSearchParameters($inputs);
		$out .= "<h2> résultats de la recherche :</h2></div>";
		
		//on ajoute le film à la liste des films à afficher
		foreach ($movies as $movie) {
			if (movieMatches($movie, $inputs)) {
				array_push($selectedMovies, $movie);
			}
		}

		//on affiche la liste des films sélectionner
		$out .= render_movie_list($selectedMovies);

		echo $out;
	?>

</body>