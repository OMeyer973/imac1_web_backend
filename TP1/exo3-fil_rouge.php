<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="style.css">
	<title>J'adore ce que vous faites</title>
</head>

<body>
	<?php

	require_once('data.movies.php');
	echo "<h1 class=\"title\">Movie List</h1>";

	
	render_movie_list($movies, "Science Fiction",10);

	echo "<p>la biz Pascale <3 - 0livio</p>";

	//functioooons

	function  render_movie_list($movies, $genre, $nbYears) {
		echo("<ul class=\"movie-list\">");
		foreach ($movies as $key => $film) {
			echo("<li><ul class=\"movie\"><h3>film $key</h3>");
			printFilm($film, $genre, $nbYears);
			echo("</ul></li>");
		}
		echo "</ul>";
	}

	function printFilm ($film, $genre, $nbYears) {
		$currentYear = date ("Y");
		if ($film != NULL) {
			foreach ($film as $key => $value) {
				echo "<li>";

				if ($key == "genre" && $value == $genre) {
					echo "<strong>";
				}
				if ($key == "year" && $currentYear - $value < $nbYears) {
					echo "<u>";
				}

				echo "$value";

				if ($key == "year" && $currentYear - $value < 10) {
					echo "</u>";
				}			
				if ($key == "genre" && $value == $genre) {
					echo "</strong>";
				}
				echo "</li>";
			}
		} else {
			echo "film is empty";
		}
	}

	?>
</body>
</html>
