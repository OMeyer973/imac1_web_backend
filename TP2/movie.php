
<!DOCTYPE html>
<html>
<head>
	<meta content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="style.css" />
</head>

<body>
	<h1 class="title">infos sur un film spécifique </h1>
	<ul class="movie-list"><li><ul class="movie">
		<?php
			require_once("data.movies.php");
			require_once("Movie.class.php");

			$out = "";
			
			if (isset( $_GET["id"]) && !empty( $_GET["id"])){
				$id = $_GET["id"];
				
				$movie = new Movie($id, 
								   $movies[$id]["title"], 
								   $movies[$id]["releaseDate"],
								   $movies[$id]["genre"],
								   $movies[$id]["director"]);
				
				$out .= $movie->renderHTML();

			} else $out .= "erreur sur la donnée d'entrée" ;
			echo $out;
		?>
	</ul></li></ul>
</body>