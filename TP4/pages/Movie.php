
<!DOCTYPE html>
<html>
<head>
	<meta content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="../style.css" />
</head>

<body>
	<h1 class="title">Infos sur un film </h1>
		<?php

			require_once '../PDO/MyPDO.imac-movies.include.php';
			require_once '../classes/Movie.class.php';
			require_once '../functions/Movie.functions.php';
			require_once '../classes/Cast.class.php';
			require_once '../functions/Cast.functions.php';

			$out = "";

			if (isset( $_GET["id"]) && !empty( $_GET["id"])){
				$id = $_GET["id"];

				$movie = Movie::createFromId($id);
				$out .= renderMovie($movie);

				$out .= "<h2> Réalisateur(s) </h2>";
				$directors = Cast::getDirectorsFromMovieId($movie->getId());
				$out .= renderPeopleList($directors);
				
				$out .= "<h2> Acteur(s) </h2>";
				$actors = Cast::getActorsFromMovieId($movie->getId());
				$out .= renderPeopleList($actors);
				
				} else $out .= "id du film invalide";

			echo $out;

		?>
</body>
