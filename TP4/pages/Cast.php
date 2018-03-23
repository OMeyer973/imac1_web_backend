
<!DOCTYPE html>
<html>
<head>
	<meta content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="../style.css" />
</head>

<body>
	<h1 class="title">Infos sur un réalisateur </h1>
		<?php

			require_once '../PDO/MyPDO.imac-movies.include.php';
			require_once '../classes/Cast.class.php';
			require_once '../functions/Cast.functions.php';
			require_once '../classes/Movie.class.php';
			require_once '../functions/Movie.functions.php';

			$out = "";

			if (isset( $_GET["id"]) && !empty( $_GET["id"])){
				$id = $_GET["id"];

				$person = Cast::createFromId($id);
				$out .= renderPerson ($person);

				$out .= "<h2> A réalisé </h2>";
				$moviesDirected = Movie::getFromDirectorId($person->getId());
				$out .= renderMovieList($moviesDirected);
				
				$out .= "<h2> A joué dans </h2>";
				$moviesPlayed = Movie::getFromActorId($person->getId());
				$out .= renderMovieList($moviesPlayed);
				
			} else $out .= "id de personne invalide";

			echo $out;

		?>
</body>
