
<!DOCTYPE html>
<html>
<head>
	<meta content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="../style.css" />
</head>

<body>
	<h1 class="title">Les films</h1>
	
		<?php
		
			require_once '../PDO/MyPDO.imac-movies.include.php';
			require_once '../classes/Movie.class.php';
			require_once '../functions/Movie.functions.php';
			require_once '../functions/Movies.functions.php';
			require_once '../classes/Cast.class.php';
			require_once '../functions/Cast.functions.php';
			
			$fields = ["title","genre","dateFrom", "dateTo","cast-member"];
			$selectedMovies = [];
			$inputs = [];
			$out = "";
			$movies = Movie::getAll();

			//réception des champs
			$inputs = getSearchFields($fields);

			//affichage des champs
			$out .= "<div class=\"search-header\"><h2> paramètres de la recherche :</h2>";
			$out .= printSearchParameters($inputs);
			$out .= renderBackToSearch();
			$out .= "<h2> résultats de la recherche :</h2></div>";
			
			//on ajoute le film à la liste des films à afficher
			foreach ($movies as $movie) {
				if (movieMatches($movie, $inputs)) {
					array_push($selectedMovies, $movie);
				}
			}

			//on affiche la liste des films sélectionner
			$out .= renderMovieList($selectedMovies);

			//$out .= renderMovieList($movies);

			echo $out;

		?>
		
</body>
